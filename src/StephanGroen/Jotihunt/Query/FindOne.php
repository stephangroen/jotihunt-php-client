<?php namespace StephanGroen\Jotihunt\Query;

trait FindOne {

    public function find($id)
    {
        $result = $this->connection()->get($this->url . '/' . urlencode($id));

        return new self($this->connection(), reset($result['data']));
    }

}