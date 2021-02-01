{{--
  Template Name: My Sponsor
--}}

@extends('layouts.main')

@section('content')
  <div class="ms-MySponsor">

    <div class="msai-AvatarIsland">
      <div class="msai-AvatarWrapper">
        {!! get_avatar( $sponsor->ID, 250 ) !!}
      </div>
    </div>

    @include('partials.msi-Info')

  </div>
@endsection
