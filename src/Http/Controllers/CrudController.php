<?php

namespace AngryMoustache\Rambo\Http\Controllers;

use AngryMoustache\Rambo\Resource\Resource;
use App\Http\Controllers\Controller;

class CrudController extends Controller
{
    public function index(Resource $resource)
    {
        return view($resource->indexView(), [
            'resource' => $resource,
            'breadcrumbs' => [[
                'route' => route('rambo.dashboard'),
                'label' => 'Dashboard',
            ], [
                'route' => $resource->index(),
                'label' => $resource->getLabel(),
            ]],
        ]);
    }

    public function show(Resource $resource, $id)
    {
        $resource = $resource->item($id);
        $item = $resource->item;

        return view($resource->showView(), [
            'resource' => $resource,
            'item' => $item,
            'breadcrumbs' => [[
                'route' => route('rambo.dashboard'),
                'label' => 'Dashboard',
            ], [
                'route' => $resource->index(),
                'label' => $resource->getLabel(),
            ], [
                'route' => $resource->show($id),
                'label' => optional($item)->{$resource->getDisplayName()} ?? $id,
            ]],
        ]);
    }

    public function create(Resource $resource)
    {
        return view($resource->createView(), [
            'resource' => $resource,
            'breadcrumbs' => [[
                'route' => route('rambo.dashboard'),
                'label' => 'Dashboard',
            ], [
                'route' => $resource->index(),
                'label' => $resource->getLabel(),
            ], [
                'route' => $resource->create(),
                'label' => 'Creating ' . $resource->getSingularLabel(),
            ]],
        ]);
    }

    public function edit(Resource $resource, $id)
    {
        $resource = $resource->item($id);
        $item = $resource->item;

        return view($resource->editView(), [
            'resource' => $resource,
            'item' => $item,
            'breadcrumbs' => [[
                'route' => route('rambo.dashboard'),
                'label' => 'Dashboard',
            ], [
                'route' => $resource->index(),
                'label' => $resource->getLabel(),
            ], [
                'route' => $resource->show($id),
                'label' => 'Updating: ' . optional($item)->{$resource->getDisplayName()} ?? $id,
            ]],
        ]);
    }

    public function delete(Resource $resource, $id)
    {
        $resource = $resource->item($id);
        $item = $resource->item;

        return view($resource->deleteView(), [
            'resource' => $resource,
            'item' => $item,
            'breadcrumbs' => [[
                'route' => route('rambo.dashboard'),
                'label' => 'Dashboard',
            ], [
                'route' => $resource->index(),
                'label' => $resource->getLabel(),
            ], [
                'route' => $resource->show($id),
                'label' => 'Deleting: ' . optional($item)->{$resource->getDisplayName()} ?? $id,
            ]],
        ]);
    }
}
