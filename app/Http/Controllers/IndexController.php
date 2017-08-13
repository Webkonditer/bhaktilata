<?php

namespace App\Http\Controllers;

use App\Repositories\FormsRepository;

class IndexController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FormsRepository $formsRepository)
    {
        $view =  view('welcome', [
            'form' => $formsRepository->find('test'),
        ])->render();
        return $view;
    }
}
