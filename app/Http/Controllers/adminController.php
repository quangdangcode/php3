<?php

namespace App\Http\Controllers;

use App\Http\Requests\CateloryRequest;
use App\Http\Requests\PostRequest;
use App\Models\catelory;
use App\Models\comment;
use App\Models\post;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class adminController extends Controller
{

    const PATH_VIEW = 'admin.';

    public function admin()
    {
        return view(self::PATH_VIEW . 'dashboard');
    }

    public function danh_sach_chuyen_muc()
    {
        $categories = catelory::all();
        return view(self::PATH_VIEW . 'content.danh_sach_chuyen_muc', compact('categories'));
    }

    public function them_chuyen_muc()
    {
        return view(self::PATH_VIEW . 'content.them_chuyen_muc');
    }

    public function xu_ly_them_chuyen_muc(CateloryRequest $request)
    {
        $data = $request->validated();
        catelory::create($data);
        return redirect()->route('danh_sach_chuyen_muc')->with('success', 'Thêm chuyên mục thành công.');
    }

    public function sua_chuyen_muc($id)
    {
        $category = catelory::findOrFail($id);
        return view(self::PATH_VIEW . 'content.sua_chuyen_muc', compact('category'));
    }

    public function xu_ly_sua_chuyen_muc(CateloryRequest $request, $id)
    {
        $data = $request->validated();
        $category = catelory::find($id);
        $category->update($data);
        return redirect()->route('danh_sach_chuyen_muc')->with('success', 'Chuyên mục đã được cập nhật thành công.');
    }

    public function them_ban_tin()
    {
        $categories = catelory::all();
        return view(self::PATH_VIEW . 'content.them_ban_tin', compact('categories'));
    }

    public function xu_ly_them_ban_tin(PostRequest $request)
    {
        $data = $request->validated();
        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required',
            'catelory_id' => 'required|exists:catelories,id',
        ], [
            'title.required' => 'Vui lòng nhập tên bài viết',
            'content.required' => 'Vui lòng nhập nội dung bài viết',
            'image.required' => 'Vui lòng chọn ảnh',
        ]);

        $img = [];

        try {
            if ($request->hasFile('image')) {
                $img = Storage::put('posts', $request->file('image'));
            }
            post::create([
                'title' => $validated['title'],
                'content' => $validated['content'],
                'image' => $img,
                'catelory_id' => $validated['catelory_id'],
                'IsActive' => '1',
            ]);
            return redirect()->route('danh_sach_ban_tin')->with('success', 'Thêm bài viết thành công!');
        } catch (Exception $exception) {
            if ($img && Storage::exists($img)) {
                Storage::delete($img);
            }
            return back()->with('error', 'Thêm bài viết thất bại: ' . $exception->getMessage());
        }
    }
    public function sua_ban_tin($id)
    {
        $posts = post::findOrFail($id);
        $categories = catelory::all();
        return view(self::PATH_VIEW . 'content.sua_ban_tin', compact('posts', 'categories'));
    }

    public function xu_ly_sua_ban_tin(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image',
            'catelory_id' => 'required|exists:catelories,id',
        ], [
            'title.required' => 'Vui lòng nhập tên bài viết',
            'content.required' => 'Vui lòng nhập nội dung bài viết',
        ]);
        try {
            $post = Post::findOrFail($id);

            if ($request->hasFile('image')) {
                Storage::delete($post->image);
                $validated['image'] = Storage::put('posts', $request->file('image'));
            } else {
                // Giữ lại ảnh cũ nếu không có ảnh mới
                unset($validated['image']);
            }
            $post->update($validated);
            return redirect()->route('danh_sach_ban_tin')->with('success', 'Cập nhật bài viết thành công!');
        } catch (Exception $exception) {
            return back()->with('error', 'Cập nhật bài viết thất bại: ' . $exception->getMessage());
        }
    }
    public function xoa_ban_tin($id)
    {
        $post = Post::findOrFail($id);
        $post->update(['IsActive' => 0]);
        return back();
    }
    public function danh_sach_ban_tin()
    {
        $posts = Post::where('IsActive', 1)->paginate(5);
        return view(self::PATH_VIEW . 'content.danh_sach_ban_tin', compact('posts'));
    }

    public function danh_sach_binh_luan()
    {
        $comments = Comment::with('post', 'user')->get();
        return view(self::PATH_VIEW . 'content.danh_sach_binh_luan', compact('comments'));
    }

    public function danh_sach_nguoi_dung()
    {
        $user = User::all();
        return view(self::PATH_VIEW . 'content.danh_sach_nguoi_dung', compact('user'));
    }
}
