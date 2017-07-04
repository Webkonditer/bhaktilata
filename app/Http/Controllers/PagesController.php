<?php

namespace App\Http\Controllers;

use Mockery\Exception;

class DemoController extends Controller
{
    public function index(string $path = '')
    {
        view()->addNamespace('demo', storage_path('demo'));

        $path = str_replace('/', '.', trim($path, '/'));
        try {
            return view('demo::' . $path);
        } catch (Exception $e) {
            var_dump($e); die;
        }
        var_dump($path); die;
    }
}