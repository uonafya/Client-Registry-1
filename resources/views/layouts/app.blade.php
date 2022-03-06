<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Client Registry') }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="/resources/css/search.css">
     <style>
        footer{
            text-align:center;
            /* position: relative; */
        }
         body{
            background-color: whitesmoke;
        }
        @media (min-width: 991.98px) {
            .content-wrapper {
                padding-left: 20%;
                margin-top: auto;
            }
        }

        /* Sidebar */
        .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        padding: 58px 0 0; Height of navbar
        box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
        width: 20%;
        z-index: 600;
        }

        @media (max-width: 991.98px;) {
            .sidebar {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
            <div class="position-sticky">
              <div class="list-group list-group-flush mx-3 mt-4">
                <a
                  href="/search"
                  class="list-group-item list-group-item-action py-2 ripple"
                  aria-current="true"
                >
                  <i class="fas fa-home fa-fw me-3"></i><span>Home</span>
                </a>
                <a href="/search" class="list-group-item list-group-item-action py-2 ripple">
                  <i class="fas fa-search fa-fw me-3"></i><span>Search Client</span>
                </a>
                <a href="/new_client" class="list-group-item list-group-item-action py-2 ripple"
                  ><i class="fas fa-plus fa-fw me-3"></i><span>Add new Client</span></a
                >
                <a href="/register_user" class="list-group-item list-group-item-action py-2 ripple"
                  ><i class="fas fa-users fa-fw me-3"></i><span> Register User</span></a
                >
                  <a href="/transfers" class="list-group-item list-group-item-action py-2 ripple"
                  ><i class="fas fa-list fa-fw me-3"></i><span> Transfers

                      <label class="badge badge-danger" style="font-size: 15px;">{{ DB::table('patients')->where('transferstatus',[1])->count() }}</label>

                     </span></a>

              </div>
            </div>
          </nav>
        <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
            {{-- <div class="container-fluid"> --}}
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="img/Kenya-logo.webp" alt="" width="30" height="24" class="d-inline-block align-text-top">
                    Client Registry
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent" tabindex="-1">


                    {{-- right side --}}
                    {{-- <div class="navbar-collapse collapse w-100 order-3 dual-collapse2" > --}}
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre >
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="#" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    {{-- </div> --}}
                </div>
            {{-- </div> --}}
        </nav>
    </header>
        <div class="content-wrapper">
            <section class="content">
                @yield('content')
            </section>
        </div>



    @include('layouts.footer')
</body>
</html>
