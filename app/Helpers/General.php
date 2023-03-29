<?php

function Resp($data =null , $msg = null , $status = 200 ){
    if($status != 200 ){
        return response()->json(['msg' => $msg , 'status' => $status ],$status) ;
    }else{
        return response()->json(['data' => $data  , 'msg' => $msg , 'status' => $status ],$status) ;
    }
}
