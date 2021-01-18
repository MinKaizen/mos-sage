<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class('bd-Body') @endphp
    data-level="{{ apply_filters('mos_user_level_slug', '') }}"
    data-next-level="{{ apply_filters('mos_user_next_level_slug', '') }}"
    style="background: url(@asset('images/background-geometric.svg')) #202942; background-size: contain"
  >
    @include('partials.mn-MobileNav', ['menu_slug' => 'primary_navigation'])
    @php do_action('get_header') @endphp
    @include('partials.hd-Header')
    <div class="wrap container" role="document">
      <div class="content">
        <main class="main">
          @yield('content')
        </main>
        @if (App\display_sidebar())
          <aside class="sidebar">
            @include('partials.sidebar')
          </aside>
        @endif
      </div>
    </div>
    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp
  </body>
</html>
