<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Sport;
use App\Teacher;
use Illuminate\Http\Request;

class AdminTeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teachers = Teacher::all();
        return view('padma.layout.admin.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sports = Sport::all();
        return view('padma.layout.admin.teachers.create', compact('sports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateRequest $request)
    {
        //
        // do your database transaction here

        try {

            $teacher =   Teacher::create($request->all());
            //Teacher::create($input);
          // $teacher->save();

            $sports = Sport::findOrFail($request->checkBoxArray);

          // dump($teacher);

            $teacher->sports()->sync($sports);

            return redirect('admin/teachers/create');
        } catch (\Illuminate\Database\QueryException $e) {
            session()->flash('unique_error_message', 'This E-mail Address has been inserted before!, Please insert new E-mail Address');
            return redirect('admin/teachers/create');
        }


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
        $teacher = Teacher::findOrFail($id);
        $checkedSports = $teacher->sports;
        $sports = Sport::all();

        return view('padma.layout.admin.teachers.edit', compact('teacher','sports','checkedSports'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryCreateRequest $request, $id)
    {
        //
        $teacher = Teacher::findOrFail($id);


        // do your database transaction here
        try {
            $teacher->name = $request->name;
            $teacher->email = $request->email;
            $teacher->phone_number = $request->phone_no;
            $teacher->id_number = $request->id_number;
            $teacher->address = $request->address;
            $teacher->status = $request->status;
            //Teacher::create($input);
            $teacher->update();
            $sports = Sport::findOrFail($request->checkBoxArray);

            // dump($teacher);

            $teacher->sports()->sync($sports);
            // $teacher->update($request->all());
            return redirect('admin/teachers');
        } catch (\Illuminate\Database\QueryException $e) {
            session()->flash('unique_error_message', 'This E-mail Address has been inserted before!, Please insert new E-mail Address');
            return view('padma.layout.admin.teachers.edit', compact('teacher'));
        } catch (\Exception $e) {
            session()->flash('unique_error_message', 'Something went wrong!');
            return view('padma.layout.admin.teachers.edit', compact('teacher'));
        }

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

        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return redirect('admin/teachers');
    }

    public function destroyTeacher($id)
    {

        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return redirect('admin/teachers');


    }
}
