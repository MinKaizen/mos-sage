@extends('layouts.main')

@section('content')
  <div class="ldl-Lesson">
    @include('partials.ld.ldsb-Sidebar')
    <div class="main">
      @yield('ld-main')
    </div>
  </div>
@endsection
