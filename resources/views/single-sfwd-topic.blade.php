@extends('layouts.ldl-Lesson')

@section('ldm-Main')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.ld.ldvi-VideoIsland')
    @include('partials.msb-MosSidebar')
    @include('partials.ld.ldci-ContentIslands')
    @include('partials.asb-AffSidebar')
  @endwhile
@endsection
