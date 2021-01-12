<div class="ldnv-Nav">
@foreach($course_structure as $module)
  @include('partials.ld.ldnv-Module', [
    'id' => $module->ID,
    'module_num' => $loop->iteration,
    'title' => $module->post_title,
    'lessons' => $module->lessons,
    'is_complete' => $module->is_complete,
    'is_current' => $module_id == $module->ID,
  ])
@endforeach
</div>
