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
                    <div class="col-md-6">
                        <h2>Lorem ipsum dolor sit amet</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed feugiat consectetur pellentesque. Nam ac elit risus, ac blandit dui. Duis rutrum porta tortor ut convallis. Duis rutrum porta tortor ut convallis.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed feugiat consectetur pellentesque. Nam ac elit risus, ac blandit dui. Duis rutrum porta tortor ut convallis. Duis rutrum porta tortor ut convallis.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <form class="form-horizontal" name="form-contact" id="form-contact" method="post" action="{{ url('contact') }}" role="form">
                            {{ csrf_field() }}
                          <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Name">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="message" class="col-sm-2 control-label">Message</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="message" name="message" rows="5" placeholder="Message">{{ old('message') }}</textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                          </div>
                        </form>
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