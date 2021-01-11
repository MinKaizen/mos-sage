<div class="ldnv-Nav">
@foreach($course_structure as $module)
  @include('partials.ld.ldnv-Module', [
    'module_num' => $loop->iteration,
    'title' => $module->post_title,
    'lessons' => $module->lessons,
    'is_complete' => App\Controllers\SingleSfwdTopic::is_module_complete( $module->ID ),
  ])
@endforeach
</div>
