			<div class="container-fluid">
				<div class="container">
					<div class="col-md-12">
						<!-- nav -->
						<nav class="navbar navbar-default navbar-static-top">
				            <div class="container">
				                <div class="navbar-header">
				                    <!-- Collapsed Hamburger -->
				                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
				                        <span class="sr-only">Toggle Navigation</span>
				                        <span class="icon-bar"></span>
				                        <span class="icon-bar"></span>
				                        <span class="icon-bar"></span>
				                    </button>
				                    <!-- Branding Image -->
				                    <a class="navbar-brand" href="{{ url('/') }}">
				                        {{ config('app.name', 'BL-Blog') }}
				                    </a>
				                </div>
				                <div class="collapse navbar-collapse" id="app-navbar-collapse">
				                    <!-- Left Side Of Navbar -->
				                    <ul class="nav navbar-nav">
				                    	<li{{ Request::is('/') ? ' class=active' : null }}>
							 	          	<a href="{{ url('/') }}">Welcome</a>
							            </li>
							            <li{{ Request::is('about') ? ' class=active' : null }}>
							 	          	<a href="{{ url('/about') }}">About</a>
							            </li>
							            <li{{ Request::is('contact') ? ' class=active' : null }}>
							 	          	<a href="{{ url('/contact') }}">Contact</a>
							            </li>
				                    </ul>
				                    <form class="navbar-form navbar-left" method="post" action="/search">
				                    	{{ csrf_field() }}
								        <div class="form-group">
								          <input type="text" class="form-control" name="search" id="search" placeholder="Search">
								        </div>
								        <button type="submit" class="btn btn-default">
								        	<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
								        </button>
								      </form>
				                    <!-- Right Side Of Navbar -->
				                    <ul class="nav navbar-nav navbar-right">
				                    	@if (Route::has('login'))
							                @auth
							                    <li{{ Request::is('home') ? ' class=active' : null }}>
							                      	<a href="{{ url('/home') }}">
							                      		<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
							                      		Home
							                      	</a>
							                    </li>
							                    <li class="dropdown">
					                                <a href="#" title="System info" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
					                                	<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span><span class="caret"></span>
					                                </a>
					                                <ul class="dropdown-menu">
					                                	<li>
							                            	Web server {{ $web_server }}
							                            </li>
							                            <li role="separator" class="divider"></li>
					                                    <li>
					                                        PHP version {{ $php_ver }}
					                                    </li>
					                                    <li role="separator" class="divider"></li>
					                                    <li>
					                                        Operating System {{ $os }}
					                                    </li>
					                                </ul>
					                            </li>
							                    <li{{ Request::is('clear-cache') ? ' class=active' : null }}>
							                      	<a href="{{ url('/clear-cache') }}" title="Clean cache">
							                      		<span class="glyphicon glyphicon-flash" aria-hidden="true"></span>
							                      	</a>
							                    </li>
						                    @endauth
							            @endif
				                        <!-- Authentication Links -->
				                        @guest
				                            <li{{ Request::is('login') ? ' class=active' : null }}>
				                            	<a href="{{ route('login') }}">Login</a>
				                            </li>
				                            <li{{ Request::is('register') ? ' class=active' : null }}>
				                            	<a href="{{ route('register') }}">Register</a>
				                            </li>
				                        @else
				                        	<li class="dropdown">
				                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
				                                	<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
				                                    CMS <span class="caret"></span>
				                                </a>
				                                <ul class="dropdown-menu">
				                                	<li>
						                            	<a href="{{ route('articles.index') }}">
						                            		<span class="glyphicon glyphicon-file" aria-hidden="true"></span> 
						                            		Articles
						                            	</a>
						                            </li>
				                                    <li>
				                                        <a href="{{ route('categories.index') }}">
				                                        	<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> 
				                                            Categories
				                                        </a>
				                                    </li>
				                                    <li>
				                                        <a href="{{ route('tags.index') }}">
				                                        	<span class="glyphicon glyphicon-tag" aria-hidden="true"></span> 
				                                            Tags
				                                        </a>
				                                    </li>
				                                </ul>
				                            </li>
				                            <li class="dropdown">
				                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
				                                	<span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
				                                    {{ Auth::user()->name }} <span class="caret"></span>
				                                </a>
				                                <ul class="dropdown-menu">
				                                	<li>
						                            	<a href="#">
						                            		<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> 
						                            		Settings
						                            	</a>
						                            </li>
				                                    <li>
				                                        <a href="{{ route('logout') }}"
				                                            onclick="event.preventDefault();
				                                                     document.getElementById('logout-form').submit();">
				                                            Logout
				                                        </a>
				                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				                                            {{ csrf_field() }}
				                                        </form>
				                                    </li>
				                                </ul>
				                            </li>
				                        @endguest
				                    </ul>
				                </div>
				            </div>
				        </nav>
						<!-- / nav -->
					</div>
				</div>
			</div>
			<br/>