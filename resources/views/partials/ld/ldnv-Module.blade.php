<div class="ldnv-Module @if($is_complete){{ 'ldnv-Module-complete' }}@endif">

  <h1 class="ldnv-Module_Title">
    <span class="ldnv-Module_Number">{{ $module_num }}</span>
    {{ $title }}
  </h1>

  <ol class="ldnv-Module_LessonList">
  @foreach($lessons as $lesson)
    @include('partials.ld.ldnv-Lesson', [
      'link' => $lesson->link,
      'lesson_is_current' => $lesson_id==$lesson->ID,
      'lesson_num' => "$module_num-$loop->iteration",
      'title' => $lesson->post_title,
      'is_complete' => $lesson->is_complete,
    ])
  @endforeach
  </ol>
</div>
