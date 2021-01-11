<div class="ldnv-Nav">
@foreach($course_structure as $module)
  <div class="ldnv-Module">

    <h1 class="ldnv-Module_Title">
      <span class="ldnv-Module_Number">{{ $loop->iteration }}</span>
      {{ $module->post_title }}
    </h1>

    <ol class="ldnv-Module_LessonList">
    @foreach($module->lessons as $lesson)
      <li class="ldnv-Lesson">
        <a
          href="{{ $lesson->link }}"
          class="ldnv-Lesson_Link @if($lesson_id==$lesson->ID){{ 'lesson-item--current' }}@endif">
          <span class="ldnv-Lesson_Number">{{ "{$loop->parent->iteration}-$loop->iteration" }}</span>
          {{ $lesson->post_title }}
          @if(App\Controllers\SingleSfwdTopic::is_complete( $lesson->ID ))
            <span style="color: green;">✓</span>
          @endif
        </a>
      </li>
    @endforeach
    </ol>
  </div>
@endforeach
</div>
