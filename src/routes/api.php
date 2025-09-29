<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\ApiAuthenticate;
use Illuminate\Support\Facades\Route;

/* ТЕСТ Laravel Passport
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
*/

Route::post('/login', [AuthController::class, 'login']);

/* ТЕСТ Laravel Passport
Route::post('/create-test-user', function () {
    $user = User::create([
        'name'     => 'Test User',
        'email'    => 'test@example.com',
        'password' => Hash::make('password123'),
    ]);

    return response()->json([
        'message' => 'Тестовый пользователь создан',
        'user'    => $user
    ]);
});
*/

Route::middleware(ApiAuthenticate::class)->group(function () {

    /* ТЕСТ Laravel Passport
    Route::get('/test', function (Request $request) {
        $user = $request->user();

        return response()->json([
            'token' => "teeeeest API with LPassport",
            'user'  => $user,
        ]);
    });*/

});
