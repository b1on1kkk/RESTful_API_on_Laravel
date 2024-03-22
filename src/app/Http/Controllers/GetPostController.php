<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class GetPostController extends Controller
{
    public function get() {
        $posts = DB::table('data')->get();

        return response()->json(["status" => 200, "posts" => $posts], 200);
    }
}
