<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentController extends Controller
{
    public function index()
    {
        return view('admin/comment/index')->withComments(Comment::with('article')->simplePaginate(15));
    }

    public function edit($id)
    {
        if(intval($id) <= 0){
            return redirect('admin/comment');
        }

        return view('admin/comment/edit')->withComment(Comment::find($id));
    }


    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'nickname' => 'required',
        ]);

        $comment = Comment::find($id);
        $comment->nickname = $request->get('nickname');
        $comment->email = $request->get('email');
        $comment->website = $request->get('website');
        $comment->content = $request->get('content');

        if ($comment->save()) {
            return redirect('admin/comment');
        } else {
            return redirect()->back()->withInput()->withErrors('保存失败!');
        }
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back()->withInput()->withErrors('删除成功!');
    }
}
