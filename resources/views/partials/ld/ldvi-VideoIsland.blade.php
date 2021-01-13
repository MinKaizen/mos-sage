<div class="ldvi-VideoIsland">
  @if(isset($video_url))
    @include('partials.vid-Video', ['url' => $video_url])
  @endif
  <div class="ldvi-VideoIsland_Nav">
    @include('partials.ld.prev-link')
    @include('partials.ld.next-link')
  </div>
</div>
