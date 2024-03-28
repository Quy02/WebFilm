<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all(); // Lấy tất cả comment từ cơ sở dữ liệu
        return view('admincp.comment.index', ['comments' => $comments]); // Trả về view index và truyền dữ liệu comments vào view
    }

   

    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);
        $comment = new Comment();
        $comment->id_movie = $request->id_movie;
        $comment->id_customer = $request->id_customer;
        $comment->name_customer = $request->name_customer;
        $comment->comment = $request->comment;
        $comment->save();
        return back();
    }

     public function destroy($id)
    {
        Comment::find($id)->delete();
        return redirect()->back();
    }
}
 // public function getRandomAvatar()
 //    {
 //        $avatars = [
 //            'https://cdn.iconscout.com/icon/free/png-512/avatar-370-456322.png',
 //            'https://icon-library.com/images/avatar-icon/avatar-icon-5.jpg',
 //            'https://freesvg.org/img/1547510251.png',
 //            'https://cdn3.iconfinder.com/data/icons/business-avatar-1/512/10_avatar-512.png',
 //            // Thêm các đường dẫn hình ảnh khác vào đây
 //        ];

 //        $randomAvatar = $avatars[array_rand($avatars)];

 //        return $randomAvatar;
 //    }