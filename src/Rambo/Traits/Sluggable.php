<?php

namespace AngryMoustache\Rambo\Rambo\Traits;

use Illuminate\Support\Str;

trait Sluggable
{
    public $slugField = 'name';

    public function beforeSave($fields, $id = null)
    {
        $slug = Str::slug($fields[$this->slugField]);

        if ($id !== null) {
            $check = self::$model::where($this->slugField, $slug)
                ->where('id', '!=', $id)
                ->count();

            if ($check > 0) {
                $slug .= "-${check}";
            }
        }

        $fields['slug'] = $slug;
        return parent::beforeSave($fields);
    }
}
