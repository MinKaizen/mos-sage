@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @if(isset($video)) @include('partials.vimeo', ['video_id'=>$video]) @endif
    @include('partials.ld.prev-link')
    @include('partials.ld.next-link')
    @include('partials.ld.course-nav', ['course_structure' => $course_structure])
    @include('partials.ld.mark-complete')
    @include('partials.ld.resources')
  @endwhile
@endsection
