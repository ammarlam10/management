<?php

namespace App\Http\Controllers;

use App\design;
use App\Sales_order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Sales_order::all()->sortByDesc('sdate');
        $order = Sales_order::find(23);
//      foreach ($order->design as $dis){
//           echo $dis;
//          }
        return view('order.index', compact('orders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parties = DB::table('parties')
            ->orderBy('name', 'asc')
            ->get();
        $stock= Design::all();
        return view('order.create', compact('parties','stock'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //validation added
    public function store(Request $request)
    { $this->validate($request,[
            'qty.*' => 'numeric',
            'rate.*' => 'numeric',

        ]);
        $total = 0;
        $i=0;
       $so = Sales_order::create(['total'=>0,'sdate'=>$request->sdate,'party_id'=>$request->input('pid')]);
        $item =$request->input('name');
        $qty =$request->input('qty');
        $rate =$request->input('rate');
        $lot =$request->input('lot');
        $type =$request->input('type');
        foreach ($item as $it){
            $total=$total+$qty[$i]*$rate[$i];
            $so->design()->attach($it, ['draft_qty' => $qty[$i],'lot_no' => $lot[$i],'rate'=>$rate[$i],'type'=>$type[$i],'is_draft'=>1]);
            $i++;
        }
        $so->total =$total;
        $so->save();

        return redirect('/order');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order=Sales_order::find($id);
        return view('order.convert', compact('order'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $this->validate($request,[
            'qty.*' => 'numeric',
            'rate.*' => 'numeric',

        ]);
        $total = 0;
        $i=0;
        $so = Sales_order::find($id);
        $item =$request->input('name');
        $qty =$request->input('qty');
        $rate =$request->input('rate');
        $lot =$request->input('lot');
        $type =$request->input('type');
        foreach ($item as $it){
            $total=$total+$qty[$i]*$rate[$i];
            $i++;
        }
        $i=0;
        foreach($so->design as $des){
            $des->pivot->quantity =$qty[$i];
            $des->pivot->lot_no =$lot[$i];
            $des->pivot->rate =$rate[$i];
            $des->pivot->type =$type[$i];
            $des->pivot->is_draft=0;
            $des->pivot->save();
            $i++;
        }
        $so->sdate= $request->sdate;
        $so->total =$total;
        $so->save();
        return redirect('/order');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $order = Sales_order::findOrFail($request->oid);
       // echo $request->id;
        $piv = DB::table('design_sales_order')->where('id', '=', $request->id)->get()->first();
        $minus= $piv->draft_qty*$piv->rate;
        $order->total = $order->total - $minus;
        $order->save();
        DB::table('design_sales_order')->where('id', '=', $request->id)->delete();
        $order = Sales_order::findOrFail($request->oid);
        if($order->design=='[]'){
            $order->delete();
        }
        return redirect('/order');

    }

    public function getorder($id){
 echo $id;
    }

}
