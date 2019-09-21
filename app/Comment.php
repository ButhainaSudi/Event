<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str as generate;

class Comment extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'comment',
    ];

    public static function boot(){
        parent::boot();

        static::creating(function($user){
            $user->id = (string) generate::uuid();
        });
    }


}
