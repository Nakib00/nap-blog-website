<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AppController, AdminController, AboutController, TeamController, ContactController, CategoryController, BlogController};

Route::get('/', [AppController::class, 'index'])->name('index');

Route::get('/dashboard', [AdminController::class, 'adminIndex'])->middleware(['auth', 'verified'])->name('admin_index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('user-profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Admin Route
    //about section
    Route::get('adminAbout', [AdminController::class, 'admin_about'])->name('admin_about');
    Route::get('adminAbout/{id}/edit', [AboutController::class, 'about_edit'])->name('admin.about.edit');
    Route::put('adminAbout/{id}', [AboutController::class, 'about_update'])->name('about.update');

    //team section
    Route::get('addteam', [AdminController::class, 'addTeam'])->name('admin.team.add');
    Route::post('storeteam', [TeamController::class, 'storeteam'])->name('admin.team.store');
    Route::get('adminteam/{id}/edit', [TeamController::class, 'team_edit'])->name('admin.team.edit');
    Route::put('adminteam/{id}', [TeamController::class, 'team_update'])->name('admin.team.update');
    Route::delete('adminteam/{id}/delete', [TeamController::class, 'team_delete'])->name('admin.team.delete');

    //contact
    Route::get('admin_contact', [AdminController::class, 'admin_contact'])->name('admin_contact');
    Route::get('admincontact/{id}/edit', [ContactController::class, 'contact_edit'])->name('admin.contact.edit');
    Route::put('admincontact/{id}', [ContactController::class, 'contact_update'])->name('admin.contact.update');

    //show message
    Route::get('admin_message', [AdminController::class, 'admin_message'])->name('admin_message');

    //Category
    Route::get('admin_category', [AdminController::class, 'admin_category'])->name('admin.catrgory');
    Route::get('admin_category/add', [CategoryController::class, 'admin_categoryAdd'])->name('admin.catrgory.add');
    Route::post('admin_category/store', [CategoryController::class, 'storeCategory'])->name('admin.category.store');
    Route::get('admin_category/{id}/status/change/{status}', [CategoryController::class, 'changestatus'])->name('admin.category.status.change');
    Route::get('admin_category/{id}/edit', [CategoryController::class, 'admin_categoryedit'])->name('admin.catrgory.edit');
    Route::put('admin_category/{id}', [CategoryController::class, 'admin_categoryUpdate'])->name('admin.catrgory.update');
    Route::delete('admincategory/{id}/delete', [CategoryController::class, 'category_delete'])->name('admin.category.delete');


    //Singel blog
    Route::get('admin_blog', [AdminController::class, 'admin_blog'])->name('admin.blog');
    Route::get('admin_blog/add', [BlogController::class, 'admin_blogAdd'])->name('admin.blog.add');
    Route::post('admin_blog/store', [BlogController::class, 'admin_blogstore'])->name('admin.blog.store');
    Route::get('admin_blog/{id}/detail', [BlogController::class, 'admin_blogDetails'])->name('admin.blog.detail');
    Route::get('admin_blog/{id}/edit', [BlogController::class, 'admin_blogedit'])->name('admin.blog.edit');
    Route::put('admin_blog/{id}', [BlogController::class, 'admin_blogupdate'])->name('admin.blog.update');
    Route::delete('admin_blog/{id}/delete', [BlogController::class, 'blog_delete'])->name('admin.blog.delete');
    Route::get('blog/{id}/status/change/{status}', [BlogController::class, 'statusChange'])->name('admin.blog.status_change');
    Route::get('blog/{id}/show/change/{show}', [BlogController::class, 'shwoHome'])->name('admin.blog.showHome');
});

require __DIR__ . '/auth.php';

// Route for front end page
Route::group(['prefix' => '/'], function () {
    Route::get('about', [AppController::class, 'about'])->name('about');
    Route::get('contact', [AppController::class, 'contact'])->name('contact');
    //send message in contact page
    Route::post('storemessage', [AppController::class, 'storemessage'])->name('contact.storemessage');
    //open blog post
    Route::get('blog/{id}/post', [AppController::class, 'post'])->name('post');
    //comment in blog post
    Route::post('blog/{id}/comment', [AppController::class, 'comment'])->name('blog.comment');
});
