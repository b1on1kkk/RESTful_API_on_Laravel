<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\DB;



class GetPostByIdController extends Controller
{
    public function getById($id) {
        try {
            $post = DB::table('data')->where('id', $id)->first();

            if ($post) {
                return response()->json(["status" => 200, "post" => $post], 200);
            } 

            return response()->json(["status" => 404, "message" => "Post not found"], 404);
        } catch(Exception $e) {
            return response()->json(["status" => 500, "message" => "Error occured"], 500);
        }
    }
}
