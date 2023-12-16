<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\filemanage;
use Validator;
use Session;

class fileCon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fileData = filemanage::all();
        return view('backend.uddoktas.upages.fileList',compact('fileData'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         if(count(filemanage::all()) > 0){
          $stid = filemanage::latest()->first()->id;  
      }else{
        $stid = 0;
      }
        $stidd = $stid+1;
        if(strlen($stidd) == 1){
            $apId = "000".$stidd;
        }elseif(strlen($stidd) == 2){
            $apId = "00".$stidd;
        }elseif(strlen($stidd) == 3){
            $apId = "0".$stidd;
        }else{
            $apId = $stidd;
        }
        return view('backend.uddoktas.upages.fileAdd',compact('apId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $filemanageData = new filemanage;

         $validator = validator::make($request->all(),[
            'apid'=>'required|unique:filemanages',
            'fileType'=>'required',
            'name'=>'required',
            'fname'=>'required',
            'dob'=>'required',
            'vill'=>'required',
            'ptype'=>'required',
            'pyear'=>'required',
            'alterNative'=>'required',
            'agreementType'=>'required',
            'file_documet'=>'required',
            'mobile'=>'required',
        ]);

         

        if($validator->fails()){
            return redirect('/file-list/create')->withErrors($validator)->withInput();
        }

        $filemanageData->apid = $request->apid;
        $filemanageData->fileType = $request->fileType;
        $filemanageData->name = $request->name;
        $filemanageData->fname = $request->fname;
        $filemanageData->area_name = 0;
        $filemanageData->vill = $request->vill;
        $filemanageData->dob = $request->dob;
        $filemanageData->mobile = $request->mobile;
        $filemanageData->alterNative = $request->alterNative;
        $filemanageData->agreementType = $request->agreementType;
        $filemanageData->ptype = $request->ptype;
        $filemanageData->pyear = $request->pyear;
        $filemanageData->total_price = 0;
        $filemanageData->file_documet = 0;
        $filemanageData->file_recipt = 0;
        $filemanageData->agentBy = 0;
        $filemanageData->pay_1st = 0;
        $filemanageData->pay_2nd = 0;
        $filemanageData->pay_3rd = 0;
        $filemanageData->suspend_aproved = 0;
        $filemanageData->file_status = 1;
        $filemanageData->done_aproved = 0;
        $filemanageData->user_id = 0;
        $filemanageData->user_mobile = 0;
        $filemanageData->save();


       
        Session::flash('message','file Add Successfully');
        
        return redirect('/file-list'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fileData = filemanage::find($id);
        return view('backend.uddoktas.upages.userfileView',compact('fileData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apId = filemanage::find($id);
        return view('backend.uddoktas.upages.userfileEdit',compact('apId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {

         $validator = validator::make($req->all(),[
            'fileType'=>'required',
            'name'=>'required',
            'fname'=>'required',
            'dob'=>'required',
            'vill'=>'required',
            'ptype'=>'required',
            'pyear'=>'required',
            'alterNative'=>'required',
            'agreementType'=>'required',
            'mobile'=>'required',
        ]);

         

        if($validator->fails()){
            return redirect('/file-list/create')->withErrors($validator)->withInput();
        }


        filemanage::find($id)->update([
            'fileType'=>$req->fileType,
            'name'=>$req->name,
            'fname'=>$req->fname,
            'vill'=>$req->vill,
            'dob'=>$req->dob,
            'mobile'=>$req->mobile,
            'alterNative'=>$req->alterNative,
            'agreementType'=>$req->agreementType,
            'ptype'=>$req->ptype,
            'pyear'=>$req->pyear,
        ]);


       
        Session::flash('message','file Update Successfully');
        
        return redirect('/file-list'); 
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
