<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    //
    protected $photo;

    public function __construct(Photo $photo)
    {
        $this->photo = $photo;
    }

    public function index()
    {
        return view('image-upload');
    }

    public function store(Request $request)
    {

        dd(public_path());

        $fileName = uniqid() . '_' . $request->image->getClientOriginalName();
        $request->image->move(public_path() . '/images', $fileName);

        $this->photo::create([
            'name' => "YGN" . " " . $fileName,
            'path' => $fileName,
        ]);

    }
}