<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Letter;

class PdfController extends Controller
{

 
	public function index (Request $request) {

		$letters = Letter::where('title','LIKE','%' .$request->search. '%')
        ->orWhere('subject','LIKE','%' .$request->search. '%')
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        /** ->get(); */
        
        return view('pdf.index', ['letters'=> $letters]);



	} 
 

    public function gnt($letter_id ){

        //$letters=Letter::all();



         $letters=Letter::where('id',$letter_id)->first();
         
         $pdf = PDF::loadView('pdf.inv',['letters'=>$letters] );
         return $pdf->stream('inv.pdf');




       // $pdf = PDF::loadView('pdf.invoice',['letters'=>$letters] );
       // return $pdf->stream('invoice.pdf');



       /** $data = ['name'=>'Mohammed'];
    	$pdf = PDF::loadView('pdf.invoice', compact('data'));
        return $pdf->stream('invoice.pdf');  **/



    /**   $letters=Letter::where('id',$letter_id)->first();
       
       PDF::writeHTML(view('pdf.inv', ['letters'=>$letters])->render());
       PDF::output('inv.pdf', 'I'); **/






    }


    public function invoice(Letter $letter){

        $letters=Letter::find($letter->id);
        $pdf = PDF::loadView('pdf.invoice',['letters'=>$letters] );
        return $pdf->stream('invoice.pdf');



       /** $data = ['name'=>'Mohammed'];
    	$pdf = PDF::loadView('pdf.invoice', compact('data'));
        return $pdf->stream('invoice.pdf');  **/


    }

    

}

