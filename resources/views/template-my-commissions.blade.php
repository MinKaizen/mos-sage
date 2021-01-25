{{--
  Template Name: My Commissions
--}}

@extends('layouts.main')

@section('content')
  <h1>Total Commissions: {{ $total_commissions }}</h1>
  <h1>Total Referrals: {{ $total_referrals }}</h1>
  <h1>Total EPR: {{ $total_epr }}</h1>
  @include('partials.dt-Commissions')
@endsection
