<a
  href="{{ $link }}"
  class="bt-Button @if(isset($color))bt-Button-{{ $color }}@endif"
  @if($new_tab) @new_tab @endif>
  {{ $text }}
</a>
