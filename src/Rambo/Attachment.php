<?php

namespace AngryMoustache\Rambo\Rambo;

use AngryMoustache\Rambo\Fields\Button;
use AngryMoustache\Rambo\Fields\FileSizeField;
use AngryMoustache\Rambo\Fields\TextField;
use AngryMoustache\Rambo\Form;

class Attachment extends Form
{
    public static $nameField = 'original_name';

    public static $model = 'AngryMoustache\Media\Models\Attachment';

    public static $indexView = 'rambo::crud.media.index';
    public static $showView = 'rambo::crud.media.show';

    public static $paginate = 24;
    public static $defaultSortDir = 'desc';

    public function fields()
    {
        return [
            TextField::make('alt_name')
                ->label('Alternative name'),

            TextField::make('extension')
                ->label('File extension')
                ->readonly()
                ->hideFrom(['edit']),

            TextField::make('mime_type')
                ->label('File mime type')
                ->readonly()
                ->hideFrom(['edit']),

            FileSizeField::make('size')
                ->label('File size')
                ->readonly()
                ->hideFrom(['edit']),

            TextField::make('width')
                ->label('File width')
                ->readonly()
                ->hideFrom(['edit']),

            TextField::make('height')
                ->label('File height')
                ->readonly()
                ->hideFrom(['edit']),

            Button::make('submit')
                ->label('Submit'),
        ];
    }
}
