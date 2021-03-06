<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/style.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- google search -->
        <script async src="https://cse.google.com/cse.js?cx=663468ebb7d57c8b2"></script>

      </head>
      <body>
        <header>
        <nav class="navbar  navbar-expand-lg navbar-dark bg-primary">
          <a class="navbar-brand" href="/">Movie Time</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item ">
                <a class="nav-link" href="/movies">All Movies <span class="sr-only">(current)</span></a>
              </li>
              @auth
              <li class="nav-item">
                <a class="nav-link" href="/movies/create">New</a>
              </li>
              @endauth

            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @else
                    <li class="nav-item">
                          <a class="nav-link" href="{{ route('profile.show') }}">{{ __('Profile') }}</a>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                        @csrf
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                    </form>
                  @endguest

              </ul>
              <div class="gcse-search"></div>
            </div>
          </nav>
        </header>

        <main>
           @yield('content')
       </main>

       <footer class="bg-primary">
                <div class="footer-copyright text-center p-3 mb-2 text-white">© 2020 Copyright:<a class="text-dark" href="https://sit.ac.nz/Queenstown"> SIT Tech QT</a>
                </div>
       </footer>

    </body>
</html>
