<?php
 
namespace App\Http\Controllers;

use App\Letter;
use App\Subletter;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;



class sublettersController extends Controller
{
    public function index()
    {
        //
        /**if($request->search==""){
            $subletters = subletter::all();
            return view('subletters.index',compact('subletters'));

        }else{
            $subletters = subletter::where('number','LIKE','%' .$request->search. '%')
            ->panginate(3);
            $subletters->appends($request->only('search'));
            return view('subletters.index',compact('subletters'));
        } */

        if( Auth::check() ){
            $subletters = Subletter::all();
             return view('subletters.index', ['subletters'=> $subletters]);  
        }
        return view('auth.login');

       /** $subletters = subletter::where('number','LIKE','%' .$request->search. '%')
        ->orWhere('com_name','LIKE','%' .$request->search. '%')
        ->orWhere('note','LIKE','%' .$request->search. '%')
        ->get();
        return view('subletters.index', ['subletters'=> $subletters]); */
                
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($letter_id = null)
    {
        //
        $subletters=null;
        if(!$letter_id){
            $letters = Letter::all();
        }

        return view('subletters.create',['letter_id'=>$letter_id , 'letters'=>$letters]);

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


        
             $subletter = Subletter::create([
                'date' => $request->input('name'),
                'title' => $request->input('title'),
                'subject' => $request->input('subject'),
                'letter_id' => $request->input('letter_id'),
                
                /**'user_id' => Auth::user()->id*/
            ]); 

           

             
            
            if($subletter){
                /**return redirect()->route('subletters.show', ['subletter'=> $subletter->id])**/
                return redirect()->route('letters.show', ['letter'=> $request->input('letter_id')])
                ->with('success' , 'subletter created successfully');
            } 
        }
        
            return back()->withInput()->with('errors', 'Error creating new company');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\subletter  $subletter
     * @return \Illuminate\Http\Response
     */
    public function show(Subletter $subletter)
    {
        //

        $subletter=Subletter::find($subletter->id);
         // $subletter=subletter::where('id',$subletter->id)->first();



        return view('subletters.show',['subletter'=>$subletter]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\subletter  $subletter
     * @return \Illuminate\Http\Response
     */
    public function edit(Subletter $subletter)
    {
        //
        $subletter=Subletter::find($subletter->id);
        
        return view('subletters.edit',['subletter'=>$subletter]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\subletter  $subletter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subletter $subletter)
    {
        //save the data
        $subletterupdate = Subletter::where('id',$subletter->id)
                        ->update([
                                   'date'=> $request->input('date'),
                                   'title'=> $request->input('title'),
                                   'subject'=> $request->input('subject')

                                 ]);
       
        if($subletterupdate){
            return redirect()->route('subletters.show',['subletter'=>$subletter->id])->with('success','subletter Successfully Updated'); 

        }



        return back()-withinput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\subletter  $subletter
     * @return \Illuminate\Http\Response
     */
    public function destroy(subletter $subletter)
    {
        //
        $findsubletter = subletter::find( $subletter->id);
        if($findsubletter->delete()){
            
            //redirect
            return redirect()->route('subletters.index')
            ->with('success' , 'subletter deleted successfully');
        }
        return back()->withInput()->with('errors' , 'Company could not be deleted');
    }


   

}
