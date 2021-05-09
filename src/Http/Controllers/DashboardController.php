<?php

namespace AngryMoustache\Rambo\Http\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('rambo::dashboard', [
            'breadcrumbs' => [
                [
                    'route' => route('rambo.dashboard'),
                    'label' => 'Dashboard',
                ],
            ],
        ]);
    }
}
