<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('prediction')}}">{{ env('APP_NAME')}}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">SPK</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Menu</li>
      <li class="@yield('prediction')"><a href="{{ route('prediction') }}" class="nav-link"><i class="fas fa-file-alt"></i><span>Prediction</span></a></li>
      <li class="@yield('model')"><a href="{{ route('model') }}" class="nav-link"><i class="fas fa-chart-bar"></i><span>Model</span></a></li>
      <li class="@yield('data')"><a href="{{ route('data') }}" class="nav-link"><i class="fas fa-database"></i><span>Data</span></a></li>
      <li class="@yield('team')"><a href="{{ route('team') }}" class="nav-link"><i class="fas fa-users"></i><span>About</span></a></li>
    </ul>

  </aside>
</div>
