@extends('layouts.main')

@section('content')
  <div class="ldl-Lesson">
    @include('partials.ld.ldsb-Sidebar')
    <div class="ldm-Main">
      @yield('ldm-Main')
      @include('partials.ld.ldm-Main_SidebarToggle')
    </div>
  </div>
@endsection
