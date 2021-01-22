<div class='vid-Video @if(isset($show_afflink) && $show_afflink)vid-Video-has-afflink @endif'>
  <iframe
    class='vid-Video_Frame'
    src='{{ $url }}'
    @if(isset($options))
      @foreach($options as $option => $value)
        {{ $option }}@if($value!==true)='{{ (string) $value }}' @endif
      @endforeach
    @endif>
  </iframe>
</div>
