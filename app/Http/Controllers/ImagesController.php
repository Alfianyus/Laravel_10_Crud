<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ImagesController extends Controller
{
    public function index(): view
    {
        return view('image');
    }

    public function imageUpload(Request $request)
    {
        $request->validate([
            'image.*' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:5120',

        ]);

        foreach ($request->image as $value) {
            $imageName = time() . '_' . $value->getClientOriginalName();
            $value->move(public_path('images'), $imageName);

            $imageNams[] = $imageName;
        }
        return redirect()->back()->withSuccess('You have successfully uload image.')->with('image', $imageNams);
    }
}
