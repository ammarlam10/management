<?php

namespace App\Http\Controllers;
use App\Party;
use App\Sales_order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
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
        $parties=Party::all();
        return view('reports.date',compact('parties'));
        }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = Sales_order::all()->sortByDesc('sdate');

        return view('order.partywise', compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id=$request->id;
        $to=date($request->to);
        $from=date($request->from);
		$gt=0;
        if($request->id==-10){


            $order = DB::table('sales_orders')
                ->whereBetween('sales_orders.sdate', [$from, $to])
                ->join('design_sales_order', function ($join) {
                    $join->on('design_sales_order.sales_order_id', '=', 'sales_orders.id')
                        ->where('design_sales_order.is_draft', '=', 0);
                })
                ->join('designs', 'designs.id', '=', 'design_sales_order.design_id')
                ->join('parties', 'parties.id', '=', 'sales_orders.party_id')
                ->select('sales_orders.sdate as date', 'sales_orders.total as total',
                    'design_sales_order.quantity as qty', 'design_sales_order.rate as rate', 'designs.name as design', 'parties.name as party')
                ->get();
				foreach($order as $o){
				$gt=$gt + ($o->rate*$o->qty);	
				}
            return view('reports.all', compact('order','from','to','gt'));
	//		$pdf = App::make('dompdf.wrapper');
		//	$pdf->loadView('reports.all',compact('orders','from','to'));
			//return $pdf->stream();



        }
        else {
            $party= Party::find($id);
            $order = DB::table('sales_orders')
                ->whereBetween('sales_orders.sdate', [$from, $to])
                ->join('design_sales_order', function ($join) {
                    $join->on('design_sales_order.sales_order_id', '=', 'sales_orders.id')
                        ->where('design_sales_order.is_draft', '=', 0);
                })
                ->join('parties', function ($join) use ($id) {
                    $join->on('parties.id', '=', 'sales_orders.party_id')
                        ->where('parties.id', '=',$id);
                })
                ->join('designs', 'designs.id', '=', 'design_sales_order.design_id')
//                ->join('parties', 'parties.id', '=', 'sales_orders.party_id')
                ->select('sales_orders.sdate as date', 'sales_orders.total as total',
                    'design_sales_order.quantity as qty', 'design_sales_order.rate as rate', 'designs.name as design', 'parties.name as party')
                ->get();
//            return view('reports.all', compact('order','from','to'));
				foreach($order as $o){
				$gt=$gt + ($o->rate*$o->qty);	
				}
            return view('reports.partywise', compact('order','from','to','party','gt'));
		//		$pdf = App::make('dompdf.wrapper');
			//$pdf->loadView('reports.all',compact('orders','from','to','party'));
			//return $pdf->stream();

        }


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
