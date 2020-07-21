@extends('admin.master')

@section('pagetitle')
Edit Article
@endsection

@section('pagecontent')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<link href="https://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" rel="stylesheet">

<div class="container">

  <div class="row clearfix">
       <div class="col-md-12">

            <div class="card-body card">
                
            <form method="POST" action="{{ route('admin.article.update') }}">
                @csrf
                   <input type="hidden" class="form-control" id="writer_id" name="article_id" value="{{ $ArticleEdit->article_id }}" >
                    <div class="form-group">
                        <label for="article_title">Article Title</label>
                        <input type="text" class="form-control" id="article_title" name="article_title" placeholder="Enter Article's Name" value="{{ $ArticleEdit->article_title }}" required>
                    </div>

                    <div class="form-group">
                        <label for="article_description">Article Description</label>
                        <textarea class="form-control" id="compose-textarea" rows="3" name="article_description" required>{{ $ArticleEdit->article_description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="article_due_date">Due Date</label>
                         <input type="text" class="form-control" id="datepicker" name="article_due_date" value="{{ $ArticleEdit->article_due_date }}"  required>
                    </div>

                    <div class="form-group">
                        <label for="article_cost">Article Cost</label>
                       <input type="text" class="form-control" id="article_cost" name="article_cost" placeholder="Article Cost - Enter the amount ($) you wish to pay for this Article" value="{{ $ArticleEdit->article_cost }}" required>
                    </div>

                    <div class="form-group">
                        <label for="article_project">Select project</label>
                        <select class="form-control" id="article_project" name="article_project">
                            <option value="">Not Now Select</option>
                            @foreach($ProjectLsit as $row )
                                @if($row->project_status == 0)
                                    <option value="{{ $row->project_id}}"
                                        @if( $row->project_id == $ArticleEdit->article_project )
                                        selected
                                        @endif> {{ $row->project_name}}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        
                    </div>

                    <div class="form-group">
                        <label for="article_writer">Select Writer</label>
                        <select class="form-control" id="article_writer" name="article_writer">
                            <option value="">Not Now Select</option>
                            @foreach($WriterLsit as $row )
                                @if($row->writer_status == 0)
                                    <option value="{{ $row->writer_id}}"
                                        @if( $row->writer_id == $ArticleEdit->article_writer )
                                        selected
                                        @endif> {{ $row->writer_name}}
                                    </option>
                                @endif
                            @endforeach
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
<script>
  $(function () {
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      dateFormat: "dd-mm-yy"
    })
  })
</script>

@endsection