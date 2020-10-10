<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class AdminMediasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $photos = Photo::all();

        return view('padma.layout.admin.medias.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('padma.layout.admin.medias.create');
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

        $file = $request->file('file');

        $name = time() . $file->getClientOriginalName();

        $file->move('images/photos', $name);

        Photo::create(['photo_path' => $name]);


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

        $photo = Photo::findOrFail($id);


        // unlink(public_path("/images/users/{$user->user_photo->photo_path}"));


        if (!empty ($photo->photo_path)) {
            $image_path = "/images/photos/{$photo->photo_path}";

            unlink(public_path($image_path));
        }

        $photo->delete();

        session()->flash('delete_photo', 'Photo has been deleted!');
        return redirect('admin/medias');
    }

    public function deleteMedia(Request $request)
    {

        if (isset($request->delete_single)) {

            $this->destroy($request->photo);
            return redirect()->back();
        }

        if (isset($request->delete_all) && !empty($request->checkBoxArray)) {


            $photos = Photo::findOrFail($request->checkBoxArray);


            foreach ($photos as $photo) {

                $photo->delete();

            }


            return redirect()->back();

        }
        else{

            return redirect()->back();

        }




        //dd($request);
        //return "it works";


    }


}
