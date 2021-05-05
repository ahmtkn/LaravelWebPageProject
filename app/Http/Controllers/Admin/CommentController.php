<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments=Comment::all()->load('posts');
        return view('admin.comment.index',compact('comments'));
    }

    public function destroy(Comment $comment)
    {
        if ($comment->user_id !== auth()->user()->id){
            flash()->info('Bilgi','Bu Comment Size Ait Değil Değiştiremezsiniz');
        }
        $com=$comment->delete();
        if ($com){
            flash()->success('Başarılı','Silme İşlemi Başarıyla Gerçekleşti');
        }else{
            flash()->error('Hatalı','Silme İşlemi Gerçekleşemedi');
        }
        return redirect()->route('admin.comment.index');
    }
}
