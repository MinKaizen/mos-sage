{{--
  Template Name: My Earnings
--}}

@extends('layouts.main')

@section('content')
  <div class="rm-ReportMain rm-ReportMain-earnings">
    @include('partials.te-TotalEarnings')
    <div class="rm-ReportMain_Container rm-ReportMain_Container-earnings">
      @include('partials.dt-Earnings')
    </div>
  </div>
@endsection
