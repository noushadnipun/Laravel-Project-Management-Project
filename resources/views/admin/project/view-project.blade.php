@extends('admin.master')


@section('pagecontent')

<div class="container-fluid">

    <div class="row clearfix">
       <div class="col-md-12">

            <div class="card-body card-info card">
              <?php echo $ProjectView->project_description;?> 
            </div>
        </div>
    </div>
</div>

@endsection