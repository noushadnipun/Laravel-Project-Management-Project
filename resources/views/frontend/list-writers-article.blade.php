@extends('frontend/master')

@section('pagecontent')


<div class="container-fluid">

    <div class="row clearfix">
       <div class="col-md-12">

            <div class="card-body card-info card">

                <table class="table table-bordered">
                    <thead>                  
                    <tr>
                        <th style="width: 10px">S/N</th>
                        <th>Article Title</th>
                        <th> Project</th>

                        <th>Due Date</th>
                        <th>Article Cost</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($writerprofile as $key => $row)
                    <tr>
                        <td> {{ ++$key }}  </td>
                        <td> {{ $row->article_title }}  </td>
                        <td> 
                            @if($row->project == true) 
                                {{ $row->project->project_name }}
                            @else
                                <b class="text-danger">No Project</b>   
                            @endif 
                        </td>
                        <td> {{ $row->article_due_date }} </td>
                        <td> {{ $row->article_cost }} </td>
                        <td> 
                            <a class="btn btn-info btn-sm" href="{{ route('writer.dashboard.article.view', $row->article_id) }}">
                            <i class="fas fa-eye"></i> View
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>

@endsection