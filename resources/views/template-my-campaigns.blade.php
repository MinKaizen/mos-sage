{{--
  Template Name: My Campaigns
--}}

@extends('layouts.main')

@section('content')
  <main class="rm-ReportMain">
    <div class="rm-ReportMain_Container">
      <h3 class="rm-ReportMain_Title">My Campaigns</h3>
      @include('partials.dt-Campaigns')
    </div>
  </main>
@endsection
