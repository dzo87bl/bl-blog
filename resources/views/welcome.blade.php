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
                        
                    </div>
                </div>
            </div>
            <!-- / -->
            <!-- pinterest layout -->
            <div class="container-fluid">
                <div class="container">
                    <div class="col-md-12">
                        <div class="columns">
                            @foreach($articles as $article)
                            <div class="pin">
                                <img src="{{ isset($article->image) ? Storage::url($article->image) : asset('img/placeholder-default.jpg') }}" />
                                <h4>
                                    {{-- url('blog/' . $article->slug) --}}
                                    <a href="{{ route('blog.article', $article->slug) }}">
                                        {{ $article->title }}
                                    </a>
                                </h4>
                                <p>
                                    {!! (strlen($article->content) > 250) ? substr($article->content, 0, strpos($article->content, ' ', 250)) . '...' : $article->content !!}
                                </p>
                            </div>
                            @endforeach
                        </div>
                        <div class="text-center">
                            {{ $articles->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- / pinterest layout -->
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