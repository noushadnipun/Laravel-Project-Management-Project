@extends('frontend/master')

@section('pagecontent')

@if(session('msg'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-check"></i> {{ session('msg') }}</h5>
</div>
@endif

<div class="row">

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
        <div class="inner text-center">
            <h3> {{ $totalWriterArticle }} </h3>

            <p>Total Article</p>
        </div>
        <div class="icon">
            <i class="ion ion-info"></i>
        </div>
        
        </div>
    </div>


        <div class="col-md-6">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Profile Setting</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{ route('writer.profile.update') }}">
              @csrf
               <input type="hidden" class="form-control" id="writer_id" name="writer_id" value="{{ $getProfileInput->writer_id }}" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="writer_name">Name</label>
                    <input type="text" class="form-control" id="writer_name" value="{{ $getProfileInput->writer_name }}" autocomplete="off" name="writer_name">
                  </div>

                  <div class="form-group">
                    <label for="writer_address">Address</label>
                    <input type="text" class="form-control" id="writer_address" value="{{ $getProfileInput->writer_address }}" autocomplete="off" name="writer_address">
                  </div>

                  <div class="form-group">
                    <label for="writer_phone">Phone</label>
                    <input type="text" class="form-control" id="writer_phone" value="{{ $getProfileInput->writer_phone }}" autocomplete="off" name="writer_phone">
                  </div>
                  
                  <div class="form-group">
                    <label for="writer_password">Password</label>
                    <input type="password" class="form-control" id="writer_password" name="writer_password" placeholder="Update Password" autocomplete="off";">
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Update</button>
                </div>
              </form>

            </div>
        </div>    

</div> 


@endsection