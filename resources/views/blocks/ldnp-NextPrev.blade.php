<div class="ldnp-NextPrev">

  @if(isset($previous_link) && $previous_link)
    <a class="ldnp-Prev" href="{{ $previous_link  }}"><<< Previous</a>
  @endif

  @if(isset($next_link) && $next_link)
    <a class="ldnp-Next" href="{{ $next_link }}">Next >>></a>
  @endif

</div>
