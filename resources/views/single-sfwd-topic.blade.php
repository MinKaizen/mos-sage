@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @if(isset($video)) @include('partials.vimeo', ['video_id'=>$video]) @endif
    @include('partials.ld.prev-link')
    @include('partials.ld.next-link')
    @include('partials.ld.mark-complete')
    <div class="ldsb-Sidebar">
      @include('partials.ld.course-progress', ['course_progress' => $course_progress])
      @include('partials.ld.ldnv-Nav', ['course_structure' => $course_structure])
    </div>
    @include('partials.ld.resources')
  @endwhile
@endsection
