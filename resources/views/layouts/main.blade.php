<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class('bd-Body') @endphp
    data-level="{{ apply_filters('mos_user_level_slug', '') }}"
    data-next-level="{{ apply_filters('mos_user_next_level_slug', '') }}"
  >
    @include('partials.mn-MobileNav', ['menu_slug' => $top_menu_slug])
    @include('partials.hd-Header')
    <main class="m-Main">
      @yield('content')
    </main>
    @include('partials.ft-Footer')
  </body>
</html>
