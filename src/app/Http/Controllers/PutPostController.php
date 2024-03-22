<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PutPostController extends Controller
{
    public function change(Request $request, $id){

        # validation check
        $validator = Validator::make($request->all(),[
            "title" => "required",
            "updated_at" => "required",
            "content" => "required"
        ]);

        // find first if user exist
        $post = DB::table('data')->where('id', $id)->first();

        if (!$post) 
        {
            return response()->json(["status" => 404, "message" => "Post not found"], 404);
        } 

        if($validator->fails()) 
        {
            return response()->json(["status"=>422, "message"=>$validator->messages()], 422);
        }

        # create new data
        $post = ["title" => $request->title, "updated_at" => $request->updated_at, "content" => $request->content];

        try
        {

            DB::table('data')->where('id', $id)->update($post);
            return response()->json(["status"=>200, "message"=>"Post was inserted succesfuly!"], 200);

        } catch(Exception $e)
        {
            echo $e;
            return response()->json(["status"=>500, "message"=>"Error occured"], 500);
        }

    }
}
