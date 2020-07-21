@extends('admin.master')

@section('pagetitle')

All Article

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
                        <th>Article Title</th>
                        <th> Project</th>
                        <th> Writer</th>
                        <th>Due Date</th>
                        <th>Article Cost</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($ArticleLsit as $key => $row)
                    <tr>
                        <td> {{ ++$key }}  </td>
                        <td> {{ $row->article_title }}  </td>
                        <td>
                            @if($row->project == true) 
                             {{ $row->project->project_name }}
                            @else
                             <b class="text-danger">Not Assign Project</b>   
                            @endif   
                        </td>
                        <td> 
                            @if($row->article)
                                {{ $row->article->writer_name }}
                            @else
                                <b class="text-danger">Not Assign Writer</b>
                            @endif    
                        </td>
                        <td> {{ $row->article_due_date }} </td>
                        <td> {{ $row->article_cost }} </td>
                        <td> 
                            
                            <a class="btn btn-info btn-sm" href="{{ route('admin.article.view', $row->article_id) }}">
                            <i class="fas fa-eye"></i> View
                            </a>
                            
                            <a class="btn btn-info btn-sm" href="{{ route('admin.article.edit', $row->article_id) }}">
                            <i class="fas fa-pencil-alt"></i> Edit
                            </a>

                            <a class="btn btn-danger btn-sm" href="{{ route('admin.article.delete', $row->article_id) }}" onclick="return confirm('Are you sure?')">
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
                {{ $ArticleLsit->links() }}
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection