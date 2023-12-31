<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\filemanage;
use App\agents;
use Validator;
use Session;

class fileOptionalCon extends Controller
{
    public function fileList()
    {
        $menuGurd = "alllist";
        $fileData = filemanage::all();
        return view('backend.pages.adminfileList',compact('fileData','menuGurd'));
    }


    public function fileNewList()
    {
        $menuGurd = "newlist";
        $fileData = filemanage::where('pay_1st',0)->where('agentBy',0)->get();
        return view('backend.pages.adminfileList',compact('fileData','menuGurd'));
    }

    public function pendingList()
    {
        $menuGurd = "pendinglist";
        $fileData = filemanage::where('agentBy','!=',0)->where('file_status','!=','completed')->get();
        return view('backend.pages.adminfileList',compact('fileData','menuGurd'));
    }

    public function completedList()
    {
        $menuGurd = "completedlist";
        $fileData = filemanage::where('pay_1st','>',0)->where('file_status','completed')->get();
        return view('backend.pages.adminfileList',compact('fileData','menuGurd'));
    }

    public function fileView($id)
    {
        $fileData = filemanage::find($id);
        return view('backend.pages.fileView',compact('fileData'));
    }

    public function filepayment($id)
    {
        $filIdd = $id;
        $fileData = filemanage::find($id);
        return view('backend.pages.paymentsend',compact('fileData','filIdd'));
    }

    public function filepaymentInsert(Request $req)
    {
          $validator = validator::make($req->all(),[
            'pay_1st'=>'required',
        ]);

         

        if($validator->fails()){
            return redirect('/filepayment/'.$req->filIdd)->withErrors($validator)->withInput();
        }
        filemanage::where('id',$req->filIdd)->update([
            'total_price'=>$req->channelFee,
            'pay_1st'=>$req->pay_1st,
        ]);

        Session::flash('message','Payment Add Successfully');
        
        return redirect('/admin/filelist'); 
    }

    public function fileAgent($id)
    {
        $filId = $id;
        $agentData = agents::all();
        return view('backend.pages.agentTransfer',compact('agentData','filId'));
    }

    public function fileAgentSend(Request $req,$id)
    {
        $validator = validator::make($req->all(),[
            'agentId'=>'required',
        ]);

         

        if($validator->fails()){
            return redirect('/fileAgent/'.$id)->withErrors($validator)->withInput();
        }


        filemanage::where('id',$id)->update([
            'agentBy'=>$req->agentId,
        ]);

        Session::flash('message','File Transfer To Agent Successfully');
        
        return redirect('/admin/filelist'); 
    }

     public function statusUpdate($id)
    {
        $filId = $id;
        return view('backend.pages.statusUpdate',compact('filId'));
    }

    public function statusUpdateSend(Request $req,$id)
    {
        $validator = validator::make($req->all(),[
            'file_status'=>'required',
        ]);

         

        if($validator->fails()){
            return redirect('/statusUpdate/'.$id)->withErrors($validator)->withInput();
        }


        filemanage::where('id',$id)->update([
            'file_status'=>$req->file_status,
        ]);

        Session::flash('message','File Status Update Successfully');
        
        return redirect('/admin/filelist'); 
    }

}
