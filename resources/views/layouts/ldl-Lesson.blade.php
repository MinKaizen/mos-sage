@extends('layouts.main')

@section('content')
  <div class="ldl-Lesson">
    @include('partials.ld.ldsb-Sidebar')
    <div class="ldm-Main">
      @include('partials.ld.ldm-SidebarToggle')
      @yield('ldm-Main')
    </div>
  </div>
@endsection
