<li class="ldnv-Lesson @if($is_current){{ 'ldnv-Lesson-current' }}@endif @if($is_complete){{ 'ldnv-Lesson-complete' }}@endif">
  <a href="{{ $link }}" class="ldnv-Lesson_Link">
    <span class="ldnv-Lesson_Number">{{ $lesson_num }}</span>
    {{ $title }}
  </a>
</li>
