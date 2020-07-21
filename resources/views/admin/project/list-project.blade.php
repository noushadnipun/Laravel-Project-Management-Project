@extends('admin.master')

@section('pagetitle')

All Project

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
                        <th>Date</th>
                        <th> Project Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($ProjectLsit as $key => $row)
                    <tr>
                        <td> {{ ++$key }}  </td>
                        <td> {{ $row->project_name }}  </td>
                        <td> 
                            {{ $row->updated_at->format('d M Y') }} 
                        
                        </td>
                        <td> 
                            @if($row->project_status == 0)
                            <small class="badge badge-success"> Active</small>
                            
                            @else

                            <small class="badge badge-danger"> Inactive</small>

                            @endif
                        </td>
                        <td> 
                        <a class="btn btn-info btn-sm" href="{{ route('admin.project.view', $row->project_id) }}">
                        <i class="fas fa-view"></i> View
                        </a>

                        <a class="btn btn-info btn-sm" href="{{ route('admin.project.edit', $row->project_id) }}">
                        <i class="fas fa-pencil-alt"></i> Edit
                        </a>

                        <a class="btn btn-danger btn-sm" href="{{ route('admin.project.delete', $row->project_id) }}" onclick="return confirm('Are you sure?')">
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
                {{ $ProjectLsit->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection