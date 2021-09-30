<div class="sidebar" data-color="green" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <center><img src="{{asset('storage/logo-amal.png')}}" alt="" style="height:130px; width:100px;"></center>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'daftar' || $activePage == 'senarai-pengguna' || $activePage == 'profile') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/multiple-users-silhouette.svg"></i>
          <p>{{ __('Pengguna') }}
            <b class="caret"></b>
          </p>
        </a>
      <div class="collapse show"  id="laravelExample">
        <ul class="nav">
          @role('admin|admin_kawasan')
          <li class="nav-item{{ $activePage == 'daftar' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('daftar') }}">
              <i class="material-icons"><img style="vertical-align:text-top; width:23px;" src="{{ asset('material') }}/img/user-male-black-shape-with-plus-sign.svg"></i>
                <p>{{ __('Tambah Pengguna') }}</p>
            </a>
          </li>
          <li class="nav-item{{ $activePage == 'senarai-pengguna' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('senarai-pengguna') }}">
              <i class="material-icons"><img style="vertical-align:text-top; width:23px;" src="{{ asset('material') }}/img/format-list-bulleted.png"></i>
                <p>{{ __('Senarai Pengguna') }}</p>
            </a>
          </li>
          <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('profile.edit') }}">
              <i><img style="vertical-align:text-top; width:25px;" src="{{ asset('material') }}/img/account-cog.png"></i>
              <span class="sidebar-normal">{{ __('Profil Pengguna') }} </span>
            </a>
          </li>
          @else 
          <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('profile.edit') }}">
              <i><img style="vertical-align:text-top; width:25px;" src="{{ asset('material') }}/img/account-cog.png"></i>
              <span class="sidebar-normal">{{ __('Profil Pengguna') }} </span>
            </a>
          </li>
          @endrole
        </ul>
      </div>
      <li class="nav-item {{ ($activePage == 'tambah-ahli' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample2" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/multiple-users-silhouette.svg"></i>
          <p>{{ __('Ahli') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample2">
          <ul class="nav">
            @role('admin|admin_kawasan')
            <li class="nav-item{{ $activePage == 'tambah-ahli' ? ' active' : '' }}">
              <a class="nav-link" href="{{ url('/tambah_ahli') }}">
                <i><img style="vertical-align:text-top; width:25px;" src="{{ asset('material') }}/img/user-male-black-shape-with-plus-sign.svg"></i>
                <span class="sidebar-normal">{{ __('Tambah Ahli') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{url('/member')}}">
                <i><img style="vertical-align:text-top; width:25px;" src="{{ asset('material') }}/img/account-edit.png"></i>
                <span class="sidebar-normal"> {{ __('Pengurusan Ahli') }} </span>
              </a>
            </li>
            @else 
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{url('/member')}}">
                <i><img style="vertical-align:text-top; width:25px;" src="{{ asset('material') }}/img/format-list-bulleted.png"></i>
                <span class="sidebar-normal"> {{ __('Senarai Ahli') }} </span>
              </a>
            </li>
            @endrole
          </ul>
        </div>
      </li>
      {{-- <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('table') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Table List') }}</p>
        </a>
      </li> --}}
      {{-- <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('typography') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Typography') }}</p>
        </a>
      </li> --}}
      {{-- <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('icons') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li> --}}
      {{-- <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('map') }}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Maps') }}</p>
        </a>
      </li> --}}
      {{-- <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('notifications') }}">
          <i class="material-icons">notifications</i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li> --}}
      {{-- <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('language') }}">
          <i class="material-icons">language</i>
          <p>{{ __('RTL Support') }}</p>
        </a>
      </li> --}}
    </ul>
  </div>
</div>
