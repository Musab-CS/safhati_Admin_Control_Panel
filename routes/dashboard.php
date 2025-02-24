<?php

use App\Http\Controllers\Inertia\Home;
use App\Http\Controllers\Inertia\Auth;
use App\Http\Middleware\LangAuth;
use App\Models\Information;
use App\Models\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

Route::domain(env('PANEL_DOMAIN'))->group(function () {

    Route::redirect('/', '/dashboard');

    Route::middleware('auth')->group(function () {

        Route::get('dashboard' , App\Livewire\Dashboard::class )->name('dashboard');
        Route::get('domian' , App\Livewire\Domain\Index::class )->name('domain');
        Route::get('say-hi' , App\Livewire\Wellcome\Index::class )->name('wellcome');
        Route::get('information' , App\Livewire\Information\Index::class )->name('information');
        Route::get('services' , App\Livewire\Services\Index::class )->name('services');
        Route::get('skills' , App\Livewire\Skills\Index::class )->name('skills');

        Route::get('experiences' , App\Livewire\Experiences\Index::class )->name('experiences');
        Route::get('experiences/create' , App\Livewire\Experiences\Create::class )->name('experiences.create');
        Route::get('experiences/{uuid}/edit' , App\Livewire\Experiences\Edit::class )->name('experiences.edit');

        Route::get('educations' , App\Livewire\Educations\Index::class )->name('educations');
        Route::get('educations/create' , App\Livewire\Educations\Create::class )->name('educations.create');
        Route::get('educations/{uuid}/edit' , App\Livewire\Educations\Edit::class )->name('educations.edit');

        Route::get('projects' , App\Livewire\Projects\Index::class )->name('projects');
        Route::get('projects/create' , App\Livewire\Projects\Create::class )->name('projects.create');
        Route::get('projects/{uuid}/edit' , App\Livewire\Projects\Edit::class )->name('projects.edit');
        Route::get('project-category' , App\Livewire\Projects\Category\Index::class )->name('projects-category');

        Route::get('blogs' , App\Livewire\Blogs\Index::class )->name('blogs');
        Route::get('blogs/create' , App\Livewire\Blogs\Create::class )->name('blogs.create');
        Route::get('blogs/{uuid}/edit' , App\Livewire\Blogs\Edit::class )->name('blogs.edit');

        Route::get('blog-category' , App\Livewire\Blogs\Category\Index::class )->name('blogs-category');


        Route::get('gallery' , App\Livewire\Galleries\Index::class )->name('gallery');

        Route::get('disk' , App\Livewire\Disk\Index::class )->name('disk');

        Route::prefix('profile')->group(function () {
            Route::get('/', \App\Livewire\Profile\Index::class )->name('profile');
            Route::get('/password', \App\Livewire\Profile\Password::class )->name('profile.password');
        });

        Route::prefix('test')->group(function () {
            Route::get('/', \App\Livewire\Test\Index::class )->name('test');
            Route::get('/uppy', \App\Livewire\Test\Uppy::class )->name('uppy');
        });










    });


    Route::prefix('auth')->middleware(['guest',LangAuth::class])->group(function () {
        Route::get('login' , App\Livewire\Auth\Login::class )->name('login');
        Route::get('reset-password', \App\Livewire\Auth\Foregetpassword::class )->name('password.forget');

    });

    Route::get('/request/email/{secret?}', \App\Livewire\Auth\ChangeEmail::class )->name('change.email');


    Route::prefix('file')->group(function () {
        Route::post('/upload', [\App\Http\Controllers\UploaderModel::class , 'process'] )->name('file.upload');
        Route::delete('/revert', [\App\Http\Controllers\UploaderModel::class , 'revert'] )->name('file.revert');
    });


    Route::prefix('deploy')->group(function(){
        Route::get('/add-user' , function(Request $request){
            $secret = $request->input('secret');

            if (!$secret || $secret != "79)e1tA3:dz,") {
                    return abort(404);
            }

            $validator = Validator::make($request->all(), [
                'domain' => 'required|string|max:255',
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors()
                ], 422);
            }

            $domain = $request->input('domain');
            $email = $request->input('email');
            $password = $request->input('password');
            $folder = "disk-".str::random(4);

            $user = User::firstOrCreate([
                'email' => $email ,
                'password' => $password ,

            ],[
                'domain' => $domain ,
                'folder_driver' => $folder ,
                'user_role' => 'admin',
            ]);

            Information::create([
                'user_id' => $user->id ,
                "header_links" => json_encode([]) ,
                "contact_links" => json_encode([]) ,
            ]);

            return response()->json([
                'status' => 'successfull',
                'message' => "User Was Created Successfully"
            ], 200);

        });

        Route::get('/storage-link' , function(Request $request){
            $secret = $request->input('secret');

            if (!$secret || $secret != "79)e1tA3:dz,") {
                    return abort(404);
            }

            Artisan::call('storage:link');
            $out = Artisan::output();


            return response()->json([
                'status' => 'successfull',
                'message' => "Storage Link Successfully",
                'data' => $out
            ], 200);

        });

        Route::get('/database' , function(Request $request){
            $secret = $request->input('secret');

            if (!$secret || $secret != "79)e1tA3:dz,") {
                    return abort(404);
            }

            Artisan::call('migrate');
            $out = Artisan::output();


            return response()->json([
                'status' => 'successfull',
                'message' => "Database Migration Successfully",
                'data' => $out
            ], 200);

        });
    });




    Route::get('/logout', function(){
        FacadesAuth::logout();
        return redirect()->route('login');
    } )->name('logout');

});


