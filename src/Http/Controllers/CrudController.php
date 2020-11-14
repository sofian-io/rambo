<?php

namespace AngryMoustache\Rambo\Http\Controllers;

use App\Http\Controllers\Controller;

class CrudController extends Controller
{
    public $resource;

    public function guessResource($resource)
    {
        $resources = config('rambo.resources', []);

        foreach ($resources as $item) {
            if ($item::$routeBase === $resource) {
                return new $item;
                break;
            }
        }

        return null;
    }

    public function index($resource)
    {
        $resource = $this->guessResource($resource);
        $items = $resource->model::get();

        return view('rambo::crud.index', [
            'resource' => $resource,
            'items' => $items,
        ]);
    }

    public function create($resource)
    {
        $resource = $this->guessResource($resource);
        $items = $resource->model::get();

        return view('rambo::crud.create', [
            'resource' => $resource,
            'items' => $items,
        ]);
    }
}
