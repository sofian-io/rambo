<?php

namespace AngryMoustache\Rambo\Rambo;

use AngryMoustache\Rambo\Fields\Button;
use AngryMoustache\Rambo\Fields\FileSizeField;
use AngryMoustache\Rambo\Fields\TextField;
use AngryMoustache\Rambo\Form;

class Attachment extends Form
{
    public static $routeBase = 'attachments';

    public static $nameField = 'original_name';

    public static $label = 'Attachments';
    public static $labelSingular = 'Attachment';

    public static $model = 'AngryMoustache\Media\Models\Attachment';

    public static $indexView = 'rambo::crud.media.index';
    public static $showView = 'rambo::crud.media.show';

    public static $paginate = 24;

    public function fields()
    {
        return [
            TextField::make('alt_name')
                ->label('Alternative name'),

            TextField::make('extension')
                ->label('File extension')
                ->readonly(),

            TextField::make('mime_type')
                ->label('File mime type')
                ->readonly(),

            FileSizeField::make('size')
                ->label('File size')
                ->readonly(),

            TextField::make('width')
                ->label('File width')
                ->readonly(),

            TextField::make('height')
                ->label('File height')
                ->readonly(),

            Button::make('submit')
                ->label('Submit'),
        ];
    }
}
