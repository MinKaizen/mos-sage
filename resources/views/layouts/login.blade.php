<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class('bd-Body') @endphp style="background: conic-gradient(from 180deg at 50% 50%, #0641BF 0deg, #4AB8FB 116.25deg, #DAF2FE 183.75deg, #4AB8FB 249.37deg, #0641BF 360deg);">
    <div class="lg-Background-shapes" style="background: url(@asset('images/background-geometric.svg'));">
      @yield('content')
    </div>
  </body>
  @include('partials.ft-Footer')
</html>
