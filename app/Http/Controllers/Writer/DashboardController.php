<?php

namespace App\Http\Controllers\Writer;

use App\Models\Admin\WriterModel;

use App\Models\Admin\ArticleModel;

use App\Models\Admin\WriterArticalModel;

use App\Http\Controllers\Controller;

use DB;

use Session;

session_start();

use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
   
    public function index()
    {
        $GetWriterID = Session::get('writer_id');
        $totalWriterArticle = ArticleModel::where('article_writer', '=', $GetWriterID)->count();

        //Profile Input Show 
        $getProfileInput = WriterModel::where('writer_id', '=', $GetWriterID)->first();
        return view ('frontend.dashboard',compact('totalWriterArticle', 'getProfileInput'));
    }


    public function profileupdate(Request $request)
    {
        $GetWriterID = Session::get('writer_id');
        $WriterUpdate = WriterModel::find($GetWriterID);
        $WriterUpdate->writer_name = $request->writer_name;
        if($request->writer_password){
            $WriterUpdate->writer_password = md5($request->writer_password);
        }
        $WriterUpdate->writer_address = $request->writer_address;
        $WriterUpdate->writer_phone = $request->writer_phone;
        $WriterUpdate->save();
        return redirect()->route('writer.dashboard.index')->with('msg', 'Profile Updated Successfull');
    }

   
    
    public function login_form()
    {
        return view ('frontend.login');
    }


    public function loginAction(Request $request)
    {
        $email = $request->writer_email;
        $password = md5($request->writer_password);
        $result = DB::table('tbl_writer')
                  ->where('writer_email', $email)
                  ->where('writer_password', $password)
                  ->first();

        //dd($result);
        if($result){
            Session::put('writer_email', $result->writer_email);
            Session::put('writer_id', $result->writer_id);
            return redirect()->route('writer.dashboard.index');
        } else {
            Session::put('exception', 'Email & Password is incorrect');
            return back();
        }

    }


    /* logout */
    public function logout()
    {
        Session::flush();
        Session::put('writer_email', null);
        Session::put('writer_password', null);
        Session::put('writer_id', null);
        return redirect()->route('writer.dashboard.login');
    }


    /* Article */
    public function article()
    {
        $GetWriterID = Session::get('writer_id');

        $writerprofile =  ArticleModel::select('*')
                          ->where('article_writer', $GetWriterID)
                          ->get();         

        return view('frontend.list-writers-article', compact('writerprofile'));
    }

    /* Artcle response */
    public function articleview($article_id)
    {
        $GetWriterID = Session::get('writer_id');
        $ArticleView = ArticleModel::find($article_id);
        //$commentcount = WriterArticalModel::select('get_writer')->groupBy('get_writer')->count();
        $commentcount = WriterArticalModel::select('get_writer')->where('get_writer', '=', $GetWriterID )->count();
        return view('frontend.view-writer-article', compact('ArticleView', 'GetWriterID','commentcount'));
    }

    public function articleviewresponse(Request $request, $article_id)
    {
        $GetWriterID = Session::get('writer_id');
        $response = new WriterArticalModel();
        $response->writer_article_comment = $request->writer_article_comment;

        if($request->hasFile('writer_article_file')) {
            //Show File Name
            $fileName = pathinfo($request->writer_article_file->getClientOriginalName(), PATHINFO_FILENAME).'-'.time().'.'.$request->writer_article_file->getClientOriginalExtension();
            //Store File in Directory
            //$request->writer_article_file->move(public_path('uploads/article-documents'), $fileName);
            $request->writer_article_file->move('uploads/article-documents', $fileName);
            //Store File in DB
            $response->writer_article_file = $fileName;
        }

        $response->get_writer = $GetWriterID;
        $response->get_article = $article_id;
        $response->save();
        //return $response;
        return back();
    }


}
