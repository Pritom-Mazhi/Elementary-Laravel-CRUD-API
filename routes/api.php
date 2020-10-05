<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostResourceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// CRUD api-is basically- 
// 1.Create a single(post) /api/posts
// 2.Get all(get) /api/posts
// 3.Get a single(get) /api/posts/{id}
// 4.Update a single(put/patch) /api/posts/{id}
// 5.Delete(delete) /api/posts/{id}


/*
Route::get('/testing-the-api', function(){
    return ['message' => 'Hello'];
});
*/

/*
Route::get('/posts', function(){ //get request
    $post = Post::create([ //Model name is 'Post' that's why   //we can do 'create' or 'update' or 'delete'
        'title'=>'my first post', 
        'slug'=>'my-first-post'
        ]);
    return $post;
});
*/

// To Create a Resource (posts in this blog example)
/*
1. Create the database and migrations
2. Create a model
2.5. Create a service? Eloquent ORM
3. Create a controller to go get info from the database
4. Return that info 
*/

/* traditional long ways to specify api urls
Route::get('/posts', 'PostController@index');
Route::post('/posts', 'PostController@create');
Route::put('/posts', 'PostController@update');
Route::delete('/posts', 'PostController@destroy');
//get requ, post requ, put requ & delete requests
*/

// Writing the above urls using resource controller 
// Route::resource('posts', 'PostController');
Route::resource('posts', PostResourceController::class);

/*
// manual test to troubleshoot in case any function in PostResourceController doesn't work
Route::get('/posts', function(){
    $post = Post::find(3);
    $post->update(['title' => 'my updated title']);
    return $post;
});

*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


