<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\uddoktas;
use Validator;
use Session;

class uddoktaCon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uddoktaData = uddoktas::all();
        return view('backend.pages.uddokta',compact('uddoktaData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(count(uddoktas::all()) > 0){
          $stid = uddoktas::latest()->first()->id;  
      }else{
        $stid = 0;
      }
        $stidd = $stid+1;
        if(strlen($stidd) == 1){
            $uddoktaId = "000".$stidd;
        }elseif(strlen($stidd) == 2){
            $uddoktaId = "00".$stidd;
        }elseif(strlen($stidd) == 3){
            $uddoktaId = "0".$stidd;
        }else{
            $uddoktaId = $stidd;
        }
        
        return view('backend.pages.uddoktaAdd',compact('uddoktaId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $uddoktasData = new uddoktas;

         $validator = validator::make($request->all(),[
            'uddotaId'=>'required|unique:uddoktas',
            'name'=>'required',
            'area_name'=>'required',
            'mobile'=>'required',
        ]);

         

        if($validator->fails()){
            return redirect('/uddokta-list/create')->withErrors($validator)->withInput();
        }

        $uddoktasData->uddotaId = $request->uddotaId;
        $uddoktasData->name = $request->name;
        $uddoktasData->fname = $request->fname;
        $uddoktasData->area_name = $request->area_name;
        $uddoktasData->add = $request->add;
        $uddoktasData->mobile = $request->mobile;
        $uddoktasData->alterNative = $request->alterNative;
        $uddoktasData->pass = "123456";
        $uddoktasData->active = 0;
        $uddoktasData->save();


       
        Session::flash('message','Uddokta Add Successfully');
        
        return redirect('/uddokta-list'); 
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
