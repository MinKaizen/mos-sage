<div class="ldnv-Module">

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
      'lesson_is_complete' => App\Controllers\SingleSfwdTopic::is_complete($lesson->ID),
    ])
  @endforeach
  </ol>
</div>
