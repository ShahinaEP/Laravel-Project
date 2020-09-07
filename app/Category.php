<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'used_id','Category_name',
    ];

    //Add user name show
    public function User(){
        return $this->hasone(User::class,'id','user_id');
    }
}