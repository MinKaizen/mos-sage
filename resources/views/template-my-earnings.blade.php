{{--
  Template Name: My Earnings
--}}

@extends('layouts.main')

@section('content')
  <main class="rm-ReportMain">
    @include('partials.te-TotalEarnings')
    <div class="rm-ReportMain_Container">
      @include('partials.dt-Earnings')
    </div>
  </main>
@endsection
