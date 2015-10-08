<?php namespace StephanGroen\Jotihunt;

class Jotihunt {

    /**
     * The HTTP connection
     *
     * @var Connection
     */
    protected $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function fox()
    {
        return new Fox($this->connection);
    }

    public function assignment()
    {
        return new Assignment($this->connection);
    }

    public function hint()
    {
        return new Hint($this->connection);
    }

    public function news()
    {
        return new News($this->connection);
    }

    public function score()
    {
        // TODO: API unknown
        //return new Score($this->connection);
    }

}