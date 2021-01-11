<div class="ldnv-Module">

  <h1 class="ldnv-Module_Title">
    <span class="ldnv-Module_Number">{{ $module_num }}</span>
    {{ $title }}
  </h1>

  <ol class="ldnv-Module_LessonList">
  @foreach($lessons as $lesson)
    <li class="ldnv-Lesson">
      <a
        href="{{ $lesson->link }}"
        class="ldnv-Lesson_Link @if($lesson_id==$lesson->ID){{ 'lesson-item--current' }}@endif">
        <span class="ldnv-Lesson_Number">{{ "$module_num-$loop->iteration" }}</span>
        {{ $lesson->post_title }}
        @if(App\Controllers\SingleSfwdTopic::is_complete( $lesson->ID ))
          <span style="color: green;">✓</span>
        @endif
      </a>
    </li>
  @endforeach
  </ol>
</div>
