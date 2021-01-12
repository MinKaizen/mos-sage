<div class="ldnv-Module js-ldnv-Module-{{ $id }} @if($is_complete){{ 'ldnv-Module-complete' }}@endif @if($is_current){{ 'ldnv-Module-current' }}@endif">

  <div class="ldnv-Module_Inner">

    <div class="ldnv-Module_Label js-ClassToggler"
         data-toggle-class="ldnv-Module-active"
         data-target-selector=".js-ldnv-Module-{{ $id }}">
      @include('partials.ld.ldnv-Module_Indicator', ['complete' => $is_complete])
      <h1 class="ldnv-Module_Title">
        <span class="ldnv-Module_Number">{{ $module_num }}</span>
        {{ $title }}
      </h1>
    </div>

    <ol class="ldnv-Module_Lessons">
    @foreach($lessons as $lesson)
      @include('partials.ld.ldnv-Lesson', [
        'link' => $lesson->link,
        'is_current' => $lesson_id==$lesson->ID,
        'lesson_num' => "$module_num-$loop->iteration",
        'title' => $lesson->post_title,
        'is_complete' => $lesson->is_complete,
      ])
    @endforeach
    </ol>

  </div>

</div>
