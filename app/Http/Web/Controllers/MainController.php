<?php

namespace App\Http\Web\Controllers;

use App\Http\Controller;
use App\Jobs\ReizJob;
use Illuminate\View\View;

class MainController extends Controller
{
    public function __invoke(): View
    {
        ReizJob::dispatch();

        return view('main');
    }
}
