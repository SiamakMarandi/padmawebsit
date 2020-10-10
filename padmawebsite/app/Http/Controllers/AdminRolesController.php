<?php

namespace App\Http\Controllers;

use App\Http\Requests\RolesCreateRequest;
use App\Role;
use Illuminate\Http\Request;

class AdminRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $roles = Role::all();

        return view('padma.layout.admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolesCreateRequest $request)
    {
        //
        try {
            // do your database transaction here
            Role::create($request->all());
           // session()->flash('empty_box_input_error', 'Please write a role!');
            return redirect('admin/roles');
        } catch (\Illuminate\Database\QueryException $e) {
            session()->flash('unique_error_message', 'This Role has been inserted before!, Please insert new Role');
            return redirect('admin/roles');
            // something went wrong with the transaction, rollback
        } catch (\Exception $e) {
            // something went wrong elsewhere, handle gracefully

            session()->flash('unique_error_message', 'Something went wrong!');
            return redirect('admin/roles');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $role = Role::findOrFail($id);
        return view('padma.layout.admin.roles.edit', compact( 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $role = Role::findOrFail($id);

        //==========
        try {
            // do your database transaction here
            $role->update($request->all());
            return redirect('admin/roles');
        } catch (\Illuminate\Database\QueryException $e) {
            session()->flash('unique_error_message', 'This Role has been inserted before!, Please insert new Role');
            return view('padma.layout.admin.roles.edit', compact( 'role'));
        } catch (\Exception $e) {
            session()->flash('unique_error_message', 'Something went wrong!');
            return redirect('admin/roles');
        }


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

        $role = Role::findOrFail($id);
        $role->delete();
        return redirect('admin/roles');
    }

    public function destroyRole($id){

        $role = Role::findOrFail($id);
        $role->delete();
        return redirect('admin/roles');


    }
}
