<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
Use \Illuminate\Support\Collection;
use PDF;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        /**if($request->search==""){
            $orders = Order::all();
            return view('orders.index',compact('orders'));

        }else{
            $orders = Order::where('number','LIKE','%' .$request->search. '%')
            ->panginate(3);
            $orders->appends($request->only('search'));
            return view('orders.index',compact('orders'));
        } */

       /** if( Auth::check() ){
            $orders = Order::all();
             return view('orders.index', ['orders'=> $orders]);  
        }
        return view('auth.login');*/

        $orders = Order::where('number','LIKE','%' .$request->search. '%')
        ->orWhere('com_name','LIKE','%' .$request->search. '%')
        ->orWhere('note','LIKE','%' .$request->search. '%')
        ->orderBy('created_at', 'desc')
        ->paginate(10);
        return view('orders.index', ['orders'=> $orders]); 
                
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('orders.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Auth::check()){
            $order = Order::create([
                'number' => $request->input('number'),
                'year' => $request->input('year'),
                'com_name' => $request->input('com_name'),
                'note' => $request->input('note')
                
                /**'user_id' => Auth::user()->id*/
            ]);
            
            if($order){
                return redirect()->route('orders.show', ['order'=> $order->id])
                ->with('success' , 'Company created successfully');
            }
        }
        
            return back()->withInput()->with('errors', 'Error creating new company');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //

        $order=order::find($order->id);
         // $order=order::where('id',$order->id)->first();



        return view('orders.show',['order'=>$order]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
        $order=order::find($order->id);
        
        return view('orders.edit',['order'=>$order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //save the data
        $orderupdate = order::where('id',$order->id)
                        ->update([
                                   'number'=> $request->input('number'),
                                   'year'=> $request->input('year'),
                                   'note'=> $request->input('note')

                                 ]);
       
        if($orderupdate){
            return redirect()->route('orders.show',['order'=>$order->id])->with('success','order Successfully Updated'); 

        }



        return back()-withinput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
        $findOrder = order::find( $order->id);
        
        if($findOrder->delete()){
            
            //redirect
            return redirect()->route('orders.index')
            ->with('success' , 'order deleted successfully');
        }
        return back()->withInput()->with('errors' , 'Company could not be deleted');
    }


    






}
