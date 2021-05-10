<?php

namespace AngryMoustache\Rambo\Models;

use AngryMoustache\Media\Models\Attachment;
use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    protected $fillable = [
        'username',
        'email',
        'password',
        'avatar_id',
    ];

    public function avatar()
    {
        return $this->belongsTo(Attachment::class, 'avatar_id');
    }

    public function link()
    {
        return route('rambo.crud.show', [
            'resource' => 'administrators',
            'id' => $this->id,
        ]);
    }
}
