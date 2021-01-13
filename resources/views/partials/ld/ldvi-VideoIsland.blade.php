<div class="ldvi-VideoIsland">
  @if(isset($video_url))
    @include('partials.vid-Video', ['url' => $video_url])
  @endif
  @include('partials.ld.prev-link')
  @include('partials.ld.next-link')
  @include('partials.ld.mark-complete')
</div>
