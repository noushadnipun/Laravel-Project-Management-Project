@extends('admin.master')

@section('pagetitle')

All Writer

@endsection

@section('pagecontent')

<div class="container-fluid">

    <div class="row clearfix">
       <div class="col-md-12">

            <div class="card-body card-info card">

                <table class="table table-bordered">
                    <thead>                  
                    <tr>
                        <th style="width: 10px">S/N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Assign Project</th>
                        <th> Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($WriterLsit as $key => $row)
                    <tr>
                        <td> {{ ++$key }}  </td>
                        <td> {{ $row->writer_name }}  </td>
                        <td> {{ $row->writer_email }} </td>
                        <td> 
                            @if($row->project == true)
                                {{ $row->project->project_name }} 
                            @else
                                <b class="text-danger">No Project Assign</b> 
                            @endif    
                        </td>
                        <td> 
                            @if($row->writer_status == 0)
                            <small class="badge badge-success"> Active</small>
                            
                            @else

                            <small class="badge badge-danger"> Inactive</small>

                            @endif
                        </td>
                        <td> 
                      
                        <input type="hidden" value="{{$row->writer_id}}" name="writer_id">
                        <a class="btn btn-info btn-sm" href="{{ route('admin.writer.view', $row->writer_id) }}">
                           <i class="fas fa-pencil-alt"></i> view
                        </a>
                        

                        <a class="btn btn-info btn-sm" href="{{ route('admin.writer.edit', $row->writer_id) }}">
                        <i class="fas fa-pencil-alt"></i> Edit
                        </a>

                        <a class="btn btn-danger btn-sm" href="{{ route('admin.writer.delete', $row->writer_id) }}" onclick="return confirm('Are you sure?')">
                            <i class="fas fa-trash"> </i> Delete
                        </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
            <div class="card card-info">
                <div class="pagination pagination-sm mt-2 float-right">
                {{ $WriterLsit->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection