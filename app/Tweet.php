<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\TweetPublished;

class Tweet extends Model
{
    use Notifiable;
    protected $fillable = ['tweet', 'img'];
}
