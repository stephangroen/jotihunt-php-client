<?php namespace StephanGroen\Jotihunt\Query;

trait FindAll {

    public function all()
    {
        $result = $this->connection()->get($this->url);

        return $this->collectionFromResult($result);
    }

    public function collectionFromResult($result)
    {
        $collection = [];
        foreach ($result['data'] as $r)
        {
            $collection[] = new self($this->connection(), $r);
        }

        return $collection;
    }

}