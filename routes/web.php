<?php

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

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FormController;

use App\Models\FormData;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

Route::get('/', [FormController::class, 'index']);

Route::get('/welcome', function () {
    return view('success');
});


Route::get('/{locale?}', function ($locale = null) {
    if (! in_array($locale, ['en', 'ru', 'ru2'])) {
        abort(404);
    }

    app()->setLocale($locale);

    return view('form');
})->name('form');

Route::post('/submit', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'description' => 'nullable|string',
        'lang' => 'required|in:ru,en,ru2',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    session(['firstname' => $request->firstname]);
    session(['lastname' => $request->lastname]);
    session(['description' => $request->description]);
    session(['lang' => $request->lang]);

    $formData = FormData::create($request->all());


    return redirect('/welcome');
})->name('submit');

