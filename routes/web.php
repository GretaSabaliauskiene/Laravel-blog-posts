<?php

use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Route;

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

Route::get('/1', function () {
    return view('update');
});
Route::get('posts/{id}', 'BlogPostController@show')->name('posts.show');
Route::put('/posts/{id}', 'BlogPostController@update')->name('posts.update');
Route::delete('/posts/{id}', 'BlogPostController@destroy')->name('posts.destroy');
Route::post('/posts', 'BlogPostController@store')->name('posts.store');


Route::get('/posts', [
    'uses' => 'BlogPostController@index',
    'as' => 'posts.index'
]);



Route::get('/', function () {
    return view('welcome');
});

/*
// ...www\<app_name>\routes\web.php ← failas, kuriame reikia įdėti routeą

class Person
{
    public $age = 0;
    public function __construt($age)
    {
        $this->age = $age;
    }
}



Route::get('/1', function () {
    return response()->json(new Person(5));
});

Route::get('/{text}', function ($text) {
    return $text;
});



Route::get('/home', function () {
    return redirect()->route('index'); // redirect to named route
    // return redirect('/admin/1'); //  redirect to route
    // return "<h1>Hello</h1>";
});


Route::get('/{name}', function ($name) {
    return view('welcome', ["var" => $name]);
});

Route::get('/', function () {
    return view('welcome', ["var" => 2, "letters" => ["A", "B", "C"]]);
});



class Person
{
    public $age;
    public $name;
    public function __construct($age, $name)
    {
        $this->age = $age;
        $this->name = $name;
    }
}
Route::get('/', function () {
    $people = [new Person(22, "Jonas"), new Person(16, "Petras")];
    return view('welcome', compact('people'));
});
*/
Route::get('/about', function () {
})->name('about');

Route::get('/', function () {
    return view('welcome');
})->name('index');
