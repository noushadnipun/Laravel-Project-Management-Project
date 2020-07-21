<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Admin\WriterModel;

use App\Models\Admin\ProjectModel;

use App\Models\Admin\ArticleModel;

use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
      $ArticleLsit = ArticleModel::paginate(20);
      return view('admin.article.list-article', compact('ArticleLsit'));
    }

    public function view($article_id)
    {
      $ArticleView = ArticleModel::find($article_id);
      return view('admin.article.view-article', compact('ArticleView'));
    }

    public function create()
    {
        $ProjectLsit = ProjectModel::all();
        $WriterLsit =  WriterModel::all();
        return view('admin/article.new-article', compact('ProjectLsit', 'WriterLsit'));
    }

    public function store( Request $request)
    {
        $data = new ArticleModel();
        $data->article_title = $request->article_title;
        $data->article_description = $request->article_description;
        $data->article_due_date = $request->article_due_date;
        $data->article_cost = $request->article_cost;
        $data->article_project = $request->article_project;
        $data->article_writer = $request->article_writer;
        $data->save();
        return redirect()->route('admin.article.all');
    }

     public function edit($article_id)
    {
        $ArticleEdit = ArticleModel::find($article_id);
        $ProjectLsit = ProjectModel::all();
        $WriterLsit =  WriterModel::all();
        return view('admin.article.edit-article', compact('ArticleEdit', 'ProjectLsit', 'WriterLsit'));
    }

    public function update(Request $request)
    {
        $ArticleUpdate = ArticleModel::find($request->article_id);
        $ArticleUpdate->article_title = $request->article_title;
        $ArticleUpdate->article_description = $request->article_description;
        $ArticleUpdate->article_due_date = $request->article_due_date;
        $ArticleUpdate->article_cost = $request->article_cost;
        $ArticleUpdate->article_project = $request->article_project;
        $ArticleUpdate->article_writer = $request->article_writer;
        $ArticleUpdate->save();
        return redirect()->route('admin.article.all');
    }

    public function delete($article_id)
    {
        $ArticleDelete = ArticleModel::find($article_id);
        $ArticleDelete->delete();
        return redirect()->route('admin.article.all');
    }

}
