<div class="ldci-ContentIslands">
  @if(get_the_content())
    {{-- The content, but wrapped in a ti-TextIsland --}}
  @endif
  {{-- If resources, print resources --}}
  @include('partials.ld.resources')
</div>
