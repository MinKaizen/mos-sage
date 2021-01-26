{{--
  Template Name: My Referrals
--}}

@extends('layouts.main')

@section('content')
  <main class="rm-ReportMain">
    <div class="rm-ReportMain_Container">
      <h3 class="rm-ReportMain_Title">My Referrals</h3>
      @include('partials.dt-Referrals', ['referrals' => $referrals])
    </div>
  </main>
@endsection
