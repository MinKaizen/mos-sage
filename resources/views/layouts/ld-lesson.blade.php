@extends('layouts.main')

@section('content')
  @include('partials.ld.ldsb-Sidebar')
  <div class="main">
    @yield('ld-main')
  </div>
@endsection
