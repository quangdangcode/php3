<?php

namespace App\Http\Controllers;

use App\Models\catelory;
use App\Models\post;
use App\Models\User;
use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class clientController extends Controller
{

    const PATH_VIEW = 'client.';

    public function index()
    {
        $categories = catelory::with('posts')->get();
        return view(self::PATH_VIEW . 'home', compact('categories'));
    }

    public function chuyen_muc($id)
    {
        $posts = post::where('catelory_id', $id)->get();
        $categories = catelory::all();
        return view(self::PATH_VIEW . 'content.catelory', compact('posts', 'categories'));
    }

    public function lien_he()
    {
        return view(self::PATH_VIEW . 'content.contact');
    }

    public function chi_tiet($id)
    {
        $posts = post::with('catelory')->findOrFail($id);
        $comments = Comment::where('post_id', $id)->with('user')->get();
        $commentCount = $comments->count();
        return view(self::PATH_VIEW . 'content.detail', compact('posts', 'comments', 'commentCount'));
    }

    public function storeComment(Request $request)
    {
        $validatedData = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|string',
        ], [
            'content.required' => 'Vui lòng nhập nội dung bình luận',
        ]);

        $comment = Comment::create([
            'post_id' => $validatedData['post_id'],
            'user_id' => auth()->id(),
            'content' => $validatedData['content'],
        ]);

        return redirect()->route('chi_tiet', $validatedData['post_id']);
    }


    public function dang_ky()
    {
        return view(self::PATH_VIEW . 'content.dang_ky');
    }

    public function dang_ky_tai_khoan(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.required' => 'Vui lòng nhập tên tài khoản',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã được sử dụng',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        return redirect()->route('dang_nhap')->with('success', 'Đăng ký tài khoản thành công');
    }


    public function dang_nhap()
    {
        return view(self::PATH_VIEW . 'content.dang_nhap');
    }

    public function xu_ly_dang_nhap(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerateToken();
            return redirect()->route('client.home')->with('success', 'Đăng nhập thành công');
        }

        return back()->withErrors(['email' => 'Thông tin đăng nhập không chính xác'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('client.home')->with('success', 'Đăng xuất thành công');
    }

    public function quen_mat_khau()
    {
        return view(self::PATH_VIEW . 'content.quen_mat_khau');
    }


    public function gui_mat_khau(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'email.exists' => 'Email này không tồn tại',
        ]);

        $user = User::where('email', $request->email)->first();
        Mail::raw("Mật khẩu của bạn là: {$user->password}", function ($message) use ($request) {
            $message->to($request->email)->subject('Thông tin mật khẩu');
        });
        return redirect()->route('dang_nhap')->with('status', 'Vui lòng check gmail');
    }


    public function search(Request $request)
    {
        $key = $request->input('key');
        $posts = post::where('title', 'like', '%' . $key . '%')->get();
        return view('client.content.tim_kiem', compact('posts'));
    }
}
