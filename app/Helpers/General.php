<?php

function Resp($data , $msg = null , $status = 200 ){
    if($status == 400){
        return response()->json(['msg' => $msg , 'status' => $status ],$status) ;
    }else{
        return response()->json(['data' => $data  , 'msg' => $msg , 'status' => $status ],$status) ;
    }
}
