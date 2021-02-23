{{--
  Template Name: Check Out
--}}

@extends('layouts.checkout')

@section('content')
  <div class="co-Main">
    <div class="co-Main_Container">
      @php the_content() @endphp
      @include('partials.cosn-SecureNotice')
    </div>
  </div>
@endsection
