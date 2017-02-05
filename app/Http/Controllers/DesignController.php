<?php

namespace App\Http\Controllers;

use App\design;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class DesignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $images=DB::table('designs')->orderBy('name', 'asc')->paginate(15);
        return view('design.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $it=0;
        $it = DB::table('designs')->max('id');
        $it=$it+1;
        $this->validate($request,[
        'file'=> 'image',
        ]);
        $img=null;
        if($request->file) {
            $file = Input::file('file');
            $file->move('uploads', $it . $file->getClientOriginalName());
            $img = 'uploads/' . $it . $file->getClientOriginalName();             //number name
            //echo '<img src="'.$img.'">';

        }
        design::create([
            'name' => $request->name, 'img' => $img,
        ]);
        $images=DB::table('designs')->orderBy('name', 'asc')->paginate(15);
        return view('design.index', compact('images'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $img = design::find($id);
//        echo $img;
        return view('design.edit',compact('img'));
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
    }
}
