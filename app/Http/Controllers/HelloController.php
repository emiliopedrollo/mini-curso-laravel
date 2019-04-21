<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(Request $request, $name) {
        return view('hello', [
            'method' => $request->method(),
            'content' => $request->getContent(),
            'name' => $name
        ]);
    }
}
