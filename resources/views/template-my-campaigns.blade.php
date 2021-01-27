{{--
  Template Name: My Campaigns
--}}

@extends('layouts.main')

@section('content')
  <div class="rm-ReportMain rm-ReportMain-campaigns">
    <div class="rm-ReportMain_Container rm-ReportMain_Container-campaigns">
      <h3 class="rm-ReportMain_Title">My Campaigns</h3>
      @include('partials.dt-Campaigns')
    </div>
  </div>
@endsection
