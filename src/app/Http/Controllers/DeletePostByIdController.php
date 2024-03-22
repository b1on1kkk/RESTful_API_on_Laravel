<?php

namespace App\Http\Controllers;

use Exception;

use Illuminate\Support\Facades\DB;

class DeletePostByIdController extends Controller
{
    public function delete($id) {
        try {
            $post = DB::table('data')->where('id', $id)->delete();

            if ($post) {
                return response()->json(["status" => 200, "message" => "Post deleted succesfuly!"], 200);
            } 

            return response()->json(["status" => 404, "message" => "Post not found to delete"], 404);
        } catch(Exception $e) {
            return response()->json(["status" => 500, "message" => "Error occured"], 500);
        }
    }
}
