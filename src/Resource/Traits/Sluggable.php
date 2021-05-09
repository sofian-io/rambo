<?php

namespace AngryMoustache\Rambo\Resource\Traits;

use Illuminate\Support\Str;

trait Sluggable
{
    public $slugNameField = 'name';
    public $slugField = 'slug';

    public function sluggify($fields, $id = null)
    {
        $slug = Str::slug($fields[$this->slugNameField]);

        if ($id !== null) {
            $check = self::getModel()::where($this->slugNameField, $slug)
                ->where('id', '!=', $id)
                ->count();

            if ($check > 0) {
                $slug .= "-${check}";
            }
        }

        $fields[$this->slugField] = $slug;
        return $fields;
    }

    public function getSlugKey()
    {
        return $this->slugField ?? 'slug';
    }
}
