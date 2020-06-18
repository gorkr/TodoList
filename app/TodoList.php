<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    //
    protected $table = "todolist";
    public $timestamps = false;
    protected $fillable = ['id','item','status','homeid'];
}
