<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

// ------------------
// LOGIN (Passport)
// ------------------
// Route::post('/login', function (Request $request) {
//     $request->validate([
//         'email' => 'required|email',
//         'password' => 'required',
//     ]);

//     if (!Auth::attempt($request->only('email','password'))) {
//         return response()->json(['message' => 'Invalid credentials'], 401);
//     }

//     $user = $request->user();
//     $token = $user->createToken('api-token')->accessToken;

//     return response()->json([
//         'user'  => $user,
//         'token' => $token,
//     ]);
// });


// api.php

Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (!Auth::attempt($request->only('email','password'))) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $user = $request->user();
    $token = $user->createToken('api-token')->accessToken;

    return response()->json([
        'user'  => $user,
        'token' => $token,
    ]);
});


// ------------------
// AUTHENTICATED ROUTES (Passport)
// ------------------
Route::middleware('auth:api')->group(function () {

    // User info
    Route::get('/me', function (Request $request) {
        return $request->user()->load('roles');
    });

    // Products
    Route::post('/products', [ProductController::class, 'store']);
    // Optional: list products
    // Route::get('/products', [ProductController::class, 'index']);

    // Categories (CRUD)
    Route::controller(CategoryController::class)
        ->prefix('categories')
        ->group(function () {
            Route::get('/', 'getCategories');
            Route::post('/', 'createCategory');
            Route::get('/{category}', 'getCategory');
            Route::patch('/{category}', 'updateCategory');
            Route::delete('/{category}', 'deleteCategory');

            // Policy-based status update
            Route::patch('/{category}/status', 'updateStatus');
        });

});
