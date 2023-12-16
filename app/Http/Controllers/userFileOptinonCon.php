<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\filemanage;
use App\agents;
use Validator;
use Session;

class userFileOptinonCon extends Controller
{
   
    public function fileNewList()
    {
        $menuGurd = "newlist";
        $fileData = filemanage::where('pay_1st',0)->where('agentBy',0)->get();
        return view('backend.uddoktas.upages.userfileList',compact('fileData','menuGurd'));
    }

    public function pendingList()
    {
        $menuGurd = "pendinglist";
        $fileData = filemanage::where('agentBy','!=',0)->where('file_status','!=','completed')->get();
        return view('backend.uddoktas.upages.userfileList',compact('fileData','menuGurd'));
    }

    public function completedList()
    {
        $menuGurd = "completedlist";
        $fileData = filemanage::where('pay_1st','>',0)->where('file_status','completed')->get();
        return view('backend.uddoktas.upages.userfileList',compact('fileData','menuGurd'));
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
        
        return redirect('/file-list'); 
    }

     public function statusUpdate($id)
    {
        $filId = $id;
        return view('backend.uddoktas.upages.userstatusUpdate',compact('filId'));
    }

    public function statusUpdateSend(Request $req,$id)
    {
        $validator = validator::make($req->all(),[
            'file_status'=>'required',
        ]);

         

        if($validator->fails()){
            return redirect('/userstatusUpdate/'.$id)->withErrors($validator)->withInput();
        }


        filemanage::where('id',$id)->update([
            'file_status'=>$req->file_status,
        ]);

        Session::flash('message','File Status Update Successfully');
        
        return redirect('/file-list'); 
    }

     public function fileRecipt($id)
    {
        $filId = $id;
        return view('backend.uddoktas.upages.addMoneyRe',compact('filId'));
    }

    public function fileReciptUpdate(Request $req,$id)
    {
        $validator = validator::make($req->all(),[
            'file_recipt'=>'required',
        ]);

         

        if($validator->fails()){
            return redirect('/userfileRecipt/'.$id)->withErrors($validator)->withInput();
        }


        filemanage::where('id',$id)->update([
            'file_recipt'=>2,
        ]);

        Session::flash('message','file_recipt Update Successfully');
        
        return redirect('/file-list'); 
    }

}
