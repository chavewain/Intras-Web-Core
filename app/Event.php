<?php

namespace App;

use App\Category;
use App\Transformers\EventTransformer;
use App\Expert;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    public $transformer = EventTransformer::class;

	const TASK_UNAVAILABLE = 'unavailable';
	const TASK_AVAILABLE = 'available';

    protected $dates = ['deleted_at'];

    protected $fillable = [
    	'name',
    	'description',
    	'status',
    	'image',
    	'expert_id',
    ];

    public function expert() {
        return $this->belongsTo(Expert::class);
    }

    public function categories()
    {
    	return $this->belongsToMany(Category::class);
    }

}
