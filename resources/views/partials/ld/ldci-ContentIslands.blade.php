<div class="ldci-ContentIslands">

  {{-- Action Plan --}}
  @if(isset($action_plan) && $action_plan || $append_complete)
    @include('partials.ld.ldap-ActionPlan')
  @endif

  {{-- Tools and Resources --}}
  @if(isset($resources) && $resources)
    @include('partials.ld.ldri-ResourceIsland')
  @endif

  {{-- FAQ --}}
  @if(isset($faq) && $faq)
    @include('partials.ld.ldfaq-FAQ')
  @endif

  {{-- Text Island --}}
  @if(isset($text_island) && !empty($text_island->title) && !empty($text_island->content))
    @include('partials.ld.ldap-TextIsland', [
      'title' => $text_island->title,
      'content' => $text_island->content,
    ])
  @endif

  {{-- Comments --}}
  @include('partials.ld.ldc-Comments')

</div>
