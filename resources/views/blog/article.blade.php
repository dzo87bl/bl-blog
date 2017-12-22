<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('partials._head')
    </head>
    <body>
        <div id="app">
            @include('partials._header')
            @include('partials._nav')
            <!-- -->
            <div class="container-fluid">
                <div class="container">
                    <div class="col-md-12">
                        <img src="{{ isset($article->image) ? Storage::url($article->image) : asset('img/placeholder-default.jpg') }}" class="img-responsive" alet="{{ $article->title }}"/>
                        <h2>{{ $article->title }}</h2>
                        {!! $article->content !!}
                        <p>
                            Category: {{ $article->category->title }} - 
                            Tags: 
                            @foreach($article->tags as $tag)
                                <span class="label label-default">{{ $tag->title }}</span> 
                            @endforeach
                             - Created at {{ date('d.m.Y H:i', strtotime($article->created_at)) }}
                        </p>
                    </div>
                </div>
            </div>
            <!-- / -->
            <!-- -->
            <div class="container-fluid">
                <div class="container">
                    <div class="col-md-offset-3 col-md-6">
                        <!-- form -->
                        <form class="form-horizontal" name="form-comment" id="form-comment" method="post" action="{{ route('comments.store') }}" onsubmit="" accept-charset="utf-8" enctype="multipart/form-data" autocomplete="" role="form" data-parsley-validate="">
                            {{ csrf_field() }}
                            <input type="hidden" name="article_id" value="{{ $article->id }}"/>
                          <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="" placeholder="Name" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="email" value="" placeholder="Email" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="rating" class="col-sm-2 control-label">Rating</label>
                            <div class="col-sm-10">
                                <input type="number" name="rating" id="rating" class="rating form-control" value="" data-min="0" data-max="5" data-step="1" data-size="xs" data-show-caption="false" data-show-clear="false" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="comment" class="col-sm-2 control-label">Comment</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="comment" name="comment" rows="5" placeholder="Comment" required></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                          </div>
                        </form>
                        <!-- / form -->
                    </div>
                </div>
            </div>
            <!-- / -->
            <!-- -->
            <div class="container-fluid">
                <div class="container">
                    <div class="col-md-10 col-md-offset-1">
                        @foreach($article->comments as $comment)
                            <div class="well">
                                {{ $comment->name }} - on {{ date('d.m.Y H:i', strtotime($comment->created_at)) }}
                                <input type="number" name="rating" id="rating" class="rating form-control" value="{{ $comment->rating }}" data-min="0" data-max="5" data-step="1" data-size="xs" data-show-caption="false" data-show-clear="false" disabled="disabled">
                                <br/>
                                {!! $comment->comment !!}
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- / -->
            <!-- content -->
            @yield('content')
            <!-- / content -->
            @include('partials._footer')
        </div>
        <a href="#" class="scrollup">Scroll</a>
        <!-- SCRIPTS -->
        <script language="javascript" src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script language="javascript">
            $(document).ready(function(){
                
            });
        </script>
    </body>
</html>