<?php

namespace Guo\Wechat\Http\Controllers;


use Illuminate\Http\Request;

class QrcodeController extends CommonController
{

    public  function  index(){
        return view("wechat::qrcode.index");
    }
    public  function temporary(Request $request){
        $wechat=$this->wechat();
        $qrcode = $wechat->qrcode;
        $data=$request->data;
        $time=$request->time;
        $result = $qrcode->temporary($data,$time);
        $ticket = $result->ticket;
        $url = $qrcode->url($ticket);
        echo json_encode($url);
    }
    public  function fover(Request $request){
        $data=$request->data;
        $wechat=$this->wechat();
        $qrcode = $wechat->qrcode;
        $result = $qrcode->forever($data);
        $ticket = $result->ticket;
        $url = $qrcode->url($ticket);
        echo json_encode($url);
    }
}
