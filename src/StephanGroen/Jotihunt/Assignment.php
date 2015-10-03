<?php namespace StephanGroen\Jotihunt;

class Assignment extends Model {

    use Query\Findable;

    protected $fillable = [
        'ID',
        'titel',
        'datum',
        'eindtijd',
        'maxpunten',
        'inhoud',
    ];

    protected $url = 'opdracht';
}