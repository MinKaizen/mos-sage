<div class='vid-Video'>
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
