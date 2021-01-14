{{--
  Template Name: Sidebar Page
--}}

@extends('layouts.main')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.pgc-Content', ['show_sidebar' => true])
  @endwhile
@endsection
