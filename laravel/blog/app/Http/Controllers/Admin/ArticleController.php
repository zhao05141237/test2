<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use Illuminate\Validation\Rule;

class ArticleController extends Controller
{
    //
    public function index()
    {
        return view('admin/article/index')->withArticles(Article::all());
    }

    public function create()
    {
        return view('admin/article/create');
    }

    public function edit($id)
    {
        if(intval($id) <= 0){
            return redirect('admin/article');
        }

        return view('admin/article/edit')->withArticle(Article::find($id));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:articles|max:255',
            'body' => 'required',
        ]);

        $article = new Article();
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->user_id = $request->user()->id;

        if ($article->save()) {
            return redirect('admin/article');
        } else {
            return redirect()->back()->withInput()->withErrors('保存失败!');
        }
    }

    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'title' => [
                'required',
                'max:255',
                Rule::unique('articles','title')->ignore($id),
            ],
            'body' => 'required',
        ]);

        $article = Article::find($id);
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->user_id = $request->user()->id;

        if ($article->save()) {
            return redirect('admin/article');
        } else {
            return redirect()->back()->withInput()->withErrors('保存失败!');
        }
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect()->back()->withInput()->withErrors('删除成功!');
    }
}
