<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; 

use Illuminate\Http\Request;

use App\Models\Admin\ProjectModel;

use App\Models\Admin\WriterModel;

use App\Models\Admin\ArticleModel;

use App\User;

use Auth;

use Hash;

use Session;

session_start();

class DashboardController extends Controller
{
   public function index()
   {
       $totalProject = ProjectModel::count();
       $totalActiveProject = ProjectModel::where('project_status', '=', '0' )->count();
       $totalInactiveProject = ProjectModel::where('project_status', '=', '1' )->count();

       $totalWriter = WriterModel::count();
       $totalActiveWriter = WriterModel::where('writer_status', '=', '0' )->count();
       $totalInactiveWriter = WriterModel::where('writer_status', '=', '1' )->count();

       $totalArticle = ArticleModel::count();

       $currentuser = Auth::user();

       return view('admin/dashboard', compact('totalProject', 'totalActiveProject', 'totalInactiveProject','totalWriter', 'totalActiveWriter', 'totalInactiveWriter', 
       'totalArticle',
       'currentuser'
        ));
    }

    public function profileupdate(Request $request)
    {
        $GetloggedID = Auth::user()->id;
        $ProfileUpdate = User::find($GetloggedID);
        $ProfileUpdate->name = $request->name;
        if($request->password){
            $ProfileUpdate->password = Hash::make($request->password);
        }
        $ProfileUpdate->email = $request->email;
        $ProfileUpdate->save();
        return redirect()->route('admin.dashboard.index')->with('msg', 'Profile Updated Successfull');
    }


}
