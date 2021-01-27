{{--
  Template Name: My Affiliate IDs
--}}

@extends('layouts.main')

@section('content')
  <div class="aim-AffIdsMain">
    <div class="aim-AffIdsMain_Container">
      <h2 class="aim-AffIdsMain_Title">My Affiliate IDs</h2>
      <p class="aim-AffIdsMain_Paragraph"><strong>IMPORTANT:</strong> Please double check your IDs below because if a field is blank or incorrect, you will not earn for that affiliate program and we cannot help you. If you need to edit any of the Ds, click on the blue arrow icon which will take you to the original page with instructions. </p>
      @include('partials.ai-AffIds', ['user_mis' => $user_mis])
    </div>
  </div>
@endsection
