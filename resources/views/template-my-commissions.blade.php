{{--
  Template Name: My Commissions
--}}

@extends('layouts.main')

@section('content')
  <main class="rm-ReportMain">
    @include('partials.te-TotalEarnings')
    <div class="rm-ReportMain_Container">
      @include('partials.dt-Commissions')
    </div>
  </main>
@endsection
