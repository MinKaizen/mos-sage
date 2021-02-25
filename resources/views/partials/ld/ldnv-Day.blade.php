<li class="ldnv-Day @if($is_current){{ 'ldnv-Day-current' }}@endif @if($is_complete){{ 'ldnv-Day-complete' }}@endif">
  <a class="ldnv-Day_Inner @if($is_current) ldnv-Day_Inner-current @endif" href="{{ $link }}">
    <span class="ldnv-Day_Indicator @if($is_complete){{ 'ldnv-Day_Indicator-complete' }}@endif" width="23" height="23"></span>
    <span href="{{ $link }}" class="ldnv-Day_Title @if($is_current){{ 'ldnv-Day_Title-current' }}@endif">
      @if($day_num > 0)<span class="ldnv-Day_Number">{{ $day_num }}</span>@endif
      {{ $title }}
    </span>
  </a>
</li>
