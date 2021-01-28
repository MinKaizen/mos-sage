{{--
  Template Name: Login
--}}

@extends('layouts.login')

@section('content')
  <main class="lg-Main">
    <img src="@asset('images/logo-icon.svg')" alt="My Online Startup" class="lg-Logo" width="73">
    @shortcode('[gravityform action="login" title="false" description="false" logged_in_message="You are already logged in" registration_link_text="Sign Up Instead" logged_in_avatar="false" logout_redirect="/login" login_redirect="/courses/free-course" forgot_password_text="Reset Password" /]')
  </main>
@endsection
