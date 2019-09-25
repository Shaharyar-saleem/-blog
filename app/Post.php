<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //

    public $directory='/images/';
    use SoftDeletes;
    protected $table='posts';
    protected $dates=['deleted_at'];

    protected $fillable=['title','body','path'];

 public function user(){
 	return $this->belongsTo('App\User');
 }
 public function photo(){
	return $this->morphMany('App\Photo', 'imageable');
}
 public function tags(){
 	return $this->morphToMany('App\tag', 'taggable');
 }



// public function getPathAttribute($value){
//    return $this->directory.$value;
// }



}
