<div class="ldvi-VideoIsland">
  @if($show_afflink)
    @include('partials.ldvi-Afflink')
  @endif
  @if(isset($video_url))
    <div class='vid-Video @if(isset($show_afflink) && $show_afflink)vid-Video-has-afflink @endif'>
      <iframe class='vid-Video_Frame' src='{{ $video_url }}'></iframe>
    </div>
  @endif
  {{-- <a href="#">
    <span class="ldvi-DownloadPdf">
      <img class="ldvi-DownloadPdf_Icon" src="@asset('images/icon-pdf-hollow.svg')">
      Download PDF
    </span>
  </a> --}}
</div>
