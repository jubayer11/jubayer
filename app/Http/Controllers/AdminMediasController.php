<?php

namespace App\Http\Controllers;

use App\photo;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminMediasController extends Controller
{
    //

    public function index(){
        $photos=photo::all();
        return view('admin.media.index',compact('photos'));
    }
    public function create(){
        return view('admin.media.create');
    }
    public function store(Request $request){
        $file=$request->file('file');
        $name=time().$file->getClientOriginalName();
        $file->move('images',$name);
        Photo::create(['file'=>$name]);
    }
    public function destroy($id){
        $photo=photo::findOrFail($id);

        unlink(public_path()."/images/".$photo->file);
        $photo->delete();
        Session::flash('deleted_media','the media has been deleted');
        return redirect('/admin/media');
       

    }
    public  function deleteMedia(Request $request){
        return "it works";

    }

}
