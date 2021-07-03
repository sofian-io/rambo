<?php

namespace AngryMoustache\Rambo\Resource\Fields;

use Illuminate\Support\Str;

class SlugField extends Field
{
    public function beforeSave($value)
    {
        $fields = $this->formFields;
        if ($this->itemId || ! empty($fields[$this->resource->getSlugField()])) {
            return $value;
        }

        $slug = Str::slug($fields[$this->resource->getSlugNameField()]);

        $slugCount = 0;
        $safetyCount = 0;
        while ($safetyCount < 100 && $this->checkSlugExists($slug)) {
            if ($slugCount === 0) {
                $slug .= '-1';
            } else {
                $slug = Str::replaceLast("-${slugCount}", '-' . ($slugCount + 1), $slug);
            }

            $slugCount++;
            $safetyCount++;
        }

        return $slug;
    }

    public function checkSlugExists($slug)
    {
        return $this->resource->ramboQuery()
            ->where($this->resource->getSlugField(), $slug)
            ->first();
    }
}
