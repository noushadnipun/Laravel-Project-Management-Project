@extends('admin.master')

@section('pagetitle')
Add New Writer
@endsection

@section('pagecontent')

<div class="container">

  <div class="row clearfix">
       <div class="col-md-12">

            <div class="card-body card-info card">
                
            <form method="POST" action="{{ route('admin.writer.store') }}">
                @csrf
                    <div class="form-group">
                        <label for="project_name">Writer Name</label>
                        <input type="text" class="form-control" id="writer_name" name="writer_name" placeholder="Enter writer's Name" value="{{ old('writer_name') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="writer_email">Writer Email</label>
                       <input type="email" class="form-control" id="writer_email" name="writer_email" placeholder="Enter writer's Email" value="{{ old('writer_email') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="writer_password">Writer Password</label>
                       <input type="password" class="form-control" id="writer_password" name="writer_password" placeholder="Set writer's Password" value="{{ old('writer_password') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="writer_address">Writer Address</label>
                       <input type="text" class="form-control" id="writer_address" name="writer_address" placeholder="Enter writer's Address" value="{{ old('writer_address') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="writer_phone">Writer Phone</label>
                       <input type="text" class="form-control" id="writer_phone" name="writer_phone" placeholder="Enter writer's Phone" value="{{ old('writer_phone') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="project_status">Assign Project</label>
                        <select class="form-control" id="writer_status" name="writer_assign_project">
                            <option value="">No Project</option>
                            @foreach($ProjectLsit as $row )
                                @if($row->project_status == 0)
                                    <option value="{{ $row->project_id}}">{{ $row->project_name}}</option>
                                @endif 
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="project_status">Writer Status</label>
                        <select class="form-control" id="writer_status" name="writer_status">
                            <option value="0">Active</option>
                            <option value="1">Inactive</option>
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