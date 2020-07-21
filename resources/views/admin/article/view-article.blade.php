@extends('admin.master') 

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
                                    <p><?php echo $ArticleView->article_description ?></p>
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
                                            Project Name
                                        </span>
                                    </div>
                                    <p>
                                        @if($ArticleView->project == true) 
                                            <b class="d-block">{{ $ArticleView->project->project_name }}</b>
                                            <?php echo $ArticleView->project->project_description;?>
                                        @else
                                            <b class="text-danger">Not Assign Project</b>   
                                        @endif 
                                    </p>
                                </div>

                                <div class="post">
                                    <div class="user-block">
                                        <span class="username ml-0 text-primary">
                                            Writer Name
                                        </span>
                                    </div>
                                    <p>
                                        @if($ArticleView->article == true) 
                                            {{ $ArticleView->article->writer_name }} <br/>
                                        @else
                                            <b class="text-danger">Not Assign Writer</b>   
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
                    <span data-toggle="tooltip" title="3 New Messages" class="badge badge-primary">{{ $ArticleView->articlecomment->count() }}</span>
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
                    <div class="direct-chat-msg">
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-left">
                                <a href="{{ route('admin.writer.view', $commentlist->getwriter->writer_id) }}">{{ $commentlist->getwriter->writer_name }}</a> says:
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
                        <span class="direct-chat-name float-left">
                            @if($commentlist->writer_article_file == true)
                               <a target ="_blank" href="{{ asset('uploads/article-documents/'.$commentlist->writer_article_file) }}" class="link-black text-sm"><i class="fas fa-link mr-1"></i> {{ $commentlist->writer_article_file }}</a>
                            @else No file @endif   
                        </span>
                        <!-- /.direct-chat-text -->
                    </div>
                    @endforeach
                </div>
                <!-- /.direct-chat-pane -->
            </div>
            <!-- /.card-body -->
        </div>

        <!-- Form -->

    </div>
</div>


@endsection
