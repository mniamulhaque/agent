<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\filemanage;
use App\agents;

class fileOptionalCon extends Controller
{
    public function fileList()
    {
        $fileData = filemanage::all();
        return view('backend.pages.adminfileList',compact('fileData'));
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
        $fileData = filemanage::where('pay_1st','>',0)->where('agentBy','!=',0)->where('done_aproved',0)->get();
        return view('backend.pages.adminfileList',compact('fileData','menuGurd'));
    }

    public function completedList()
    {
        $menuGurd = "completedlist";
        $fileData = filemanage::where('pay_1st','>',0)->where('done_aproved',1)->get();
        return view('backend.pages.adminfileList',compact('fileData','menuGurd'));
    }

    public function fileView($id)
    {
        $fileData = filemanage::find($id);
        return view('backend.pages.fileView',compact('fileData'));
    }

    public function filepayment($id)
    {
        $fileData = filemanage::find($id);
        return view('backend.pages.paymentsend',compact('fileData'));
    }

    public function fileAgent($id)
    {
        $filId = $id;
        $agentData = agents::all();
        return view('backend.pages.agentTransfer',compact('agentData','filId'));
    }

     public function statusUpdate($id)
    {
        $filId = $id;
        return view('backend.pages.statusUpdate',compact('filId'));
    }

     public function fileRecipt($id)
    {
        $filId = $id;
        return view('backend.pages.addMoneyRe',compact('filId'));
    }

    public function fileEdite($id)
    {
        $apId = $id;
        return view('backend.pages.fileEdit',compact('apId'));
    }
}
