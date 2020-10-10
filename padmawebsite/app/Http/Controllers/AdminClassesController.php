<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassCreateRequest;
use App\Level;
use App\Sport;
use App\Teacher;
use App\timetable;
use Illuminate\Http\Request;

class AdminClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $timetables = Timetable::all();

        return view('padma.layout.admin.classes.index', compact('timetables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        // $levels = ['مقدماتی', 'متوسط', 'پیشرفته', 'عمومی'];
        //$sports = Sport::all();
        $sports = Sport::orderBy('name')->pluck('name', 'id')->toArray();
        $levels = Level::orderBy('name')->pluck('name', 'id')->toArray();
        // dd($sports);
        // $sports = Sport::pluck('name', 'id')->all();
        $teachers = Teacher::orderBy('name')->pluck('name', 'id')->toArray();
        return view('padma.layout.admin.classes.create', compact('levels', 'sports', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $input = $request->all();
        if($request->sportName_id)
        $sport = Sport::findOrFail($request->sportName_id);
        if($request->teacherName_id)
        $teacher = Teacher::findOrFail($request->teacherName_id);
        if($request->level_id)
        $level = Level::findOrFail($request->level_id);

        //dd($teacher);

        $timetable = new Timetable;
        //    $timetable->sportName = $sport->name;
        $timetable->saturday_from = $request->saturday_from;
        $timetable->saturday_to = $request->saturday_to;
        $timetable->sunday_from = $request->sunday_from;
        $timetable->sunday_to = $request->sunday_to;
        $timetable->monday_from = $request->monday_from;
        $timetable->monday_to = $request->monday_to;
        $timetable->tuesday_from = $request->tuesday_from;
        $timetable->tuesday_to = $request->tuesday_to;
        $timetable->wednesday_from = $request->wednesday_from;
        $timetable->wednesday_to = $request->wednesday_to;
        $timetable->thursday_from = $request->thursday_from;
        $timetable->thursday_to = $request->thursday_to;
        $timetable->friday_from = $request->friday_from;
        $timetable->friday_to = $request->friday_to;

        $timetable->description = $request->description;
        if ($request->teacherName_id)
            $timetable->teacher_id = $teacher->id;
        if ($request->sportName_id)
            $timetable->sport_id = $sport->id;
        if ($request->level_id)
            $timetable->level_id = $level->id;

//dd( $timetable->teacherName);


        //Timetable::create($input);
        $timetable->save();
        return redirect('admin/classes/create');
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
        $sports_counter = 1;
        $levels_counter = 1;
        $teachers_counter = 1;
        $sports = Sport::orderBy('name')->pluck('name', 'id')->toArray();
        $sports_all = Sport::all();
        $levels = Level::orderBy('name')->pluck('name', 'id')->toArray();
        $levels_all = Level::all();
        // dd($sports);
        // $sports = Sport::pluck('name', 'id')->all();
        $teachers = Teacher::orderBy('name')->pluck('name', 'id')->toArray();
        $teachers_all = Teacher::all();
        $timetable = Timetable::findOrFail($id);
        $sport_name = $timetable->sport->name;
        $level_name = $timetable->level->name;
        $teacher_name = $timetable->teacher->name;


        foreach ($sports_all as $sport) {

            if ($sport->name == $sport_name) {
                $sports_counter = $sport->id;
            }

        }
        foreach ($teachers_all as $teacher) {

            if ($teacher->name == $teacher_name) {
                $teachers_counter = $teacher->id;
            }

        }
        foreach ($levels_all as $level) {

            if ($level->name == $level_name) {
                $levels_counter = $level->id;
            }

        }

        //     dd($teachers_counter);


        //   dd($levels_counter);

        return view('padma.layout.admin.classes.edit', compact('timetable', 'sports', 'levels', 'teachers', 'sports_counter', 'levels_counter', 'teachers_counter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $timetable = Timetable::findOrFail($id);
        $sport = Sport::findOrFail($request->sportName_id);
        $teacher = Teacher::findOrFail($request->teacherName_id);
        $level = Level::findOrFail($request->level);

        //  $timetable->sportName = $sport->name;
        $timetable->saturday_from = $request->saturday_from;
        $timetable->saturday_to = $request->saturday_to;
        $timetable->sunday_from = $request->sunday_from;
        $timetable->sunday_to = $request->sunday_to;
        $timetable->monday_from = $request->monday_from;
        $timetable->monday_to = $request->monday_to;
        $timetable->tuesday_from = $request->tuesday_from;
        $timetable->tuesday_to = $request->tuesday_to;
        $timetable->wednesday_from = $request->wednesday_from;
        $timetable->wednesday_to = $request->wednesday_to;
        $timetable->thursday_from = $request->thursday_from;
        $timetable->thursday_to = $request->thursday_to;
        $timetable->friday_from = $request->friday_from;
        $timetable->friday_to = $request->friday_to;
        //  $timetable->teacherName = $teacher->name;
        //   $timetable->level = $level->name;
        $timetable->description = $request->description;
        $timetable->teacher_id = $teacher->id;
        $timetable->sport_id = $sport->id;
        $timetable->level_id = $level->id;
//dd($timetable->sportName);
        $timetable->save();
        return redirect('/admin/classes');

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
        $timetable = Timetable::findOrFail($id);

        $timetable->delete();

        session()->flash('delete_class', 'Class has been deleted!');
        return redirect('admin/classes');
    }

    public function destroyClass($id){

        $timetable = Timetable::findOrFail($id);
        $timetable->delete();
        return redirect('admin/classes');


    }
}
