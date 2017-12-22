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
            <div class="container-fluid" id="main">
                <div class="container">
                    <div class="col-md-12">
                        <div>
                        <h2>Lorem ipsum dolor sit amet</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed feugiat consectetur pellentesque. Nam ac elit risus, ac blandit dui. Duis rutrum porta tortor ut convallis. Duis rutrum porta tortor ut convallis.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed feugiat consectetur pellentesque. Nam ac elit risus, ac blandit dui. Duis rutrum porta tortor ut convallis. Duis rutrum porta tortor ut convallis.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed feugiat consectetur pellentesque. Nam ac elit risus, ac blandit dui. Duis rutrum porta tortor ut convallis. Duis rutrum porta tortor ut convallis.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed feugiat consectetur pellentesque. Nam ac elit risus, ac blandit dui. Duis rutrum porta tortor ut convallis. Duis rutrum porta tortor ut convallis.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed feugiat consectetur pellentesque. Nam ac elit risus, ac blandit dui. Duis rutrum porta tortor ut convallis. Duis rutrum porta tortor ut convallis.
                        </p>
                        </div>
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