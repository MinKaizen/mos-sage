<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class('bd-Body') @endphp
    data-level="{{ apply_filters('mos_user_level_slug', '') }}"
    data-next-level="{{ apply_filters('mos_user_next_level_slug', '') }}"
    style="background: url(@asset('images/background-geometric.svg')) #202942; background-size: contain"
  >
    @include('partials.mn-MobileNav', ['menu_slug' => $top_menu_slug])
    @include('partials.hd-Header')
    @yield('content')
    @include('partials.ft-Footer')
  </body>
</html>
