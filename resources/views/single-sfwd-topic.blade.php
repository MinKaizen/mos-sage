@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.vimeo', ['video_id'=>$video])
    @include('partials.ld.course-nav')
  @endwhile
@endsection
