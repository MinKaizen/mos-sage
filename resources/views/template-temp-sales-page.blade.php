{{--
  Template Name: Temp Sales Page
--}}

@extends('layouts.temp-sales-page')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <div class="tsp-Container">
      @php the_content() @endphp
    </div>
  @endwhile
@endsection
