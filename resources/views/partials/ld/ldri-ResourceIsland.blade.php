<div class="ldri-ResourceIsland">
  <h2 class="ldri-Title @if(isset($island_color))ldri-Title-{{ $island_color }}@endif">Tools & Resources:</h2>
  <div class="ldri-Resources">
    @foreach($resources as $resource)
      <a href="{{ do_shortcode( $resource->link ) }}" class="ldri-ResourceName c-Link">{{ $resource->name }}</a>
      <span class="ldri-ResourceDescription">{!! $resource->description !!}</span>
      @if(!$loop->last)<hr class="ldri-Divider">@endif
    @endforeach
  </div>
</div>
