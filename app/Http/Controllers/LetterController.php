<?php

namespace App\Http\Controllers;

use App\Letter;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
Use \Illuminate\Support\Collection;
use PDF;
  
class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $letters = Letter::where('title','LIKE','%' .$request->search. '%')
        ->orWhere('subject','LIKE','%' .$request->search. '%')
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        /** ->get(); */
        
        return view('letters.index', ['letters'=> $letters]); 

     //  return view ('letters.search');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('letters.create');
    }


    public function search(Request $request){

        if($request->ajax())
        {
            $output="";
            $letters = Letter::where('title','LIKE','%' .$request->search. '%')
            ->orWhere('subject','LIKE','%' .$request->search. '%')
            ->orderBy('created_at', 'desc')
            ->get();

            if($letters)

            {
             foreach ($letters as $key => $letter) {
              //  $output.='<tr>'.
                //         '<td>'.$letter->date.'</td>'
                  //       '<td>'.$letter->title.'</td>'
                    //     '<td>'.$letter->subject.'</td>'
                      //   '</tr>';  
                 
             }

             return Response($output);

                 
            }



        }




    }

 





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(Auth::check()){
            $letter = Letter::create([
                'date' => $request->input('date'),
                'title' => $request->input('title'),
                'subject' => $request->input('subject')
                
                
                /**'user_id' => Auth::user()->id*/
            ]);
            
            if($letter){
                return redirect()->route('letters.show', ['letter'=> $letter->id])
                ->with('success' , 'Letter created successfully');
            }
        }
        
            return back()->withInput()->with('errors', 'Error creating new Letter');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Letter $letter)
    {
        
        $letter=Letter::find($letter->id);

        return view('letters.show',['letter'=>$letter]);




    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Letter $letter)
    {
        $letter=Letter::find($letter->id);
        
        return view('letters.edit',['letter'=>$letter]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Letter $letter)
    {
        

        //save the data
        $letterupdate = Letter::where('id',$letter->id)
                        ->update([
                                   'date'=> $request->input('date'),
                                   'title'=> $request->input('title'),
                                   'subject'=> $request->input('subject')

                                 ]);
       
        if($letterupdate){
            return redirect()->route('letters.show',['letter'=>$letter->id])->with('success','letter Successfully Updated'); 

        }



        return back()-withinput();
    


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

    public function print($letter_id){

     //   $letters=Letter::all();
      //  $pdf = PDF::loadView('letters.invoice',compact('letters') );
       // return $pdf->stream('invoice.pdf');
        
        $letters=Letter::where('id',$letter_id)->first();
        return view('letters.print',['letters'=>$letters]);  



       /** $data = ['name'=>'Mohammed'];
        $pdf = PDF::loadView('pdf.invoice', compact('data'));
        return $pdf->stream('invoice.pdf');  **/


    }



}
