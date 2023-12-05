<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\agents;
use Validator;
use Session;

class agentCon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agentsData = agents::all();
        return view('backend.pages.agent',compact('agentsData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(count(agents::all()) > 0){
          $stid = agents::latest()->first()->id;  
      }else{
        $stid = 0;
      }
        $stidd = $stid+1;
        if(strlen($stidd) == 1){
            $agentId = "000".$stidd;
        }elseif(strlen($stidd) == 2){
            $agentId = "00".$stidd;
        }elseif(strlen($stidd) == 3){
            $agentId = "0".$stidd;
        }else{
            $agentId = $stidd;
        }
        return view('backend.pages.agentAdd',compact('agentId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $agentsData = new agents;

         $validator = validator::make($request->all(),[
            'agentId'=>'required|unique:agents',
            'name'=>'required',
            'area_name'=>'required',
            'mobile'=>'required',
        ]);

         

        if($validator->fails()){
            return redirect('/agent-list/create')->withErrors($validator)->withInput();
        }

        $agentsData->agentId = $request->agentId;
        $agentsData->name = $request->name;
        $agentsData->area_name = $request->area_name;
        $agentsData->mobile = $request->mobile;
        $agentsData->alterNative = $request->alterNative;
        $agentsData->active = 0;
        $agentsData->save();


       
        Session::flash('message','agent Add Successfully');
        
        return redirect('/agent-list'); 
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
