<li class="ldnv-Lesson @if($lesson_is_current){{ 'ldnv-Lesson-current' }}@endif">
  <a href="{{ $link }}" class="ldnv-Lesson_Link">
    <span class="ldnv-Lesson_Number">{{ $lesson_num }}</span>
    {{ $title }}
    @if( $lesson_is_complete )
      <span style="color: green;">✓</span>
    @endif
  </a>
</li>
