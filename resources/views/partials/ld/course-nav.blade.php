{{-- Start: Modules Loop --}}
@while($modules_query->have_posts()) @php $modules_query->the_post() @endphp
<h1>{!! the_title() !!}@if(get_the_ID()==$module_id)*@endif</h1>
<ul>
  {{-- Start: Lessons Loop --}}
  @while($lessons_query->have_posts()) @php $lessons_query->the_post() @endphp
    <a href="{!! the_permalink() !!}"><li>{!! the_title() !!}@if(get_the_ID()==$lesson_id)*@endif</li></a>
  @endwhile
  @php wp_reset_postdata() @endphp
  {{-- End: Lessons Loop --}}
</ul>
@endwhile
@php wp_reset_postdata() @endphp
{{-- End: Modules Loop --}}