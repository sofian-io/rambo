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
        $items = $resource::$model::get();

        return view('rambo::crud.index', [
            'resource' => $resource,
            'items' => $items,
        ]);
    }

    public function show($resource, $id)
    {
        $resource = $this->guessResource($resource);
        $item = $resource::$model::find($id);

        return view('rambo::crud.show', [
            'resource' => $resource,
            'item' => $item,
        ]);
    }

    public function create($resource)
    {
        $resource = $this->guessResource($resource);
        $items = $resource::$model::get();

        return view('rambo::crud.create', [
            'resource' => $resource,
            'items' => $items,
        ]);
    }

    public function edit($resource, $id)
    {
        $resource = $this->guessResource($resource);
        $item = $resource::$model::find($id);

        return view('rambo::crud.edit', [
            'resource' => $resource,
            'item' => $item,
        ]);
    }

    public function delete($resource, $id)
    {
        $resource = $this->guessResource($resource);
        $item = $resource::$model::find($id);

        return view('rambo::crud.delete', [
            'resource' => $resource,
            'item' => $item,
        ]);
    }

    public function deleteConfirm($resource, $id)
    {
        $item = $this->guessResource($resource)::$model::find($id);
        $item->delete();

        return redirect("/admin/{$resource}");
    }
}
