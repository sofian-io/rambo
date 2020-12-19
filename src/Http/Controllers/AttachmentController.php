<?php

namespace AngryMoustache\Rambo\Http\Controllers;

use App\Http\Controllers\Controller;

class AttachmentController extends Controller
{
    public function massUpload()
    {
        return view('rambo::attachment.mass-upload');
    }
}
