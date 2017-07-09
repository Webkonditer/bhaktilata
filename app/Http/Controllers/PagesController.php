<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(string $path = '', Request $request)
    {
        view()->addNamespace('demo', storage_path('demo'));

        $path = str_replace('/', '.', trim($path ?: $request->path(), '/'));
        try {
            return view('public.demo.' . $path);
        } catch (\InvalidArgumentException $e) {
            return abort(404, 'Page not found');
        }
    }
}