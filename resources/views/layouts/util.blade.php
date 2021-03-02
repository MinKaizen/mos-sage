<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class('bd-Body') @endphp>
    <main class="m-Main">
      @yield('content')
    </main>
  </body>
</html>
