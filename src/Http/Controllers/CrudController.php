<?php

namespace AngryMoustache\Rambo\Http\Controllers;

use App\Http\Controllers\Controller;

class CrudController extends Controller
{
    public function index($resource)
    {
        return view('rambo::crud.index', [
            'resource' => $resource,
            'breadcrumbs' => [[
                'route' => route('rambo.dashboard'),
                'label' => 'Dashboard',
            ], [
                'route' => $resource->index(),
                'label' => $resource->label(),
            ]],
        ]);
    }

    public function show($resource, $id)
    {
        $resource = $resource->item($id);
        $item = $resource->item;

        return view('rambo::crud.show', [
            'resource' => $resource,
            'item' => $item,
            'breadcrumbs' => [[
                'route' => route('rambo.dashboard'),
                'label' => 'Dashboard',
            ], [
                'route' => $resource->index(),
                'label' => $resource->label(),
            ], [
                'route' => $resource->show($id),
                'label' => optional($item)->{$resource->displayName()} ?? $id,
            ]],
        ]);
    }

    public function create($resource)
    {
        return view('rambo::crud.create', [
            'resource' => $resource,
            'breadcrumbs' => [[
                'route' => route('rambo.dashboard'),
                'label' => 'Dashboard',
            ], [
                'route' => $resource->index(),
                'label' => $resource->label(),
            ], [
                'route' => $resource->create(),
                'label' => 'Create',
            ]],
        ]);
    }

    public function edit($resource, $id)
    {
        $resource = $resource->item($id);
        $item = $resource->item;

        return view('rambo::crud.edit', [
            'resource' => $resource,
            'item' => $item,
            'breadcrumbs' => [[
                'route' => route('rambo.dashboard'),
                'label' => 'Dashboard',
            ], [
                'route' => $resource->index(),
                'label' => $resource->label(),
            ], [
                'route' => $resource->show($id),
                'label' => 'Edit: ' . optional($item)->{$resource->displayName()} ?? $id,
            ]],
        ]);
    }

    public function delete($resource, $id)
    {
        $resource = $resource->item($id);
        $item = $resource->item;

        return view('rambo::crud.delete', [
            'resource' => $resource,
            'item' => $item,
            'breadcrumbs' => [[
                'route' => route('rambo.dashboard'),
                'label' => 'Dashboard',
            ], [
                'route' => $resource->index(),
                'label' => $resource->label(),
            ], [
                'route' => $resource->show($id),
                'label' => 'Delete: ' . optional($item)->{$resource->displayName()} ?? $id,
            ]],
        ]);
    }
}
