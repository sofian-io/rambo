# Config file

The rambo config file contains the following:

* [admin-route](#admin-route)
* [resources](#resources)
* [cards](#cards)

## <a name="admin-route"></a>admin-route

With this, you can change the route prefix, by default this is `admin`.

```php
'admin-route' => 'admin',
```

## <a name="resources"></a>resources

This contains the list of all available resources, you can group them together in arrays to create a folder structure.

```php
'resources' => [
    'Administration' => [
        Administrator::class,
    ],
    'Website' => [
        Attachment::class,
        Setting::class,
    ],
    'Gallery' => [
        Upload::class,
        Artist::class,
        'Filters' => [
            Tag::class,
            Category::class,
        ],
    ],
],
```

## <a name="cards"></a>cards

This config will tell Rambo what cards to load in the dashboard.
This is a work in progress, but you can add basic cards to this, by default the `WelcomeCard` is loaded.
More about this in the Card documentation (soon tm).

```php
'cards' => [
    WelcomeCard::class,
],
```
