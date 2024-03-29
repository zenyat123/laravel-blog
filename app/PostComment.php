<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    
	protected $fillable = ["title", "comment", "approved", "post_id", "user_id"];

	public function user()
	{

		return $this->belongsTo("App\User");

	}

}