<?php

namespace App\Http\Controllers;

use App\Pages\Page;

class PagesController extends Controller
{
    public function index(Page $page)
    {
        return view('public.pages.page', [
            'page' => $page,
        ]);
    }
}
