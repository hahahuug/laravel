<?php

use App\Http\Controllers\NewController;
use App\Http\Requests\NewRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('welcome');
});

//Route::get($uri, $callback);
//Route::post($uri, $callback);
//Route::put($uri, $callback);
//Route::delete($uri, $callback);

//Route::match(['get', 'post'], '/page2', function () {
//    return 'page 2';
//});
//
//Route::any('/page3', function () {
//    return 'page 3';
//
//});
//
//Route::redirect('/here', '/redirect');
//Route::get('/redirect', function () {
//    return 'redirect';
//});
//
//Route::view('view', 'welcome');
//
//Route::get('params/{name}', function (string $name) {
//    return $name;
//})->where('name', '[A-Za-z]+');
//
//Route::get('params/{id}', function (string $id) {
//    return $id;
//})->where('id', '[0-9]+');
//
//Route::get('/params/{search}', function (string $search) {
//    return $search;
//})->where('search', '.*');


Route::get('category/create', function (){
    return'create';
})->name('categoty.create');

Route::get('category/edit', function (){
    return'edit';
})->name('categoty.edit');

Route::prefix('main')->name('main.') -> middleware('check')->group(function (){
    Route::get('/create', function (){
        return 'create';
    })->name('create');
    Route::get('/edit', function (){
        return 'name';
    })->name('edit');
});

//Route::get('controller', [NewController::class, 'test'])->name('controller');

//Route::get('controller', 'NewController@test')->name('controller');

Route::get('params/{id}', [NewController::class, 'test']) -> name('contoller');

Route::get('test', function (NewRequest $request) {
    $name = $request->input('name');
    dump("User name: $name");
});

//Route::get('register', function (NewRequest $request) {
//    $name = $request->input('name');
//    $email = $request->input('email');
//    $password = $request->input('password');
//
//    $validatedData = $request->validated();
//
//    $user = new User();
//    $user->name = $name;
//    $user->email = $email;
//    $user->password = Hash::make($password);
//    $user->save();
//
//    return redirect('/login');
//});

Route::get('/user/{id}', function ($id) {
    $user = App\Models\User::find($id);
    return response()->json($user);
});

Route::get('/headers', function () {
    return response('Hello')->header('Content-Type', 'text/plain');
});

Route::get('/register', function (Request $request) {
    $validator = Validator::make($request->input(), [
        'name' => 'required|string',
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    if ($validator->fails()) {
        $errors = $validator->errors();
        return response()->json(['errors' => $errors], 422);
    }

    return response()->json(['message' => 'Registration successful']);
});
