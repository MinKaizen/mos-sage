@foreach($course_structure as $module)
  <h1>{{ $module->post_title }}</h1>
  <ul>
    @foreach($module->lessons as $lesson)
      <li>
        <a @if($lesson_id!=$lesson->ID)href="{{ $lesson->link }}" @endif class="lesson-item @if($lesson_id==$lesson->ID)lesson-item--current @endif" >
          {{ $lesson->post_title }}@if(App\Controllers\SingleSfwdTopic::is_complete( $lesson->ID )) <span style="color: green;">✓</span> @endif
        </a>
      </li>
    @endforeach
  </ul>
@endforeach