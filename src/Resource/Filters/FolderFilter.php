<?php

namespace AngryMoustache\Rambo\Resource\Filters;

class FolderFilter extends Filter
{
    public function fields()
    {
        return [];
    }

    public function handle($query, $value = null)
    {
        return $query->where('folder_location', $value['folder_location'] ?? '');
    }
}
