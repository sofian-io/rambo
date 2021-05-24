<?php

namespace AngryMoustache\Rambo\Resource\Traits;

use Illuminate\Support\Str;

trait Sluggable
{
    public function getSlugField()
    {
        return optional($this)->slugField ?? 'slug';
    }

    public function getSlugNameField()
    {
        return optional($this)->slugNameField ?? 'name';
    }

    public function sluggify($fields, $id = null)
    {
        $slug = Str::slug($fields[$this->getSlugNameField()]);

        if ($id !== null) {
            $check = self::getModel()::where($this->getSlugNameField(), $slug)
                ->where('id', '!=', $id)
                ->count();

            if ($check > 0) {
                $slug .= "-${check}";
            }
        }

        $fields[$this->getSlugField()] = $slug;
        return $fields;
    }

    public function getSlugKey()
    {
        return $this->getSlugField() ?? 'slug';
    }
}
