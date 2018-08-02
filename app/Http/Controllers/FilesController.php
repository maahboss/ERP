<?php

namespace App\Http\Controllers;

use App\File;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;



class FilesController extends Controller
{
    public function index()
    {
        //
        /**if($request->search==""){
            $files = File::all();
            return view('files.index',compact('files'));

        }else{
            $files = File::where('number','LIKE','%' .$request->search. '%')
            ->panginate(3);
            $files->appends($request->only('search'));
            return view('files.index',compact('files'));
        } */

        if( Auth::check() ){
            $files = File::all();
             return view('files.index', ['files'=> $files]);  
        }
        return view('auth.login');

       /** $files = File::where('number','LIKE','%' .$request->search. '%')
        ->orWhere('com_name','LIKE','%' .$request->search. '%')
        ->orWhere('note','LIKE','%' .$request->search. '%')
        ->get();
        return view('files.index', ['files'=> $files]); */
                
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($order_id = null)
    {
        //
        $orders=null; 
        if(!$order_id){
            $orders = Order::all();
        }

        return view('files.create',['order_id'=>$order_id , 'orders'=>$orders]);

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

 
            
            $input['filename'] =time() . '.' . $request->file('file')->getClientOriginalExtension() ;
            $destinationPath = public_path('/uploads');
            $request->file('file')->move($destinationPath,$input['filename']); 





             $file = File::create([
                'name' => $request->input('name'),
                'file' => $input['filename'],
                'note' => $request->input('note'),
                'order_id' => $request->input('order_id'),
                
                /**'user_id' => Auth::user()->id*/
            ]); 

           

             
            
            if($file){
                /**return redirect()->route('files.show', ['file'=> $file->id])**/
                return redirect()->route('orders.show', ['order'=> $request->input('order_id')])
                ->with('success' , 'file created successfully');
            } 
        }
        
            return back()->withInput()->with('errors', 'Error creating new company');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\file  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //

        $file=File::find($file->id);
         // $file=File::where('id',$file->id)->first();



        return view('files.show',['file'=>$file]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\file  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
        $file=File::find($file->id);
        
        return view('files.edit',['file'=>$file]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\file  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //save the data
        $fileupdate = File::where('id',$file->id)
                        ->update([
                                   'name'=> $request->input('name'),
                                   'file'=> $request->input('file'),
                                   'note'=> $request->input('note')

                                 ]);
       
        if($fileupdate){
            return redirect()->route('files.show',['file'=>$file->id])->with('success','file Successfully Updated'); 

        }



        return back()-withinput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\file  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
        $findfile = File::find( $file->id);
        if($findfile->delete()){
            
            //redirect
            return redirect()->route('files.index')
            ->with('success' , 'file deleted successfully');
        }
        return back()->withInput()->with('errors' , 'Company could not be deleted');
    }


   

}
