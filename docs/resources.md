# Resources

Resources are the core files that you will need to create for your CMS, in it you will have to define what fields you wish to show, what labels it should use, etc.

Let's start with making a Page resource, create a new folder called Rambo in your app folder if you do not have one already. Inside this folder, create a file called `Page.php`, the code below is the bare minimum code that you need to make a resource.

💡 You don't have to call this folder Rambo, you can call it whatever you like, however in the documentation we will always refer to the Rambo folder whenever we talk about resources.

```php
<?php

namespace App\Rambo;

use AngryMoustache\Rambo\Resource\Resource;

class Page extends Resource
{
    public function fields()
    {
        return [

        ];
    }
}
```

## Defining fields

We'll want to add some fields to our resource, there are lots of pre-made Rambo fields ready for use, so let's use them.

You can find a list of available fields and how to use them here.

```php
<?php

namespace App\Rambo;

use AngryMoustache\Rambo\Resource\Fields\Button;
use AngryMoustache\Rambo\Resource\Fields\EditorField;
use AngryMoustache\Rambo\Resource\Fields\TextField;
use AngryMoustache\Rambo\Resource\Resource;

class Page extends Resource
{
    public function fields()
    {
        return [
            TextField::make('title'),

            EditorField::make('body'),

            Button::make(),
        ];
    }
}
```

⚠️ It's important to always include the Button::make(), at the end of your fields array, this will add the Submit button to your forms, otherwise, you won't be able to save your resources in the CMS!
