<div class="ldcp-CourseProgress">
  <div class="ldcp-Track">
    <div class="ldcp-Fill" style="width: {{ $course_progress['percentage_str'] }};"></div>
  </div>
  <span class="ldcp-Fraction"
        style="left: {{ $course_progress['percentage_str'] }}">
    <span class="ldcp-Fraction_Completed">{{ $course_progress['completed'] }}</span>
    <span class="ldcp-Fraction_Divider">/</span>
    <span class="ldcp-Fraction_Total">{{ $course_progress['total'] }}</span>
  </span>
</div>
