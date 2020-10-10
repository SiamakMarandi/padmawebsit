<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersEditRequest;
use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;
use App\User;
use App\User_Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $users = User::all();
        return view('padma.layout.admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $roles = Role::pluck('name', 'id')->all();
        return view('padma.layout.admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //
        // $user = Auth::user();
        // return $request->all();
        //return $request->get('name');


        //===========
        // User::create($request->all());


        //   return redirect('admin/users/users');
        //======================

        $input = $request->all();
        try {
        $input['password'] = bcrypt($request->password);
        User::create($input);
        if ($file = $request->file('user_photo')) {


            // $user = User::all()->last()->id;
            $user_id = User::all()->last()->id;


            $name = time() . $file->getClientOriginalName();
            $file->move('images/users', $name);
            //$photo = User_Photo::create(['photo_path' => $name, 'user_id => $user->id']);
            $photo = new User_Photo;
            $photo->photo_path = $name;
            $photo->user_id = $user_id;
            $photo->save();


            // $input['user_photo_id'] = $photo->id;

        }

        //================================

            // do your database transaction here



            $request->session()->flash('message', 'User has been created!');
            return redirect('admin/users/create');
        } catch (\Illuminate\Database\QueryException $e) {
            session()->flash('unique_error_message', 'This E-mail Address has been inserted before!, Please insert new E-mail Address');
            return redirect('admin/users/create');
        } catch (\Exception $e) {
            session()->flash('unique_error_message', 'Something went wrong!');
            return redirect('admin/users/create');
        }


//===========================================



//===============================================

        /*
                if($request->file('user_photo_id')){

                    return "photo exist";
                }*/

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);

        $roles = Role::pluck('name', 'id')->all();

        return view('padma.layout.admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        //
        //$user = Auth::user();
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();

        // return $request->all();

        try {
        $input = $request->all();


        if ($file = $request->file('user_photo')) {
            //$user_id = User::all()->last()->id;
            if (!empty($user->user_photo)) {

                $image_path = "/images/users/{$user->user_photo->photo_path}";

                unlink(public_path($image_path));

                $user->user_photo->delete();
            }

            $name = time() . $file->getClientOriginalName();
            $file->move('images/users', $name);
            //  $photo = User_Photo::create(['photo_path' => $name]);
            // $input['user_photo_id'] = $photo->id;

            /*  $photo = new User_Photo;
              $photo->photo_path = $name;
              $photo->user_id = $id;
              $photo->save();*/

            $photo = User_Photo::create(['photo_path' => $name, 'user_id' => $id]);
            //$input['user_photo_id'] = $photo->id;


        }

        $input['password'] = bcrypt($request->password);
        $user->update($input);


        //=================

            // do your database transaction here
            return redirect('admin/users');
        } catch (\Illuminate\Database\QueryException $e) {
            session()->flash('unique_error_message', 'This E-mail Address has been inserted before!, Please insert new E-mail Address');
            return view('padma.layout.admin.users.edit', compact('user', 'roles'));
        } catch (\Exception $e) {
            session()->flash('unique_error_message', 'This E-mail Address has been inserted before!, Please insert new E-mail Address');
            return view('padma.layout.admin.users.edit', compact('user', 'roles'));
        }

        //=======================


        //$user->update($input);


        //$request->session()->flash('message', 'User has been created!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //return "Destroy";
        $user = User::findOrFail($id);


        // unlink(public_path("/images/users/{$user->user_photo->photo_path}"));


        if (!empty ($user->user_photo->photo_path)) {
            $image_path = "/images/users/{$user->user_photo->photo_path}";

            unlink(public_path($image_path));
        }

        $user->delete();

        session()->flash('delete_user', 'User has been deleted!');
        return redirect('admin/users');

    }

    public function deleteUser(Request $request)
    {

        if (!empty($request->checkBoxArray)) {
            $users = User::findOrFail($request->checkBoxArray);
            foreach ($users as $user) {

                if (!empty ($user->user_photo->photo_path)) {
                    $image_path = "/images/users/{$user->user_photo->photo_path}";

                    unlink(public_path($image_path));
                }

                $user->delete();
            }
           // return "it work";
           return redirect()->back();

        } else {

            return redirect()->back();

           // return "it work";
        }


        //dd($request);
        //return "it works";
    }

}
