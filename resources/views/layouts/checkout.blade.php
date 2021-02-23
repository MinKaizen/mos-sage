<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class('bd-Body') @endphp>
    @include('partials.svg-symbols')
    @yield('content')
  </body>
  @php wp_footer() @endphp
</html>
