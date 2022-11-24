<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    //
    public function index()
    {
        return view('image-upload');
    }

    public function store(Request $request)
    {

        $fileName = uniqid() . '_' . $request->image->getClientOriginalName();
        $request->image->move(public_path() . '/images', $fileName);

        Photo::create([
            'name' => $fileName,
            'path' => $fileName,
        ]);

    }
}