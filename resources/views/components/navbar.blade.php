<div>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->

            {{-- <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li> --}}
            <li class="my-auto text-primary">
                @if (Auth::check())
                    Hai, {{ Auth::user()->username }}
                @endif
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" data-toggle="dropdown">
                    <i class="fas fa-user-circle" style="font-size: 25px"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                    <a class="dropdown-item" href="{{ route('profil.view', Auth::user()->id) }}">
                        <i class="fa fa-user my-auto pr-2"></i>
                        Profil
                    </a>
                    {{-- <a class="dropdown-item" href="{{ route('logout') }}">
                        <i class="fa fa-outdent my-auto pr-2" aria-hidden="true"></i>
                        Logout
                    </a> --}}
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="dropdown-item has-icon text-danger my-auto d-flex align-items-center btnlogout">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </nav>
</div>
