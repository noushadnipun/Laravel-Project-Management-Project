@extends('admin.master')

@section('pagetitle')
Add New Project
@endsection

@section('pagecontent')

<div class="container">

  <div class="row clearfix">
       <div class="col-md-12">

            <div class="card-body card">
                
            <form method="POST" action="{{ route('admin.project.update') }}">
                @csrf
                   <input type="hidden" class="form-control" id="project_id" name="project_id" value="{{ $ProjectEdit->project_id }}" >
                    <div class="form-group">
                        <label for="project_name">Project Name</label>
                        <input type="text" class="form-control" id="project_name" name="project_name" placeholder="Enter Project's Name" value="{{ $ProjectEdit->project_name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="project_description">Project Description</label>
                        <textarea class="form-control" id="compose-textarea" rows="3" name="project_description" required>{{ $ProjectEdit->project_description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="project_status">Project Status</label>
                        <select class="form-control" id="project_status" name="project_status" value="$EditLsit->project_status">
                            <option value="0" {{ $ProjectEdit->project_status == 0 ? 'selected' : '' }}>Active</option>
                            <option value="1" {{ $ProjectEdit->project_status == 1 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>   

            </div>       
        </div>
    </div>
</div> 


@endsection