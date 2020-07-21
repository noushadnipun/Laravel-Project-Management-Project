@extends('admin.master')

@section('pagetitle')
Edit Writer
@endsection

@section('pagecontent')

<div class="container">

  <div class="row clearfix">
       <div class="col-md-12">

            <div class="card-body card-info card">
                
            <form method="POST" action="{{ route('admin.writer.update') }}">
                @csrf
                   <input type="hidden" class="form-control" id="writer_id" name="writer_id" value="{{ $WriterEdit->writer_id }}" >
                    <div class="form-group">
                        <label for="project_name">Writer Name</label>
                        <input type="text" class="form-control" id="writer_name" name="writer_name" placeholder="Enter writer's Name" value="{{ $WriterEdit->writer_name }}">
                    </div>

                    <div class="form-group">
                        <label for="writer_email">Writer Email</label>
                       <input type="email" class="form-control" id="writer_email" name="writer_email" placeholder="Enter writer's Email" value="{{ $WriterEdit->writer_email }}">
                    </div>

                    <div class="form-group">
                        <label for="writer_email">Writer Password</label>
                       <input type="password" class="form-control" id="writer_password" name="writer_password" placeholder="Update Writer's Password">
                    </div>

                    <div class="form-group">
                        <label for="writer_address">Writer Address</label>
                       <input type="text" class="form-control" id="writer_address" name="writer_address" placeholder="Enter writer's Address" value="{{ $WriterEdit->writer_address }}">
                    </div>

                    <div class="form-group">
                        <label for="writer_phone">Writer Phone</label>
                       <input type="text" class="form-control" id="writer_phone" name="writer_phone" placeholder="Enter writer's Phone" value="{{ $WriterEdit->writer_phone }}">
                    </div>

                    <div class="form-group">
                        <label for="writer_assign_project">Assign Project</label>
                        <select class="form-control" id="writer_assign_project" name="writer_assign_project">
                            <option value="">No Project</option>
                            @foreach($ProjectLsit as $row )
                                @if($row->project_status == 0)
                                    <option value="{{ $row->project_id }}" 
                                        @if( $row->project_id == $WriterEdit->writer_assign_project ) selected @endif  >
                                        {{ $row->project_name}}
                                    </option>
                                @endif    
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="project_status">Writer Status</label>
                        <select class="form-control" id="project_status" name="writer_status" value="$EditLsit->project_status">
                            <option value="0" {{ $WriterEdit->writer_status == 0 ? 'selected' : '' }}>Active</option>
                            <option value="1" {{ $WriterEdit->writer_status == 1 ? 'selected' : '' }}>Inactive</option>
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