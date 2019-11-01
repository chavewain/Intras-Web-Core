<?php

namespace App;


use App\Transformers\ExpertTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Event;

class Expert extends Model
{
    use SoftDeletes;

    public $transformer = ExpertTransformer::class;


    protected $dates = ['deleted_at'];

    protected $fillable = [
    	'name',
    	'title',
    	'biography',
    	'photo',
    ];

    
}
