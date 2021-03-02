{{--
  Template Name: Admin Find User
--}}

@extends('layouts.util')

@section('content')
  @if(!current_user_can('edit_posts'))
    <h1>Sorry you're not an admin!</h1>
  @else
    <style>
      td {
        padding: 5px 10px;
      }
    </style>
    <form action="{{ get_permalink() }}">
      <label for="username">Username:</label>
      <input type="text" name="username">
      <input type="submit" value="search">
    </form>
    @if($search_term && $user_found)
      {!! get_avatar( $user->ID, 100 ) !!}

      <h2>User Info</h2>
      <table>
        @foreach($user_info as $key => $value)
          <tr>
            <td>{{ $key }}</td>
            <td>{{ $value }}</td>
          </tr>
        @endforeach
      </table>

      <h2>Sponsor Info</h2>
      <a href="{{ $sponsor_info['link'] }}">Go to sponsor</a>
      <table>
        @foreach($sponsor_info as $key => $value)
          <tr>
            <td>{{ $key }}</td>
            <td>{{ $value }}</td>
          </tr>
        @endforeach
      </table>

    @elseif($search_term)
      <p>No user found matching <strong><i>{{ $search_term }}</i></strong></p>
    @endif
  @endif
@endsection
