<?php namespace StephanGroen\Jotihunt;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;

class Connection {

    /**
     * Holds the API url for test requests
     *
     * @var string
     */
    private $apiUrl = 'http://www.jotihunt.net/api/1.0/';


    /**
     * Contains the HTTP client (Guzzle)
     * @var Client
     */
    private $client;


    /**
     * @return Client
     */
    public function client()
    {
        if ($this->client) return $this->client;

        $this->client = new Client([
            'base_uri' => $this->apiUrl,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ],
        ]);

        return $this->client;
    }


    /**
     * Perform a GET request
     * @param string $url
     * @return array
     * @throws JotihuntApiException
     */
    public function get($url)
    {
        try {
            $result = $this->client()->get($url);
        } catch (RequestException $e) {
            if ($e->hasResponse())
                $this->parseResponse($e->getResponse());

            throw new JotihuntApiException('Jotihunt error: (no error message provided)' . $e->getResponse());
        }

        return $this->parseResponse($result);
    }


    /**
     * @param Response $response
     * @return array Parsed JSON result
     * @throws JotihuntApiException
     */
    public function parseResponse(Response $response)
    {
        try {
            $resultArray = json_decode($response->getBody()->getContents(), true);

            if (! is_array($resultArray)) {
                throw new JotihuntApiException('Jotihunt error: Unexpected result: ' . $response->getBody()->getContents());
            }

            if (array_key_exists('error', $resultArray)) {
                throw new JotihuntApiException('Jotihunt error: ' . $resultArray['error']);
            }

            return $resultArray;
        } catch (\RuntimeException $e) {
            throw new JotihuntApiException('Jotihunt error: ' . $e->getMessage());
        }
    }
}