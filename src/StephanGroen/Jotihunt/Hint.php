<?php namespace StephanGroen\Jotihunt;

class Hint extends Model {

    use Query\Findable;

    protected $fillable = [
        'ID',
        'titel',
        'datum',
        'inhoud',
    ];

    protected $url = 'hint';
}