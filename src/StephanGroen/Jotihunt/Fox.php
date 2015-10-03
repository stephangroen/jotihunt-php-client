<?php namespace StephanGroen\Jotihunt;

class Fox extends Model {

    use Query\FindAll;

    protected $fillable = [
        'team',
        'status',
    ];

    protected $url = 'vossen';
}