<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function submit(Request $request)
    {
        $data = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'description' => 'nullable|string',
            'lang' => 'required|string|in:ru,en,ru2',
        ]);

        app()->setLocale($data['lang']);

        $message = trans('form.submit_success');

        return redirect('/')
            ->with('message', $message);
    }
}
