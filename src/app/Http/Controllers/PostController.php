<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function upload(Request $request) {
        $validator = Validator::make($request->all(),[
            "title" => "required",
            "updated_at" => "required",
            "content" => "required"
        ]);

        if($validator->fails()) 
        {
            return response()->json(["status"=>422, "message"=>$validator->messages()], 422);
        }

        $post = ["title" => $request->title, "updated_at" => $request->updated_at, "content" => $request->content];

        try
        {

            DB::table('data')->insert($post);
            return response()->json(["status"=>200, "message"=>"Post was inserted succesfuly!"], 200);

        } catch(Exception $e)
        {
            echo $e;
            return response()->json(["status"=>500, "message"=>"Error occured"], 500);
        }
    }
}
