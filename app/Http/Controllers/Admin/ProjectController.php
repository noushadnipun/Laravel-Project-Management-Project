<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Admin\ProjectModel;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    
    public function index()
    {
      $ProjectLsit = ProjectModel::paginate(20);
      return view('admin.project.list-project', compact('ProjectLsit'));
    }

     public function view($project_id)
    {
      $ProjectView = ProjectModel::find($project_id);
      return view('admin.project.view-project', compact('ProjectView'));
    }
    
    public function create()
    {
      return view('admin.project.new-project');
    }

    public function store(Request $request)
    {
        $data = new ProjectModel();
        $data->project_name = $request->project_name;
        $data->project_description = $request->project_description;
        $data->project_status = $request->project_status;
        $data->save();
        return redirect()->route('admin.project.all');
    }

    public function edit($project_id)
    {
        $ProjectEdit = ProjectModel::find($project_id);
        return view('admin.project.edit-project', compact('ProjectEdit'));
    }

    public function update(Request $request) {
        $ProjectUpdate = ProjectModel::find($request->project_id);
        $ProjectUpdate->project_name   = $request->project_name;
        $ProjectUpdate->project_description   = $request->project_description;
        $ProjectUpdate->project_status   = $request->project_status;
        $ProjectUpdate->save();

        return redirect()->route('admin.project.all');
     }



    public function delete($project_id)
    {
        $ProjectDelete = ProjectModel::find($project_id);
        $ProjectDelete->delete();
        return redirect()->route('admin.project.all');
    }


}
