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
            if ($item::getRouteBase() === $resource) {
                return new $item;
                break;
            }
        }

        return null;
    }

    public function index($resource)
    {
        $resource = $this->guessResource($resource);
        $items = ($resource::getModel())::orderBy('id', 'desc')
            ->paginate($resource::$paginate ?? 10);

        return view($resource::$indexView ?? 'rambo::crud.index', [
            'resource' => $resource,
            'items' => $items,
        ]);
    }

    public function show($resource, $id)
    {
        $resource = $this->guessResource($resource);
        $item = ($resource::getModel())::findOrFail($id);

        return view($resource::$showView ?? 'rambo::crud.show', [
            'resource' => $resource,
            'item' => $item,
        ]);
    }

    public function create($resource)
    {
        $resource = $this->guessResource($resource);

        return view($resource::$createView ?? 'rambo::crud.create', [
            'resource' => $resource,
        ]);
    }

    public function edit($resource, $id)
    {
        $resource = $this->guessResource($resource);
        $item = ($resource::getModel())::findOrFail($id);

        return view($resource::$editView ?? 'rambo::crud.edit', [
            'resource' => $resource,
            'item' => $item,
        ]);
    }

    public function delete($resource, $id)
    {
        $resource = $this->guessResource($resource);
        $item = ($resource::getModel())::findOrFail($id);

        return view($resource::$deleteView ?? 'rambo::crud.delete', [
            'resource' => $resource,
            'item' => $item,
        ]);
    }

    public function deleteConfirm($resource, $id)
    {
        $this->guessResource($resource)::getModel()::findOrFail($id)
            ->delete();

        return redirect("/admin/{$resource}");
    }
}
