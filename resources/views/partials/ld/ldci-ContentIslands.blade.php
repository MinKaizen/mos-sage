<div class="ldci-ContentIslands">

  {{-- Action Plan --}}
  @if(isset($action_plan) && $action_plan)
    @include('partials.ld.ldap-ActionPlan')
  @endif

  {{-- Text Island --}}
  @if(get_the_content())
    @include('partials.ti-TextIsland', ['content' => get_the_content()])
  @endif

  {{-- FAQ --}}
  @if(isset($faq) && $faq)
    @include('partials.ld.ldfaq-FAQ')
  @endif

  {{-- Comments --}}
  @include('partials.ld.ldc-Comments')

</div>
