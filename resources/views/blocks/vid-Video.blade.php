@if(isset($url))
  <div class='vid-Video'>
    <iframe
      class='vid-Video_Frame'
      src='{{ \App\video_embed_url($url) }}'
      frameborder="0"
      allow="autoplay; fullscreen"
      scrolling="no">
    </iframe>
  </div>
@endif

{{-- @php
    $test_urls = [
      'https://www.youtube.com/watch?v=g72n374FTE4&ab_channel=%E5%A4%A9%E7%A5%9E%E5%AD%90%E5%85%8E%E9%9F%B3TenjinKotone' => 'https://www.youtube.com/embed/g72n374FTE4',
      'https://www.youtube.com/embed/g72n374FTE4' => 'https://www.youtube.com/embed/g72n374FTE4',
      'https://youtu.be/g72n374FTE4' => 'https://www.youtube.com/embed/g72n374FTE4',
      'https://wave.video/video/5ff691a746e0fb00013cc338/embed' => 'https://embed.wave.video/5ff691a746e0fb00013cc338',
      'https://embed.wave.video/5ff691a746e0fb00013cc338' => 'https://embed.wave.video/5ff691a746e0fb00013cc338',
      'https://wave.video/video/5ff691a746e0fb00013cc338/preview' => 'https://embed.wave.video/5ff691a746e0fb00013cc338',
      'https://watch.wave.video/5ff691a746e0fb00013cc338' => 'https://embed.wave.video/5ff691a746e0fb00013cc338',
      'https://vimeo.com/manage/427225775/embed/web' => 'https://player.vimeo.com/video/427225775',
      'https://vimeo.com/manage/427225775/general' => 'https://player.vimeo.com/video/427225775',
      'https://vimeo.com/427225775' => 'https://player.vimeo.com/video/427225775',
      'https://player.vimeo.com/video/427225775' => 'https://player.vimeo.com/video/427225775',
    ];
  @endphp
  @foreach($test_urls as $url => $embed_url)
    <p>
      URL: {{ $url }}<br>
      Test: {{ $embed_url==\App\video_embed_url($url) ? 'PASSED' : 'FAILED' }}
    </p>
  @endforeach --}}
