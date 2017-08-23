<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Member extends Model
{
    //protected $table='members';

     protected $fillable=['name','address','email'];
     public $timestamps = false;

     use Searchable;

 	
 	public function searchableAs()
    {
        return 'posts_index';
    }

     public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }
}
