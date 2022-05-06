<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\HomeAbout;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    $abouts = HomeAbout::first();
    $contact = Contact::first();
    $services = Service::all();
    return view('home',compact('abouts','contact','services'));
});
// Route::get('/admin', function () {
//     return view('admin.index');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/user/logout' , [UserController::class,'Logout'])->name('user.logout');

// Brand Routes
Route::get('/Brand/all' , [BrandController::class,'allBrand'])->name('allBrand');
Route::post('/Brand/Add' , [BrandController::class,'store'])->name('store.brand');
Route::get('/Brand/edit/{id}' , [BrandController::class,'edit'])->name('edit.brand');
Route::post('/Brand/update/{id}' , [BrandController::class,'update'])->name('update.brand');
Route::get('/Brand/delete/{id}' , [BrandController::class,'destroy'])->name('delete.brand');

// Slider Routes
Route::get('/home/slider' , [SliderController::class,'homeSlider'])->name('home.slider');
Route::get('/slider/add' , [SliderController::class,'addSlider'])->name('add.slider');
Route::post('/slider/store' , [SliderController::class,'store'])->name('store.slider');
Route::get('/slider/edit/{id}' , [SliderController::class,'edit'])->name('edit.slider');
Route::get('/slider/delete/{id}' , [SliderController::class,'destroy'])->name('delete.slider');
Route::post('/slider/update/{id}' , [SliderController::class,'update'])->name('update.slider');

// HomeAbout Routes
Route::get('/home/about' , [HomeAboutController::class,'homeAbout'])->name('home.about');
Route::get('/about/add' , [HomeAboutController::class,'addAbout'])->name('add.about');
Route::post('/about/store' , [HomeAboutController::class,'store'])->name('store.about');
Route::get('/about/edit/{id}' , [HomeAboutController::class,'edit'])->name('edit.about');
Route::post('/about/update/{id}' , [HomeAboutController::class,'update'])->name('update.about');
Route::get('/about/delete/{id}' , [HomeAboutController::class,'destroy'])->name('delete.about');


// Mulite images Routes
Route::get('/Mulitpic/all' , [MulitPicController::class,'allMulitpic'])->name('allMulitpic');
Route::post('/Mulitpic/Add' , [MulitPicController::class,'store'])->name('store.Mulitpic');


// Portolio Routes
Route::get('/Portolio' , [MulitPicController::class,'allPortolio'])->name('Portolio');


// Contact Routes
Route::get('/admin/contact' , [ContactController::class,'adminContact'])->name('admin.contact');
Route::get('/contact/add' , [ContactController::class,'addContact'])->name('add.contact');
Route::post('/contact/store' , [ContactController::class,'store'])->name('store.contact');
Route::get('/contact/edit/{id}' , [ContactController::class,'edit'])->name('edit.contact');
Route::post('/contact/update/{id}' , [ContactController::class,'update'])->name('update.contact');
Route::get('/contact/delete/{id}' , [ContactController::class,'destroy'])->name('delete.contact');

Route::get('/Contact' , function(){
        $contacts = Contact::first();
        return view('pages.contact',compact('contacts'));
})->name('Contact');


// ContactForm Routes
Route::get('/admin/contact-form' , [ContactFormController::class,'contactForm'])->name('contactForm');
Route::post('/contact-form/store' , [ContactFormController::class,'store'])->name('store.form');
Route::get('/contact-form/delete/{id}' , [ContactFormController::class,'destroy'])->name('delete.form');


// change password Routes
Route::get('/change/password' , [ChangeRasswordController::class,'changePassword'])->name('changePassword');
Route::post('/update/password' , [ChangeRasswordController::class,'updatePassword'])->name('passwordUpdate');


// User Profile Routes
Route::get('/user/profile' , [ChangeRasswordController::class,'updateProfile'])->name('updateProfile');
Route::post('/update/profile' , [ChangeRasswordController::class,'update_profile'])->name('update_profile');


// Posts Routes
Route::middleware('auth')->group(function(){
    Route::get('/user/post' , [PostsController::class,'userPost'])->name('user.post');
    Route::get('/post/add' , [PostsController::class,'addpost'])->name('add.post');
    Route::post('/post/store' , [PostsController::class,'store'])->name('store.post');
    Route::get('/post/edit/{id}' , [PostsController::class,'edit'])->name('edit.post');
    Route::post('/post/update/{id}' , [PostsController::class,'update'])->name('update.post');
    Route::get('/post/delete/{id}' , [PostsController::class,'destroy'])->name('delete.post');

    /// Upload Writing Image Post
    Route::post('/upload/images' , [PostsController::class,'upload'])->name('post.images.store');



    //// Pages Routes
    Route::prefix('page')->group(function(){
        Route::get('/all',[PagesController::class,'index'])->name('all.pages');
        Route::get('/add' , [PagesController::class,'add'])->name('add.page');
        Route::post('/store' , [PagesController::class,'store'])->name('store.page');
        Route::get('/edit/{id}' , [PagesController::class,'edit'])->name('edit.page');
        Route::post('/update/{id}' , [PagesController::class,'update'])->name('update.page');
        Route::get('/delete/{id}' , [PagesController::class,'destroy'])->name('delete.page');
    });

    //// SEO Routes
    Route::prefix('seo')->group(function(){
        Route::get('/view',[SEOController::class,'index'])->name('view.seo');
        Route::post('/update/{id}' , [SEOController::class,'update'])->name('update.seo');
    });


    //// Services Routes
    Route::prefix('service')->group(function(){
        Route::get('/all',[ServiceController::class,'index'])->name('all.service');
        Route::get('/add' , [ServiceController::class,'add'])->name('add.service');
        Route::post('/store' , [ServiceController::class,'store'])->name('store.service');
        Route::get('/edit/{id}' , [ServiceController::class,'edit'])->name('edit.service');
        Route::post('/update/{id}' , [ServiceController::class,'update'])->name('update.service');
        Route::get('/delete/{id}' , [ServiceController::class,'destroy'])->name('delete.service');
    });

});


// Blog Routes
Route::get('/blog' , [PostsController::class,'AllPosts'])->name('blog');
Route::get('page/{slug}' , [PostsController::class,'postContact'])->name('blog_details');
Route::get('post/{slug}' , [PostsController::class,'getPost'])->name('post_details');
Route::get('/{type}' , [PostsController::class,'getPages'])->name('type');

// Comments Routes
Route::post('/comment/store' , [AllCommentController::class,'store'])->name('store.comment');
Route::get('/admin/post-commit' , [AllCommentController::class,'postCommet'])->name('postCommet');
Route::get('/post-commit/delete/{id}' , [AllCommentController::class,'destroy'])->name('delete.comment');


