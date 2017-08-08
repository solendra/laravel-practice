<?php

namespace App;
use Illuminate\Database\Eloquent\Model;



class Member extends Model
{
    //protected $table='members';

     protected $fillable=['name','address','email'];
     public $timestamps = false;


 

}
