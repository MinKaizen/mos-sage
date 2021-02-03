@extends('layouts.main')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <div class="p-Page">
      <div class="ti-TextIsland c-Content">
        @php the_content() @endphp
      </div>

      {{-- @if(isset($show_sidebar) && $show_sidebar)
        <aside class="pgsb-Sidebar">
          @php dynamic_sidebar($mos_sidebar); @endphp
          @php dynamic_sidebar('affiliate_sidebar'); @endphp
        </aside>
      @endif --}}
    </div>
  @endwhile
@endsection
