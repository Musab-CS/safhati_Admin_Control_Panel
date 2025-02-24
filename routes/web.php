<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Faker\Factory as Faker;
use GuzzleHttp\Promise\Create;

$app_route = function () {

    // TODO: Get NAME
    // * Get LAND
    //! Error Here
    //? Question Here?


    Route::get('/', function(){
        return Inertia::render('pages/home');
    } )->name('home');

    Route::get('/users', function(){
        return Inertia::render('pages/users/index');
    } )->name('users');

    Route::get('/websites', function(){
        return Inertia::render('pages/websites/index');
    } )->name('websites');

    Route::get('/plans', function(){
        return Inertia::render('pages/plans/index');
    } )->name('plans');

    Route::get('/plan/create', function(){
        return Inertia::render('pages/plans/create');
    } )->name('plan-create');

    Route::prefix('auth')->group(function(){
        Route::get('login', function(){ return Inertia::render('pages/auth/login'); } )->name('login');
        Route::get('reset-password', function(){ return Inertia::render('pages/auth/reset-password'); } )->name('reset-password');
    });

    Route::prefix('academy')->group(function(){
        Route::get('category', function(){ return Inertia::render('pages/academy/category/index'); } )->name('academy.category');
        Route::get('list', function(){ return Inertia::render('pages/academy/index'); } )->name('academy');
        Route::get('create', function(){ return Inertia::render('pages/academy/create'); } )->name('academy-create');
    });

    Route::prefix('applications')->group(function(){
        Route::get('/', function(){ return Inertia::render('pages/applications/index'); } )->name('applications');
        Route::get('create', function(){ return Inertia::render('pages/applications/create'); } )->name('applications-create');
    });

    Route::prefix('pages')->group(function(){
        Route::get('/', function(){ return Inertia::render('pages/pages/index'); } )->name('pages');
        Route::get('create', function(){ return Inertia::render('pages/pages/create'); } )->name('pages-create');
    });


    Route::get('/subscriptions', function(){
        return Inertia::render('pages/subscriptions/index');
    } )->name('subscriptions');

    Route::get('/help-center', function(){
        return Inertia::render('pages/help-center/index');
    } )->name('help-center');



    Route::get('/login', function(){
        return Inertia::render('pages/website/auth/login');
    } )->name('login');

    Route::get('/signup', function(){
        return Inertia::render('pages/website/auth/signup');
    } )->name('signup');


    Route::get('/{any}', function () { return Inertia::render('404'); })->where('any', '.*');

};

Route::middleware([])->group($app_route);

