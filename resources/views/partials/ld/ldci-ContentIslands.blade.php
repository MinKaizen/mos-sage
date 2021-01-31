<div class="ldci-ContentIslands">

  {{-- Action Plan --}}
  @if(isset($action_plan) && $action_plan || $append_complete)
    @include('partials.ld.ldap-ActionPlan')
  @endif

  {{-- Text Island --}}
  @if(isset($text_island) && isset($text_island->title) && isset($text_island->content))
    @include('partials.ld.ldap-TextIsland', [
      'title' => $text_island->title,
      'content' => $text_island->content,
    ])
  @endif

  {{-- FAQ --}}
  @if(isset($faq) && $faq)
    @include('partials.ld.ldfaq-FAQ')
  @endif

  {{-- Comments --}}
  @include('partials.ld.ldc-Comments')

</div>
