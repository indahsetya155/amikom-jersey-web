@auth
  <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
    @if(Auth::user()->avatar)
    <img alt="Foto {{Auth::user()->name}}" src="{{Auth::user()->avatar}}" class="rounded-circle mr-1">
    @else
    <img alt="image" src="{{asset('assets/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
    <div class="d-sm-none d-lg-inline-block">
            <span>{{ Auth::user()->name }}</span>
    </div></a>
    @endif
    <div class="dropdown-menu dropdown-menu-right">
      <a ref="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item has-icon text-danger">
        <i class="fas fa-sign-out-alt"></i> Keluar
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
      </form>
    </div>
  </li>
  @endauth
