<!DOCTYPE html>
<html lang="en">
@include('layouts.head')

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      @include('layouts.sidebar')

      <div class="main-content" style="padding-top:8px">
        <section class="section">
          <div class="section-header">
            <ul class="navbar-nav mr-3 mt-1">
              <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            </ul>
            <h1>@yield('page')</h1>
          </div>

          <div class="section-body">
            @yield('body')
          </div>
        </section>
      </div>
      @include('layouts.footer')
    </div>
  </div>

  @include('layouts.foot')
</body>

</html>
