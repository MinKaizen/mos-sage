{{--
  Template Name: My Referrals
--}}

@extends('layouts.main')

@section('content')
  <div class="rm-ReportMain rm-ReportMain-referrals">
    <div class="rm-ReportMain_Container rm-ReportMain_Container-referrals">
      <h3 class="rm-ReportMain_Title">My Referrals</h3>
      @include('partials.dt-Referrals', ['referrals' => $referrals])
    </div>
  </div>
@endsection
