<div class='vid-Video @if(isset($has_afflink) && $has_afflink)vid-Video-has-afflink @endif'>
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
