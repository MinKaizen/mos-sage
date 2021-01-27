<div class="ai-AffIds">
  @foreach($user_mis as $mis)
    @include('partials.ai-MIS', [
      'name' => $mis['name'],
      'value' => $mis['value'],
      'course_link' => $mis['course_link'],
    ])
  @endforeach
</div>
