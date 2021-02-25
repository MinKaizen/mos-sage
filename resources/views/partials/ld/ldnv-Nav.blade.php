<div class="ldnv-Nav">
@foreach($course_structure as $module)
  @if(!empty($side_nav_style) && $side_nav_style == 'challenge')
    <ol class="ldnv-Days">
      @foreach($module->lessons as $lesson)
        @include('partials.ld.ldnv-Day', [
          'day_num' => $loop->index,
          'title' => $lesson->post_title,
          'is_complete' => $lesson->is_complete,
          'is_current' => $lesson->ID == $lesson_id,
          'link' => $lesson->link,
        ])
      @endforeach
    </ol>
  @else
    @include('partials.ld.ldnv-Module', [
      'id' => $module->ID,
      'module_num' => $loop->iteration,
      'title' => $module->post_title,
      'lessons' => $module->lessons,
      'is_complete' => $module->is_complete,
      'is_current' => $module_id == $module->ID,
    ])
  @endif
@endforeach
</div>
