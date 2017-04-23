<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model {

	//
	protected $fillable = ['title' ,'body' ,'published_at','image'];

	protected $dates = ['published_at'];

	public function setPublishedAtAttribute($date){
		$this->attributes['published_at'] = Carbon::parse($date)->subDay();
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function tags(){
		return $this->belongsToMany('App\Tag')
								->withTimestamps();
	}
	public function getTagListAttribute(){
		return $this->tags->lists('id');
	}

	public function scopePublished($query){
		$query->where('published_at', '<=', Carbon::now());
	}
	public function scopeUnpublished($query){
		$query->where('published_at', '>', Carbon::now());
	}


}
