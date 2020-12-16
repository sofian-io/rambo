<?php

namespace AngryMoustache\Rambo\Rambo\Traits;

use Illuminate\Support\Str;

trait Sluggable
{
    public $slugNameField = 'name';
    public $slugField = 'slug';

    public function beforeSave($fields, $id = null)
    {
        $slug = Str::slug($fields[$this->slugNameField]);

        if ($id !== null) {
            $check = self::$model::where($this->slugNameField, $slug)
                ->where('id', '!=', $id)
                ->count();

            if ($check > 0) {
                $slug .= "-${check}";
            }
        }

        $fields[$this->slugField] = $slug;
        return parent::beforeSave($fields);
    }

    public function getRouteKeyName()
    {
        return $this->slugField;
    }
}
