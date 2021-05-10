<?php

namespace AngryMoustache\Rambo\Http\Controllers;

use AngryMoustache\Rambo\Facades\Rambo;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('rambo::dashboard', [
            'cards' => Rambo::cards(),
            'breadcrumbs' => [
                [
                    'route' => route('rambo.dashboard'),
                    'label' => 'Dashboard',
                ],
            ],
        ]);
    }
}
