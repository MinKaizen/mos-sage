@extends('layouts.ldl-Lesson')

@section('ldm-Main')
  @while(have_posts()) @php the_post() @endphp
    @if(isset($freeform) && $freeform)
      @php the_content() @endphp
    @else
      @if(isset($video_url) && $video_url)
        @include('partials.ld.ldvi-VideoIsland')
      @endif
      @include('partials.msb-MosSidebar')
      @include('partials.ld.ldci-ContentIslands')
      @include('partials.asb-AffSidebar')
    @endif
  @endwhile
@endsection
