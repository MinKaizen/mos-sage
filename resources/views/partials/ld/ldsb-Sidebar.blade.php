<aside class="ldsb-Sidebar">
  @if($show_progress)
    @include('partials.ld.ldcp-CourseProgress', ['course_progress' => $course_progress])
  @endif
  @include('partials.ld.ldnv-Nav', ['course_structure' => $course_structure])
</aside>
