<?php

namespace App\Http\Controllers;

use App\Http\Requests\LevelCreateRequest;
use App\Level;
use Illuminate\Http\Request;

class AdminLevelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $levels = Level::all();
        return view('padma.layout.admin.levels.index', compact('levels'));
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
    public function store(LevelCreateRequest $request)
    {
        //
        try {
            // do your database transaction here
            Level::create($request->all());
            return redirect('admin/levels');
        } catch (\Illuminate\Database\QueryException $e) {
            session()->flash('unique_error_message', 'This Level has been inserted before!, Please insert new Level');
            return redirect('admin/levels');
            // return "something went wrong with the transaction one";



            // something went wrong with the transaction, rollback
        } catch (\Exception $e) {
            // something went wrong elsewhere, handle gracefully

            session()->flash('unique_error_message', 'Something went wrong!');
            return redirect('admin/levels');
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
        $level = Level::findOrFail($id);

        return view('padma.layout.admin.levels.edit', compact( 'level'));
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
        $level = Level::findOrFail($id);

        //==========
        try {
            // do your database transaction here
            $level->update($request->all());
            return redirect('admin/levels');
        } catch (\Illuminate\Database\QueryException $e) {
            session()->flash('unique_error_message', 'This Level has been inserted before!, Please insert new Level');
            return view('padma.layout.admin.levels.edit', compact( 'level'));
        } catch (\Exception $e) {
            session()->flash('unique_error_message', 'Something went wrong!');
            return redirect('admin/levels');
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
        $level = Level::findOrFail($id);
        $level->delete();
        return redirect('admin/levels');
    }
    public function destroyLevel($id){

        $level = Level::findOrFail($id);
        $level->delete();
        return redirect('admin/levels');


    }

}
