<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostCreateRequest;
use App\Photo;
use App\post;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $posts = Post::all();

        return view('padma.layout.admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        //  $categories = Category::pluck('name', 'id')->all();
        $categories = Category::all();
        $status = ['Publish', 'Published', 'Unpublished'];
        return view('padma.layout.admin.posts.create', compact('status', 'categories'));
        //dump($categories->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        //
//==============================================
        // return $request->all();

        /*        $input = $request->all();

                $user = Auth::user();

                if ($file = $request->file('photo_id')) {

                    $name = time() . $file->getClientOriginalName();

                    $file->move('images/posts', $name);

                    $user->posts()->create($input);

                //    $post = Post::all()->last()->id;

                  //  $photo = Photo::create(['photo_path' => $name, 'post_id' => $post+1]);

                //$post = Post::find(1);
                    $post = Post::all()->last();
                    $photo = new Photo;
                $photo->photo_path = $name;
                $post->photos()->save($photo);


                   // $input['photo_id'] = $photo->id;

                }
            else{

                $user->posts()->create($input);

            }

              // dump($post);

                return redirect('http://padma.inf/admin/posts');*/

        //============================================================
//==============================================================

        $user = Auth::user();
        //  if($request->slider)
        // return "it works!";
        $detail = $request->editordata;
        $title = $request->title;
        // $slug_link = str_slug($title, "-");
//==================================================
        /*        $dom = new \domdocument();
                $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

                $images = $dom->getelementsbytagname('img');

                foreach ($images as $k => $img) {
                    $data = $img->getattribute('src');

                    list($type, $data) = explode(';', $data);
                    list(, $data) = explode(',', $data);

                    $data = base64_decode($data);
                    $image_name = time() . $k . '.jpg';
                    $path = 'images/posts' . '/' . $image_name;

                    file_put_contents($path, $data);

                    $img->removeattribute('src');
                    $img->setattribute('src', '/images/posts/' . $image_name);
                }

                $detail = $dom->savehtml();*/
        //=====================================================

        /*
       function make_slug($string, $separator = '-')
{
$string = trim($string);
$string = mb_strtolower($string, 'UTF-8');

// Make alphanumeric (removes all other characters)
// this makes the string safe especially when used as a part of a URL
// this keeps latin characters and Persian characters as well
$string = preg_replace("/[^a-z0-9_\s-۰۱۲۳۴۵۶۷۸۹ءاآؤئبپتثجچحخدذرزژسشصضطظعغفقکكگگلمنوهی]/u", '', $string);

// Remove multiple dashes or whitespaces or underscores
$string = preg_replace("/[\s-_]+/", ' ', $string);

// Convert whitespaces and underscore to the given separator
$string = preg_replace("/[\s_]/", $separator, $string);

return $string;

}
         */


//===================
        $separator = '-';
        $string = trim($title);
        $string = mb_strtolower($string, 'UTF-8');

        // Make alphanumeric (removes all other characters)
        // this makes the string safe especially when used as a part of a URL
        // this keeps latin characters and Persian characters as well
        $string = preg_replace("/[^a-z0-9_\s-ءاآؤئبپتثجچحخدذرزژسشصضطظعغفقكکگلمنوهی]/u", '', $string);

        // Remove multiple dashes or whitespaces or underscores
        $string = preg_replace("/[\s-_]+/", ' ', $string);

        // Convert whitespaces and underscore to the given separator
        $slug_link = preg_replace("/[\s_]/", $separator, $string);

        //==============================
        $post = new Post;
        $slide = new Slider();
        $post->slug = $slug_link;
        $post->body = $detail;
        $post->title = $title;
        $post->user_id = $user->id;
        $post->status = $request->status + 1;

        $post->save();
        //==============================


        if ($post->body) {
            $dom = new \domdocument();
            $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

            $images = $dom->getelementsbytagname('img');


            // foreach ($images as $k => $img) {
            /* if(!empty($request->slider))
                 dd($request->slider);*/

            if ((count($images) > 0) && (!empty($request->slider))) {

                $pic_counter = $request->pic_num;
                if (count($images) < $pic_counter)
                    $pic_counter = 1;

                $data = $images[$pic_counter - 1]->getattribute('src');

                list($type, $data) = explode(';', $data);
                list(, $data) = explode(',', $data);

                $data = base64_decode($data);
                $slide_num = $request->slide_no;
                // if ($slide_num == 'slide1')

                //  dd($request->pic_num + 10);

                //$image_name = $post->id . '.jpg';
                if ($slide_num == 'slide1') {
                    $slide_no = 1;
                    $image_name = $slide_no . '.jpg';

                } elseif ($slide_num == 'slide2') {
                    $slide_no = 2;
                    $image_name = $slide_no . '.jpg';
                } elseif ($slide_num == 'slide3') {
                    $slide_no = 3;
                    $image_name = $slide_no . '.jpg';
                } elseif ($slide_num == 'slide4') {
                    $slide_no = 4;
                    $image_name = $slide_no . '.jpg';
                } else {
                    $slide_no = 5;
                    $image_name = $slide_no . '.jpg';
                }


                $path = 'images/img/slide' . '/' . $image_name;

                file_put_contents($path, $data);;

                // $slide = Slider::findOrFail($slide_no);
                $slide = Slider::where('id', $slide_no)->first();
                // dd($slide);

                if ($slide) {
                    // dd($slide);
                    $slide = Slider::findOrFail($slide_no);

                    $slide->post_id = $post->id;
                    // $slide->slider_photo = $image_name;

                    $slide->update();

                } else {
                    $slide = new Slider();
                    $slide->id = $slide_no;
                    $slide->post_id = $post->id;
                    $slide->slider_photo = $image_name;
                    $slide->save();
                }

                /*              $slide = \App\Slider::updateOrCreate([
                                  'id' => $slide_no,
                                  'post_id' => $post->id,
                                  'slider_photo' => $image_name,
                                  'slide_number' => $slide_no,

                              ]);*/
                ///==========
                /*            $slide = updateOrCreate([
                                'user_id'   => Auth::user()->id,
                                'about'     => $request->get('about'),
                                'sec_email' => $request->get('sec_email'),
                                'gender'    => $request->get("gender"),
                                'country'   => $request->get('country'),
                                'dob'       => $request->get('dob'),
                                'address'   => $request->get('address'),
                                'mobile'    => $request->get('cell_no')
                            ]);*/


                //===========


            }

            // $img->removeattribute('src');
            //  $img->setattribute('src', '/images/posts/' . $image_name);
            //  }

        }


        //   $detail = $dom->savehtml();


        //====================================================
        // $post = Post::find(1);
        //$post = Post::all()->last()->id;
        //$categories = new Category;

        //$categories = Category::findOrFail(category);
        //$categories->name = 'Yoga';
        // $post->id = 39;
        // $post->Categories()->save($categories);
        //  $categories->posts()->save($post);

        //   $post = Post::all()->last();
        //$roleIds = $request->category_id;
        //  dump($post);
        $categories = Category::findOrFail($request->checkBoxArray);

        //  dd($categories);
        // foreach ($categories as $category) {
        // dd($category->id);

        $post->categories()->sync($categories);
        // }


        // $post->categories()->sync($request->category_id);


        //  $category = Category::find(1);
        //  $userIds = [10, 11];
        // $category->posts()->attach($userIds);


        //   return view('summernote_display',compact('summernote'));
        $request->session()->flash('message', 'Post has been created!');
        return redirect('admin/posts/create');

        // dump($post->slug);
        // dump($categories->id);


//============================================================


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        //
        $user = Auth::user();
        $post = Post::findOrFail($id);
        // $category_id = $post->categories->id;


        $status = $post->status;

        switch ($status) {

            case "Publish":

                $counter = 1;
                break;
            case "Published":
                $counter = 2;
                break;
            case "Unpublished":
                $counter = 3;
                break;
            default:
                break;
        }

        //  $categories = Category::pluck('name', 'id')->all();

        $checkedCategories = $post->categories;
        $categories = Category::all();
        //dump($categories);

        return view('padma.layout.admin.posts.edit', compact('post', 'categories', 'counter', 'checkedCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(PostCreateRequest $request, $id)
    {
        //


        ////================================

        $user = Auth::user();
        $post = Post::findOrFail($id);
        $detail = $request->editordata;
        $title = $request->title;


        /*       $dom = new \domdocument();
               $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

               $images = $dom->getelementsbytagname('img');

               foreach ($images as $k => $img) {
                   $data = $img->getattribute('src');

                   list($type, $data) = explode(';', $data);
                   list(, $data) = explode(',', $data);

                   $data = base64_decode($data);
                   $image_name = time() . $k . '.jpg';
                   $path = 'images/posts' . '/' . $image_name;

                   file_put_contents($path, $data);

                   $img->removeattribute('src');
                   $img->setattribute('src', '/images/posts/' . $image_name);
               }

               $detail = $dom->savehtml();*/
        //$post = new Post;

        //================
        $separator = '-';
        $string = trim($title);
        $string = mb_strtolower($string, 'UTF-8');

        // Make alphanumeric (removes all other characters)
        // this makes the string safe especially when used as a part of a URL
        // this keeps latin characters and Persian characters as well
        $string = preg_replace("/[^a-z0-9_\s-ءاآؤئبپتثجچحخدذرزژسشصضطظعغفقكکگلمنوهی]/u", '', $string);

        // Remove multiple dashes or whitespaces or underscores
        $string = preg_replace("/[\s-_]+/", ' ', $string);

        // Convert whitespaces and underscore to the given separator
        $slug_link = preg_replace("/[\s_]/", $separator, $string);

        //=====================

        $post->body = $detail;
        $post->title = $title;
        $post->user_id = $user->id;
        $post->status = $request->status;
        $post->slug = $slug_link;
        //Auth::User()->posts()->whereId($id)->first()->update();
        $post->update();
        //$model->pivot->data = $pivot_data; $model->pivot->update();
        $categories = Category::findOrFail($request->checkBoxArray);
        $post->categories()->sync($categories);


        // $post->categories()->sync($request->category_id);

        $request->session()->flash('message', 'Post has been edited!');
        return redirect('admin/posts');

        ///========================

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
        $post = Post::findOrFail($id);
        $post->delete();
        // dump('hello ');
        return redirect('admin/posts');

    }

    public
    function postStatus($id)
    {

        $post = Post::findOrFail($id);
        if ($post->status == 'Publish') {
            $post->status = 'Published';
        } elseif ($post->status == 'Published') {

            $post->status = 'Unpublished';

        } else {

            $post->status = 'Publish';

        }


        $post->update();
        return redirect()->back();

        // dump($post);


    }

    public
    function destroyPost($id)
    {

        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()->back();

    }


    public
    function deletePost(Request $request)
    {

        if (!empty($request->checkBoxArray)) {
            $posts = Post::findOrFail($request->checkBoxArray);
            foreach ($posts as $post) {


                $post->delete();
            }
            // return "it work";
            return redirect()->back();

        } else {

            return redirect()->back();

            // return "it work";
        }
    }

}
