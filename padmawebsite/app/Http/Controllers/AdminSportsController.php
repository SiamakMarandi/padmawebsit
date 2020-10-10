<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Photo;
use App\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Integer;

class AdminSportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sports = Sport::all();
        return view('padma.layout.admin.sports.index', compact('sports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('padma.layout.admin.sports.create');
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

        try {
            // do your database transaction here
            //Sport::create($request->all());
            $sport = new Sport();
            $sport->name = $request->name;
            $sport->description = $request->description;
            $sport->save();


//dd($request->photos);

            $files = ($request->file('sport_photos'));

            if ($files) {

                for ($i = 0; $i < sizeof($files); $i++) {

                    // $file = $files[$i+1];


                    $name = ($request->name) . time() . ($i) . '.jpg';
                    // dd($name);

                    $files[$i]->move('images/sports', $name);
                }
            }

            // dd($name);

            // Photo::create(['photo_path' => $name]);

            return redirect('admin/sports');
        } catch
        (\Illuminate\Database\QueryException $e) {
            session()->flash('unique_error_message', 'This Sport has been inserted before!, Please insert new sport name');
            return redirect('admin/sports');
            // return "something went wrong with the transaction one";


            // something went wrong with the transaction, rollback
        } catch (\Exception $e) {
            // something went wrong elsewhere, handle gracefully

            session()->flash('unique_error_message', 'Something went wrong!');
            return redirect('admin/sports');
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
        $sport = Sport::findOrFail($id);

        return view('padma.layout.admin.sports.edit', compact('sport'));
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
        $sport = Sport::findOrFail($id);

        //==========
        try {
            // do your database transaction here
            $sport->update($request->all());
/*            $sport = new Sport();
            $sport->name = $request->name;
            $sport->description = $request->description;
            $sport->update();*/
            $files = ($request->file('sport_photos'));

            if ($files) {

                for ($i = 0; $i < sizeof($files); $i++) {

                    // $file = $files[$i+1];


                    $name = ($request->name) . time() . ($i) . '.jpg';
                    // dd($name);

                    $files[$i]->move('images/sports', $name);
                }
            }
            return redirect('admin/sports');
        } catch (\Illuminate\Database\QueryException $e) {
            session()->flash('unique_error_message', 'This Sport has been inserted before!, Please insert new sport');
            return view('padma.layout.admin.sports.edit', compact('sport'));
        } catch (\Exception $e) {
            session()->flash('unique_error_message', 'Something went wrong!');
            return redirect('admin/sports');
        }
        //=============


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

        $sport = Sport::findOrFail($id);

        $name = $sport->name;
        $files = glob("images/sports/$name*.jpg");
        foreach ($files as $file) {
            unlink(public_path($file));
        }
        $sport->delete();
        return redirect('admin/sports');
    }

    public function destroySport($id)
    {

        $sport = Sport::findOrFail($id);
        $name = $sport->name;
        $files = glob("images/sports/$name*.jpg");

      //  dd($files);
        foreach ($files as $file) {
            unlink(public_path($file));
        }
        $sport->delete();
        return redirect('admin/sports');


    }
}
