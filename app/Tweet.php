<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $table = 'tweet';

    protected $fillable = [
        'user_id', 'tweet', 'retweet'
    ];

    public function user(){
    	return $this->belongsTo(User::class, 'user_id');
    }
}
