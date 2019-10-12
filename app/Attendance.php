<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str as generate;

class Attendance extends Model
{
    protected $table = 'attendance';
    public $incrementing = false;
    protected $primaryKey = 'id';

    public static function boot(){
        parent::boot();

        static::creating(function($attendance){
            $attendance->id = (string) generate::uuid();
        });
    }
}
