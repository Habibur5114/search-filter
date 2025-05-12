<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\NewsarticleController;
use App\Http\Controllers\FrontendController;



// Category

Route::get('/admin/categories', [CategorieController::class, 'index'])->name('admin.categories');
Route::get('/admin/categories/create', [CategorieController::class, 'create'])->name('admin.categories.create');
Route::post('/admin/categories/save', [CategorieController::class, 'store'])->name('admin.categories.store');
Route::get('/admin/categories/show/{id}', [CategorieController::class, 'show'])->name('admin.categories.show');
Route::post('/admin/categories/update', [CategorieController::class, 'update'])->name('admin.categories.update');
Route::get('/admin/categories/destroy/{id}', [CategorieController::class, 'destroy'])->name('admin.categories.destroy');
Route::get('/admin/categories/status/{id}', [CategorieController::class, 'status'])->name('admin.categories.status');


// author

Route::get('/admin/author', [AuthorController::class, 'index'])->name('admin.author');
Route::get('/admin/author/create', [AuthorController::class, 'create'])->name('admin.author.create');
Route::post('/admin/author/save', [AuthorController::class, 'store'])->name('admin.author.store');
Route::get('/admin/author/show/{id}', [AuthorController::class, 'show'])->name('admin.author.show');
Route::post('/admin/author/update', [AuthorController::class, 'update'])->name('admin.author.update');
Route::get('/admin/author/destroy/{id}', [AuthorController::class, 'destroy'])->name('admin.author.destroy');
Route::get('/admin/author/status/{id}', [AuthorController::class, 'status'])->name('admin.author.status');


// news

Route::get('/admin/news', [NewsarticleController::class, 'index'])->name('admin.news');
Route::get('/admin/news/create', [NewsarticleController::class, 'create'])->name('admin.news.create');
Route::post('/admin/news/save', [NewsarticleController::class, 'store'])->name('admin.news.store');
Route::get('/admin/news/show/{id}', [NewsarticleController::class, 'show'])->name('admin.news.show');
Route::post('/admin/news/update', [NewsarticleController::class, 'update'])->name('admin.news.update');
Route::get('/admin/news/destroy/{id}', [NewsarticleController::class, 'destroy'])->name('admin.news.destroy');
Route::get('/admin/news/status/{id}', [NewsarticleController::class, 'status'])->name('admin.news.status');


// frontend

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/habib', [FrontendController::class, 'habib'])->name('frontend.index');
Route::get('/main', [FrontendController::class, 'main'])->name('frontend.index');
Route::get('/details/{slug}', [FrontendController::class, 'details'])->name('frontend.details');
Route::get('/search', [FrontendController::class, 'search'])->name('search');
