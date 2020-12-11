@foreach($course_structure as $module)
  <h1>{{ $module->post_title }}</h1>
  <ul>
    @foreach($module->lessons as $lesson)
      <li><a href="{{ $lesson->link }}" @if($lesson_id==$lesson->ID)style="color:red; font-weight:bold;"@endif>{{ $lesson->post_title }}</a></li>
    @endforeach
  </ul>
@endforeach