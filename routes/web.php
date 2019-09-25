<?php
use App\Post;
use App\User;
use App\Role;
use App\Country;
use App\Photo;
use App\Tag;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



// |--------------------------------------------------------------------------
// | 	DATABASE RAW SQL queries
// |--------------------------------------------------------------------------


// // Insert

// Route::get('insert/{title}/{body}', function($title, $body){

// DB::insert('insert into posts(title, body) values(?, ?)', [$title, $body]);

// });

// // Select
// Route::get('search/{id}', function($id){

// 	$data=DB::select('select * from posts where id=?', [$id]);
	
// 	foreach ($data as $result) {
// 		return $result->body;
// 	}
// });

// // Updated
// Route::get('update', function(){
   
//    $updated=DB::update('update posts set title="this is updated" where id=?', [1]);
//    return $updated;
// });

// // Delete
// Route::get('delete/{id}', function($id){

// 	DB::delete('delete from posts where id=?', [$id]);
// });






// |--------------------------------------------------------------------------
// | 	ELOQUENT 
// |--------------------------------------------------------------------------


// // Select
// Route::get('/select/{id}', function($id){
//    $posts=Post::find($id);
// 	return $posts->body;
// });

// // FindWhere
// Route::get('findwhere/{id}', function($id){
// 	$posts=Post::Where('id', $id)->get();

// 	foreach ($posts as $result) {
// 		# code...
// 		return $result->title;
// 	}
// });

// Route::get('get/{id}', function($id){
//      $posts=Post::findOrFail($id);
//      return $posts;
// });

// // Insert
// Route::get('/insertdata/{id}', function($id){
// 	$posts=Post::find($id);
// 	$posts->title='this is updated Eloquent';
// 	$posts->body= 'updated Eloquent is very helpfull tool';
// 	$posts->save();
// });

// // Create
// Route::get('/create/{title}/{body}', function($title, $body){
// 	$posts =Post::create(['title'=>$title, 'body'=>$body]);
// });

// // Update
// Route::get('/update/{id}', function($id){
//    $post= Post::where('id', $id)->update(['title'=>'this is updated from eloquent', 'body'=>'body is update']);
// });

// // Delete
// Route::get('/delete/{id}', function($id){
//     $del=Post::find($id);
//     $del->delete();
// });

// // Delete in Bulk
// Route::get('destroy', function(){
//     Post::destroy([9,10]);
// });

// // SoftDeletes
// Route::get('softdelete/{id}', function($id){
// 	Post::find($id)->delete();
// });

// // Read Soft delete

// Route::get('/readsoftdelete/{id}', function($id){
//      $data=Post::onlyTrashed()->where('id', $id)->get();
//      return $data;
// });


// // Restore SoftDelete
// Route::get('restore/{id}', function($id){
// 	Post::onlyTrashed()->where('id', $id)->restore();
// });

// // Force Delete
// Route::get('forcedel/{id}', function($id){
// 	Post::onlyTrashed()->where('id', $id)->forceDelete();
// });




// |--------------------------------------------------------------------------
// | 	Eloquebt ALL the relations
// |--------------------------------------------------------------------------

// // one to one
// Route::get('user/{id}/post', function($id){
// 	$result = User::find($id)->post;
// 	return $result->body;
// });

// // Inverse Relation of one to one
// Route::get('post/{id}/user', function($id){
//   $result = Post::find($id)->user->name;
//   return $result;
    
// });

// // one to  many
// Route::get('user/{id}/posts', function($id){
// 	$result =User::find($id)->posts;
// 	return $result;
// });



// // Many to many relation with pivot table
// Route::get('user/{id}/role', function($id){
// 	$result =User::find($id)->roles;

// 	foreach ($result as $role) {
// 		# code...
// 		return $role->name;
// 	}
// });
// Route::get('role/{id}/user', function($id){
//    $result= Role::find($id)->users;
   
//    foreach($result as $role){
//       echo "$role->name" ."<br>";
//    }
// });

// // has many to many through relations

// Route::get('user/country/{id}', function($id){
// 	$country = country::find($id)->posts;
	

// 	foreach ($country as $posts) {
// 		# code...
// 		echo $posts->title."<br>";
// 	}
// });


// Polymorphic relations
// Route::get('post/{id}/photo', function($id){
// 	$photo=Post::find($id)->photo;
	
// 	foreach ($photo as $result) {
// 		# code...
// 		return $result->path;
// 	}
// });

// Route::get('photo/{id}/post', function($id){
// 	$photo= Photo::find($id)->imageable;
// 	return $photo->title;
// });

// polymorphic mamay to many relation


// Route::get('/post/{id}/tag', function($id){
//    $tags=Post::find($id)->tags;
   
//    foreach ($tags as $tag) {
   	
//    	return $tag->name;
//    }
// });

// Route::get('tag/post', function(){
//    $posts = tag::find(1)->post;
   
//    foreach ($posts as $post) {
   	
//    	return $post->title;
//    }
// });





// |--------------------------------------------------------------------------
// |  CRUD 
// |--------------------------------------------------------------------------





Route::group(['middleware'=>'web'], function(){

   Route::resource('/posts', 'PostsController');

   Route::get('/dates', function(){
       $date = new DateTime();
       echo $date->format('m-d-y');
       echo "<br>";
       echo Carbon::now()->addSeconds(15)->diffForHumans();
       echo "<br>";
       echo Carbon::now()->yesterday();
    });

   	Route::get('/getname', function(){
        $user= User::find(1);
        return $user->name;
   	});

   	Route::get('/setname', function(){
        $user= User::find(1);
        $user->name= "muhammad farhan";
        $user->save();
   	});

});