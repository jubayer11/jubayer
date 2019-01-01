<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\photo;
use App\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users=User::all();
        $roles=Role::lists('name','id')->all();
        return view('admin.users.create',compact('roles','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
        if(trim($request->password)==''){
            $input=$request->except('password');
        }
        else{
            $input=$request->all();
            $input['password']=bcrypt($request->password);
        }
        if($file=$request->file('photo_id'))
        {
            $name=time() .$file->getClientOriginalName();
            $file->move('images',$name);
            $photo=photo::create(['file'=>$name]);
            $input['photo_id']=$photo->id;

        }

        User::create($input);
        Session::flash('Created_user','the user has been created');
       //User::create($input);
       return redirect('/admin/users');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.users.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findOrFail($id);
        $roles=Role::lists('name','id')->all();
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        //
        $user=User::findOrFail($id);

        if(trim($request->password)==''){
            $input=$request->except('password');
        }
        else{
            $input=$request->all();
            $input['password']=bcrypt($request->password);
        }

        if($file=$request->file('photo_id'))
        {
            $name=time() .$file->getClientOriginalName();
            $file->move('images',$name);
            $photo=photo::create(['file'=>$name]);
            $input['photo_id']=$photo->id;

        }
        $user->update($input);
        Session::flash('Updated_user','the user has been updated');
        return redirect('admin/users');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user=User::findOrFail($id);
        unlink(public_path()."/images/".$user->photo->file);
        $user->delete();
        Session::flash('deleted_user','the user has been deleted');
        
       return  redirect('/admin/users');
    }
}
