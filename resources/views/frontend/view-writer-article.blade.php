@extends('frontend.master') 

@section('pagecontent')

<div class="row clearfix">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Article Details</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12">
                                <div class="post">
                                    <div class="user-block">
                                        <span class="username ml-0 text-primary">
                                             Title
                                        </span>
                                    </div>
                                    <p>{{ $ArticleView->article_title }}</p>
                                </div>

                                <div class="post">
                                    <div class="user-block">
                                        <span class="username ml-0 text-primary">
                                            Description
                                        </span>
                                    </div>
                                    <p><?php echo $ArticleView->article_description; ?></p>
                                </div>

                                <div class="post">
                                    <div class="user-block">
                                        <span class="username ml-0 text-primary">
                                            Due Date
                                        </span>
                                    </div>
                                    <p>{{ $ArticleView->article_due_date }}</p>
                                </div>

                                <div class="post">
                                    <div class="user-block">
                                        <span class="username ml-0 text-primary">
                                            Cost
                                        </span>
                                    </div>
                                    <p>{{ $ArticleView->article_cost }}</p>
                                </div>

                                <div class="post">
                                    <div class="user-block">
                                        <span class="username ml-0 text-primary">
                                            Project
                                        </span>
                                    </div>
                                    <p>
                                        @if($ArticleView->project == true) 
                                            <b class="d-block">{{ $ArticleView->project->project_name }}</b>
                                            <?php echo $ArticleView->project->project_description;?>
                                        @else
                                            <b class="text-danger">No Project</b>   
                                        @endif                               
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-6 order-1 order-md-2">
                       
        <!-- Show Comment -->

        <div class="card direct-chat direct-chat-primary collapsing-card direct-chat-contacts-open">
            <div class="card-header">
                <h3 class="card-title">Recent Comments</h3>

                <div class="card-tools">
                    <span data-toggle="tooltip" title="Total {{ $commentcount }} Comments" class="badge badge-primary">{{ $commentcount }}</span>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                    <!-- Message. Default to the left -->
                    @foreach ($ArticleView->articlecomment as $commentlist )
                        @if($commentlist->getwriter->writer_id == $GetWriterID)
                        <div class="direct-chat-msg">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-left">
                                    @if($commentlist->writer_article_file == true)
                                       <a target= "_blank" href="{{ asset('uploads/article-documents/'.$commentlist->writer_article_file) }}" class="link-black text-sm"><i class="fas fa-link mr-1"></i> {{ $commentlist->writer_article_file }}</a>
                                    @else No file @endif   
                                </span>
                                <span class="direct-chat-timestamp float-right">
                                @if($commentlist->created_at == true)
                                {{ $commentlist->created_at->format('d/m/Y : h:i a') }} 
                                @else No comment @endif 
                                </span>
                            </div>
                            <div class="direct-chat-text ml-0">
                                {{ $commentlist->writer_article_comment }}  
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                        @endif
                    @endforeach
                </div>
                <!-- /.direct-chat-pane -->
            </div>
            <!-- /.card-body -->
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('writer.dashboard.article.view.response', $ArticleView->article_id) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="writer_article_comment" class="text-primary">Add Comment</label>
                <textarea class="form-control" id="writer_article_comment" rows="3" name="writer_article_comment"> </textarea>
            </div>

            <div class="form-group">
                <label for="writer_article_file" class="text-primary">Upload File (Max Size: 10MB)</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control" id="writer_article_file" name="writer_article_file">
                      </div>
                    </div>
            </div>

            <div class="">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form><!-- End Form -->
    </div>
</div>


@endsection
