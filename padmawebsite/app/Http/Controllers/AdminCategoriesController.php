<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryCreateRequest;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        return view('padma.layout.admin.categories.index', compact('categories'));
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
    public function store(CategoryCreateRequest $request)
    {
        //
       // Category::create($request->all());

        //=========================

        try {
            // do your database transaction here
            Category::create($request->all());
            return redirect('admin/categories');
        } catch (\Illuminate\Database\QueryException $e) {
            session()->flash('unique_error_message', 'This Category has been inserted before!, Please insert new category');
            return redirect('admin/categories');
           // return "something went wrong with the transaction one";



            // something went wrong with the transaction, rollback
        } catch (\Exception $e) {
            // something went wrong elsewhere, handle gracefully

            session()->flash('unique_error_message', 'Something went wrong!');
            return redirect('admin/categories');
        }

        //==========================
        //return redirect('admin/categories');



        //
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
        $category = Category::findOrFail($id);

        return view('padma.layout.admin.categories.edit', compact( 'category'));

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

        $category = Category::findOrFail($id);

        //==========
        try {
            // do your database transaction here
            $category->update($request->all());
            return redirect('admin/categories');
        } catch (\Illuminate\Database\QueryException $e) {
            session()->flash('unique_error_message', 'This Category has been inserted before!, Please insert new category');
            return view('padma.layout.admin.categories.edit', compact( 'category'));
        } catch (\Exception $e) {
            session()->flash('unique_error_message', 'Something went wrong!');
            return redirect('admin/categories');
        }
        //=============



       // return redirect('admin/categories');
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

        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('admin/categories');
    }

    public function destroyCategory($id){

        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('admin/categories');


    }

}
