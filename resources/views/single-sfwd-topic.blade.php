@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @if($video) @include('partials.vimeo', ['video_id'=>$video]) @endif
    @include('partials.ld.course-nav')
    @include('partials.ld.mark-complete')
    @if(App\Learndash\is_complete()) <h3>This lesson is complete!</h3> @endif
    @include('partials.ld.resources')
  @endwhile
@endsection