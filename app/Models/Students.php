<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected  $table    = "students";

   protected  $fillable = ['name','password','email'];

   protected  $hidden   = ['created_at','updated_at'];

}
