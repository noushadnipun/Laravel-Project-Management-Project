@extends('admin.master')

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
            <h3> {{ $totalProject }} </h3>

            <p>Total Project</p>
        </div>
        <div class="icon">
            <i class="ion ion-info"></i>
        </div>
        
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-green">
        <div class="inner text-center">
            <h3> {{ $totalActiveProject }} </h3>

            <p>Total Active Project</p>
        </div>
        <div class="icon">
            <i class="ion ion-info"></i>
        </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-red">
        <div class="inner text-center">
            <h3> {{ $totalInactiveProject }} </h3>

            <p>Total Inactive Project</p>
        </div>
        <div class="icon">
            <i class="ion ion-info"></i>
        </div>
        </div>
    </div>
</div> 

<div class="row">

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
        <div class="inner text-center">
            <h3> {{ $totalWriter }} </h3>

            <p>Total Writer</p>
        </div>
        <div class="icon">
            <i class="ion ion-info"></i>
        </div>
        
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-green">
        <div class="inner text-center">
            <h3> {{ $totalActiveWriter }} </h3>

            <p>Total Active Writer</p>
        </div>
        <div class="icon">
            <i class="ion ion-info"></i>
        </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-red">
        <div class="inner text-center">
            <h3> {{ $totalInactiveWriter }} </h3>

            <p>Total Inactive Writer</p>
        </div>
        <div class="icon">
            <i class="ion ion-info"></i>
        </div>
        </div>
    </div>
</div> 


<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
        <div class="inner text-center">
            <h3> {{ $totalArticle }} </h3>

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
              <form role="form" method="POST" action="{{ route('admin.profile.update') }}">
              @csrf
               <input type="hidden" class="form-control" id="writer_id" name="id" value="{{ $currentuser->id }}" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="writer_name">Name</label>
                    <input type="text" class="form-control" id="name" value="{{ $currentuser->name }}" autocomplete="off" name="name">
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" value="{{ $currentuser->email }}" autocomplete="off" name="email">
                  </div>
                  
                  <div class="form-group">
                    <label for="password">Password</label>
                   <input type="password" class="form-control" id="password" password="password" autocomplete="new-password" name="password">
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