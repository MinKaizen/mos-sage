{{--
  Template Name: My Referrals
--}}

@extends('layouts.main')

@section('content')
  <h2>My Referrals</h2>
  <div class="dt-ReferralsContainer">
    @include('partials.dt-Referrals', ['referrals' => $referrals])
  </div>
@endsection
