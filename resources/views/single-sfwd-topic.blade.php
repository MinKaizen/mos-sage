@extends('layouts.ldl-Lesson')

@section('ldm-Main')
  @while(have_posts()) @php the_post() @endphp
    @if(isset($freeform) && $freeform)
      <div class="ldm-Freeform c-Content">
        @php the_content() @endphp
        @if(comments_open())
          @include('partials.ld.ldc-Comments')
        @endif
      </div>
      @include('partials.msb-MosSidebar')
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
