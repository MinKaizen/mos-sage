{{--
  Template Name: Wide
--}}

@extends('layouts.main')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <div class="p-Page p-Page-wide">
      <div class="ti-TextIsland c-Content">
        @php the_content() @endphp
      </div>
    </div>
  @endwhile
@endsection
