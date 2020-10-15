@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.ld.course-nav', ['lesson_id'=>$lesson_id, 'module_id'=>$module_id])
  @endwhile
@endsection
