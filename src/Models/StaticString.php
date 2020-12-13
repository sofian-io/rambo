<?php

namespace AngryMoustache\Rambo\Models;

use Illuminate\Database\Eloquent\Model;

class StaticString extends Model
{
    protected $fillable = [
        'scope',
        'key',
        'value',
    ];

    public function getNameAttribute()
    {
        return "{$this->scope}.{$this->key}";
    }
}
