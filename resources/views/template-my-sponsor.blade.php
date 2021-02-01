{{--
  Template Name: My Sponsor
--}}

@extends('layouts.main')

@section('content')
  <div class="ms-MySponsor">

    <div class="ms-MySponsor_AvatarIsland">
      <div class="ms-MySponsor_AvatarWrapper">
        {!! get_avatar( $sponsor->ID, 250 ) !!}
      </div>
    </div>

    <div class="ms-MySponsor_DetailsIsland">
      <h3 class="ms-MySponsor_Title">Contact Your Sponsor</h3>
      <div class="ms-MySponsor_Details">
        <span class="ms-MySponsor_Details_Label">First</span>
        <span class="ms-MySponsor_Details_Value">{{ $sponsor->first_name }}</span>
        <span class="ms-MySponsor_Details_Label">Last</span>
        <span class="ms-MySponsor_Details_Value">{{ $sponsor->last_name }}</span>
        <span class="ms-MySponsor_Details_Label">Email</span>
        <span class="ms-MySponsor_Details_Value">{{ $sponsor->user_email }}</span>
        <span class="ms-MySponsor_Details_Label">Facebook</span>
        <span class="ms-MySponsor_Details_Value">{{ $sponsor->user_url}}</span>
      </div>
    </div>

  </div>
@endsection
