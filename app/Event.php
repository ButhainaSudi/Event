<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str as generate;

class Event extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'title', 'description', 'date','venue',
    ];

    public static function boot(){
        parent::boot();

        static::creating(function($user){
            $user->id = (string) generate::uuid();
        });
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
