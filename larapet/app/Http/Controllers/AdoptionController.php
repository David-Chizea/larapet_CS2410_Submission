<?php

namespace App\Http\Controllers;
use Gate;
use App\Models\Animal;
use App\Models\Adoption;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdoptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        //
        //
        $adoption = new Adoption;

            $adoption->user_id = Auth::user()->id;
            $adoption->animal_id = $req->animal_id;
            $adoption->animal_name = $req->animal_name;
            $adoption->created_at = now();          
            $adoption->save();
            return redirect()->route('view_status');


        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function approveRequest($id){
        $adoption = Adoption::find($id); 
        if(($adoption->pending == 1)&&($adoption->denied == 0)){
            $adoption->pending = 0;
            $adoption->approved = 1;
            $adoption->status = 'approved';
            $adoption->update();

        }
        
        
        
        return redirect()->route('view_requests');
       
    }

    public function denyRequest($id){
        $adoption = Adoption::find($id); 
        if(($adoption->pending == 1)||($adoption->approved == 0)||($adoption->denied == 0)){

            $adoption->pending = 0;
            $adoption->approved = 0;
            $adoption->status = 'denied';
            $adoption->update();

        }
        
        
        
        return redirect()->route('view_requests');
       
    }
   public function viewRequests()
   {
       //
       $adoptions = Adoption::all()->toArray();
       return view('admin/viewRequests', compact('adoptions'));

   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    public function viewStatus(){
        $adoptionsQuery = Adoption::all();
        if (Gate::denies('access-admin')) {
            $adoptionsQuery = $adoptionsQuery->where('user_id', auth()->user()->id);
        }
        return view('/viewStatus', array('adoptions' => $adoptionsQuery));
    }
}
