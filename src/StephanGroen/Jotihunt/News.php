<?php namespace StephanGroen\Jotihunt;

class News extends Model {

    use Query\Findable;

    protected $fillable = [
        'ID',
        'titel',
        'datum',
        'inhoud',
    ];

    protected $url = 'nieuws';
}