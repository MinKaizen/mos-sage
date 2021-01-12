@extends('layouts.ldl-Lesson')

@section('ldm-Main')
  @while(have_posts()) @php the_post() @endphp
    @if(isset($video)) @include('partials.vimeo', ['video_id'=>$video]) @endif
    @include('partials.ld.prev-link')
    @include('partials.ld.next-link')
    @include('partials.ld.mark-complete')
    @include('partials.ld.resources')
  @endwhile
@endsection
