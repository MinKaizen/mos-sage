@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <h1>This is the single lesson template</h1>
    <h2>This is a mark complete button:</h2>
    {!! $mark_complete !!}
  @endwhile
@endsection
