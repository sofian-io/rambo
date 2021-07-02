# Resource Actions

⚠️ The actions are something that will most likely be refactored in the near future.

## General

Every resource comes with a defalt set of "actions", for example the Create/Edit/Delete actions.
You can create your own custom actions and add them to your resource.
There are two types of actions, the normal `Action` and the `IndexAction`.

The `Action`s will be shown on all items in the index table and on any type of detail page (edit, show, delete, ...)

The `IndexActions` will be shown on other pages that are not detail-views, such as create or index.

## Actions

By default a resource has the following actions:

```php
public function actions()
{
    return [
        ShowAction::class, // Link to the detail page
        EditAction::class, // Link to the edit page
        DeleteAction::class, // Link to the delete page/modal
    ];
}
```

Let's take the `ShowAction` as an example of an action:

```php
<?php

namespace AngryMoustache\Rambo\Resource\Actions;

class ShowAction extends Action
{
    public $icon = 'far fa-eye';

    public $label = 'Show';

    public function getLink()
    {
        return $this->resource->show($this->item->id);
    }
}
```

There's a couple of required attributes/functions in here.

The `$icon` is the font-awesome icon that you want to show on the action.

The `$label` is the name of the action.

The `getLink` should return a link to the page that the action has to lead to.
For more about resource routing, click [here](routing.md).

## Index Actions

By default a resource has the following index actions:

```php
public function indexActions()
{
    return [
        OverviewAction::class,
        CreateAction::class,
    ];
}
```

Let's take the `OverviewAction` as an example of an index action:

```php
<?php

namespace AngryMoustache\Rambo\Resource\IndexActions;

class OverviewAction extends IndexAction
{
    public $icon = 'fas fa-table';

    public $label = 'Overview';

    public function getLink()
    {
        return $this->resource->index();
    }
}
```

Same rules apply as the normal Action, seen above.

## Fetching actions

There are a couple of methods you can override on the resource, along with `actions` and `indexActions`:

```php
public function createActions()
{
    return $this->indexActions();
}

public function showActions()
{
    return $this->actions();
}

public function editActions()
{
    return $this->actions();
}

public function deleteActions()
{
    return $this->actions();
}
```

With these, you can pass different actions to different views.
