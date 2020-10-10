<?php

namespace App\Http\Controllers;

use App\Category;
use App\post;
use App\Slider;
use App\Sport;
use App\timetable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
/*    public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('home',compact('user'));
    }

    public function contact()
    {
        //

        return view('padma.layout.public.contact');
    }

    public function about_us()
    {
        return view('padma.layout..public.about');

    }

    public function time_schedule()
    {

        $timetables = Timetable::all();
        return view('padma.layout.public.schedule', compact('timetables'));

    }
    public function home()
    {
        //

        $posts = Post::all();
        $sliders = Slider::all();


        return view('padma.layout.index', compact('posts', 'sliders'));
    }

    public function post($id){

        $post = Post::findOrFail($id);


        return view('padma.layout.post', compact('post'));

    }

    public function sport($id, $sport){

        $sport_name = Sport::findOrFail($id);
        //$files = array();
        $name = $sport_name->name;
//dd($name);
      /*  $files = File::allFiles('images/sports/');*/
        $files = glob("images/sports/$name*.jpg");
        //dd($files);
/*        foreach (glob("/images/sports/*.jpg") as $file) {
            $files[] = $file;
        }
        dd($files);*/
        //$name = $sport_name->name;
        return view('padma.layout.public.sport', compact('sport_name', 'files'));

    }

}
