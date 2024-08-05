<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\catelory;
use App\Models\post;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function chuyen_muc($id)
    {
        try {
            $posts = post::where('catelory_id', $id)->get();
            $cate = catelory::find($id);
            return response()->json([
                'message' => 'Danh sách bài viết theo chuyên mục ' . $cate -> name,
                'posts' => $posts,
                'cate' => $cate,
            ]);
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'err' => $th->getMessage(),
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function Chi_tiet(string $id)
    {
        try {
            $posts = post::with('catelory')->find($id);
            return response()->json([
                'message' => 'Chi tiết bài viết số ' . $id,
                'posts' => $posts,
            ]);
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'err' => $th->getMessage(),
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
