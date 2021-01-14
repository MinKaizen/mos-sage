<div class="ldci-ContentIslands">
  @if(get_the_content())
    @component('components.ti-TextIsland')
      {!! get_the_content() !!}
    @endcomponent
  @endif
  {{-- If resources, print resources --}}
  @include('partials.ld.resources')
</div>
