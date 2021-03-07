<?php

namespace AngryMoustache\Rambo\Rambo\Traits;

use Illuminate\Support\Str;

trait Sluggable
{
    public function beforeSave($fields, $id = null)
    {
        $slug = Str::slug($fields[self::$slugNameField ?? 'name']);

        if ($id !== null) {
            $check = self::getModel()::where(self::$slugNameField ?? 'name', $slug)
                ->where('id', '!=', $id)
                ->count();

            if ($check > 0) {
                $slug .= "-${check}";
            }
        }

        $fields[self::$slugField ?? 'slug'] = $slug;
        return parent::beforeSave($fields);
    }

    public function getRouteKeyName()
    {
        return self::$slugField ?? 'slug';
    }
}
