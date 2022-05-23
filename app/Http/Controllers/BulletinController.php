<?php

namespace App\Http\Controllers;

use App\Bulletin;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BulletinController extends Controller
{
    public function new_bulletin(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'title' => 'unique:bulletins|required',
            'file_path' => 'required',

        ]);

        $bulletin = new Bulletin;
        $bulletin->title = $request->title;

        $attachment = $request->file('file_path');
        $original_name = $attachment->getClientOriginalName();
        $name = time() . '_' . $attachment->getClientOriginalName();
        $attachment->move(public_path() . '/bulletin_images/', $name);
        $file_path = 'bulletin_images/' . $name;
        $file_name = $name;

        $bulletin->file_path = $file_path;
        $bulletin->file_name = $file_name;

        $bulletin->add_by = auth()->user()->id;

        $bulletin->save();

        Alert::success('Successfully Created', 'Bullettin ' . $bulletin->title)->persistent('Dismiss');
        return back();
    }
    public function deleteBulletin(Request $request)
    {

        Bulletin::destroy($request->id);
    }
}
