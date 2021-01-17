<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Categories extends Model
{
use Softdeletes;
 protected $fillable =[
     'name','photo','slug'
 ];
 protected $hidden =[

 ];
}
