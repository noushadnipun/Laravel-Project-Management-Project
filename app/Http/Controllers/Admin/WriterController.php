<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Admin\WriterModel;

use App\Models\Admin\ProjectModel;

use Illuminate\Http\Request;

class WriterController extends Controller
{
    public function index()
    {
        $WriterLsit = WriterModel::paginate(20);
        return view('admin.writer.list-writer', compact('WriterLsit'));
    }

    public function create()
    {
        $ProjectLsit = ProjectModel::all();
        return view('admin.writer.new-writer', compact('ProjectLsit'));
    }

     public function store(Request $request)
    {
        $data = new WriterModel();
        $data->writer_name = $request->writer_name;
        $data->writer_email = $request->writer_email;
        $data->writer_password = md5($request->writer_password);
        $data->writer_address = $request->writer_address;
        $data->writer_phone = $request->writer_phone;
        $data->writer_status = $request->writer_status;
        $data->writer_assign_project = $request->writer_assign_project;
        $data->save();
        return redirect()->route('admin.writer.all');
    }

    public function edit($writer_id)
    {
        $WriterEdit = WriterModel::find($writer_id);
        $ProjectLsit = ProjectModel::all();
        return view('admin.writer.edit-writer', compact('WriterEdit', 'ProjectLsit'));
    }

    public function update(Request $request)
    {
        $WriterUpdate = WriterModel::find($request->writer_id);
        $WriterUpdate->writer_name = $request->writer_name;
        $WriterUpdate->writer_email = $request->writer_email;
        if($request->writer_password){
            $WriterUpdate->writer_password = md5($request->writer_password);
        }
        $WriterUpdate->writer_address = $request->writer_address;
        $WriterUpdate->writer_phone = $request->writer_phone;
        $WriterUpdate->writer_status = $request->writer_status;
        $WriterUpdate->writer_assign_project = $request->writer_assign_project;
        $WriterUpdate->save();
        return redirect()->route('admin.writer.all');
    }

    public function delete($writer_id)
    {
        $WriterDelete = WriterModel::find($writer_id);
        $WriterDelete->delete();
        return redirect()->route('admin.writer.all');
    }

    public function view($writer_id)
    {
        $WriterView = WriterModel::find($writer_id);
        return view ('admin.writer.view-writer' ,compact('WriterView'));
    }
}
