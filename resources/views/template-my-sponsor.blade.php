{{--
  Template Name: My Sponsor
--}}

@extends('layouts.main')

@section('content')
  <div class="ms-MySponsor">

    <div class="msai-AvatarIsland">
      <div class="msai-AvatarWrapper">
        {!! get_avatar( $sponsor->ID, 200 ) !!}
      </div>
    </div>

    <div class="msd-Info">
      <h3 class="msd-Info_Title">Contact Your Sponsor</h3>
      <div class="msd-Info_Details">
        <span class="msd-Info_Details_Label">First</span>
        <span class="msd-Info_Details_Value">{{ $sponsor->first_name }}</span>
        <span class="msd-Info_Details_Label">Last</span>
        <span class="msd-Info_Details_Value">{{ $sponsor->last_name }}</span>
        <span class="msd-Info_Details_Label">Email</span>
        <span class="msd-Info_Details_Value">{{ $sponsor->user_email }}</span>
        <span class="msd-Info_Details_Label">Facebook</span>
        <span class="msd-Info_Details_Value">{{ $sponsor->user_url}}</span>
      </div>
    </div>

  </div>
@endsection
