{{--
  Template Name: My Profile
--}}

@extends('layouts.main')

@section('content')
  <div class="mp-MyProfile">
    <div class="mp-MyProfile_Avatar">@include('partials.mpai-AvatarIsland')</div>
    <div class="mp-MyProfile_Details">@include('partials.mpd-Details')</div>
    <div class="mp-MyProfile_Password">@include('partials.mpp-Password')</div>
  </div>
@endsection
