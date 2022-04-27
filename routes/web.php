<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostCategoryController;

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
    return view('layout/main', [
        'title' => 'Home'
    ]);
}) -> name('home') -> middleware('auth');

Route::get('/login', [LoginController::class, 'index']) -> name('login') -> middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);


Route::get('/register', [RegisterController::class, 'index']) -> name('register') -> middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/logout', [LoginController::class, 'logout']) -> name('logout') -> middleware('auth');

Route::get('/post', function () {
    $posts = [
        [
            'title' => "Judul Post Pertama",
            'slug' => "judul-post-pertama",
            'body' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi magnam, laborum, autem qui sunt, incidunt praesentium libero aut laudantium ab rerum itaque repudiandae tenetur? Hic blanditiis rem soluta recusandae! Consequuntur! Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime numquam soluta necessitatibus in nam aliquam quod quibusdam natus, placeat repellendus sapiente minima eaque ex accusantium commodi, quisquam libero aliquid adipisci. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo ex dolorum veritatis atque omnis. Nemo at et sed sunt, veritatis ipsum ea libero molestias similique reprehenderit ad, dolorem minus delectus!"
        ],
    
        [
            'title' => "Judul Post Kedua",
            'slug' => "judul-post-kedua",
            'body' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum aliquam cum iste? Impedit repellendus mollitia neque aliquam beatae nulla totam, ducimus aut quam distinctio sed cumque exercitationem reprehenderit, quaerat dolores. Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus sapiente commodi aliquam ipsum cum impedit, doloremque quae neque, modi numquam exercitationem at provident facere eligendi doloribus. Dignissimos, assumenda quisquam! Illum! Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta expedita officia doloribus animi laboriosam facere consequuntur reprehenderit ipsa cum aut voluptate corporis ut repellat provident corrupti totam dignissimos, enim esse. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab necessitatibus adipisci nobis odio perspiciatis, et dolorem quisquam ratione! Magnam eligendi repellat ratione perspiciatis unde quaerat eum nostrum eius placeat deleniti?"
        ]
    ];
    
    return view('post', [
        'title' => 'Post',
        'judul' => 'Ini Halaman Post',
        'posts' => $posts
    ]);
}) -> middleware('auth');

Route::get('/singlePost/{slug}', function ($slug) {
    $posts = [
        [
            'title' => "Judul Post Pertama",
            'slug' => "judul-post-pertama",
            'body' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi magnam, laborum, autem qui sunt, incidunt praesentium libero aut laudantium ab rerum itaque repudiandae tenetur? Hic blanditiis rem soluta recusandae! Consequuntur! Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime numquam soluta necessitatibus in nam aliquam quod quibusdam natus, placeat repellendus sapiente minima eaque ex accusantium commodi, quisquam libero aliquid adipisci. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo ex dolorum veritatis atque omnis. Nemo at et sed sunt, veritatis ipsum ea libero molestias similique reprehenderit ad, dolorem minus delectus!"
        ],
    
        [
            'title' => "Judul Post Kedua",
            'slug' => "judul-post-kedua",
            'body' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum aliquam cum iste? Impedit repellendus mollitia neque aliquam beatae nulla totam, ducimus aut quam distinctio sed cumque exercitationem reprehenderit, quaerat dolores. Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus sapiente commodi aliquam ipsum cum impedit, doloremque quae neque, modi numquam exercitationem at provident facere eligendi doloribus. Dignissimos, assumenda quisquam! Illum! Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta expedita officia doloribus animi laboriosam facere consequuntur reprehenderit ipsa cum aut voluptate corporis ut repellat provident corrupti totam dignissimos, enim esse. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab necessitatibus adipisci nobis odio perspiciatis, et dolorem quisquam ratione! Magnam eligendi repellat ratione perspiciatis unde quaerat eum nostrum eius placeat deleniti?"
        ]
    ];

    $getPost = [];

    foreach($posts as $data){
        if($data['slug'] == $slug){
            $getPost = $data;
        }
    }
    
    return view('singlePost', [
        'title' => 'Post',
        'judul' => 'Ini Halaman Post',
        'post' => $getPost
    ]);
}) -> middleware('auth');

Route::resource('post-category', PostCategoryController::class);