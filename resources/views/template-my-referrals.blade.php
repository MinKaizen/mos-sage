{{--
  Template Name: My Referrals
--}}

@extends('layouts.main')

@section('content')
  @php
    foreach ( range(0,100) as $num ) {
      $referrals[] = [
        'date' => 'undefined',
        'username' => 'undefined',
        'name' => 'undefined',
        'email' => 'undefined',
        'level' => 'undefined',
        'progress' => 'undefined',
        'campaign' => 'undefined',
      ];
    }
  @endphp
  <h2>My Referrals</h2>
  <div class="dt-ReferralsContainer">
    @include('partials.dt-Referrals', ['referrals' => $referrals])
  </div>
@endsection
