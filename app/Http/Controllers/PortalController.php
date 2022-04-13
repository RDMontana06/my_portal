<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portal;
use RealRashid\SweetAlert\Facades\Alert;

class PortalController extends Controller
{
    public function new_portal(Request $request){
        // dd($request->all());
        
        $this->validate($request, [
            'title_portal' => 'unique:portals|required',
            'link_portal' => 'required',
            'image_icon' => 'required',
            
        ]);

        $portal = new Portal;
        $portal->title_portal = $request->title_portal;
        $portal->link_portal = $request->link_portal;
        $attachment = $request->file('image_icon');
        $original_name = $attachment->getClientOriginalName();
        $name = time().'_'.$attachment->getClientOriginalName();
        $attachment->move(public_path().'/portal_images/', $name);
        $file_name = '/portal_images/'.$name;
        
        $portal->image_icon = $file_name;
        $portal->add_by = auth()->user()->id;
        
        $portal->save();
        Alert::success('Successfully Created', 'Portal Name '.$portal->title_portal)->persistent('Dismiss');
        // return redirect('/home')->withSuccess('Task Created Successfully!');
        // $request->session()->flash('status','Successfully created');
        return back();
    }
    // Update Portal Status
    public function updatePortalStatus(Request $request, $id){
        // dd($request->all());
        //Alert::question('Question Title', 'Question Message');
        Portal::Where('id', $id )->update(['status' => 0]);
        return back();
    }
}
