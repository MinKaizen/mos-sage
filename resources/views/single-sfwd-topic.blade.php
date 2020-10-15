@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.vimeo', ['video_id'=>$video])
    @include('partials.ld.course-nav')
    @include('partials.ld.mark-complete')
    @if(App\is_complete()) <h3>This lesson is complete!</h3> @endif
  @endwhile
@endsection
