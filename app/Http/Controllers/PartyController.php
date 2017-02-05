<?php

namespace App\Http\Controllers;

use App\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartyController extends Controller
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
        $party = DB::table('parties')->orderBy('name', 'asc')->paginate(10);
        return view('party.index',compact('party'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('party.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Party::create([
            'name'=>$request->name,'contact_person'=>$request->cp,'address'=>$request->address,
            'cell_1'=>$request->cell_1,'cell_2'=>$request->cell_2,

        ]);
        return redirect('/party');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $party = Party::findOrFail($id);
        return view('party.update',compact('party'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

//        $orders = DB::table('sales_orders')->where('party_id','=',$id)->orderBy('sdate', 'asc')->paginate(10);
//        $orders=$party->sales_order->paginate(10);
//      return view('order.partywise',compact('orders'));

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
        $party = Party::FindOrFail($id);

        $party->update([
            'name'=>$request->name,'contact_person'=>$request->cp,'address'=>$request->address,
            'cell_1'=>$request->cell_1,'cell_2'=>$request->cell_2,

        ]);
        return redirect('/party');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $party = Party::FindOrFail($id);
        $party->delete();
        return redirect('/party');
    }
}
