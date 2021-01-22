<div class="ldvi-VideoIsland">
  @if($show_afflink)
    @include('partials.ldvi-Afflink')
  @endif
  @if(isset($video_url))
    @include('partials.vid-Video', ['url' => $video_url, 'has_afflink' => true])
  @endif
  {{-- <a href="#">
    <span class="ldvi-DownloadPdf">
      <img class="ldvi-DownloadPdf_Icon" src="@asset('images/icon-pdf-hollow.svg')">
      Download PDF
    </span>
  </a> --}}
</div>
