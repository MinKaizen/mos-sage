{{--
  Template Name: Blank
--}}

@extends('layouts.main')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <div class="p-Page">
      @php the_content() @endphp
    </div>
  @endwhile
@endsection
