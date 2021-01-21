<div class="ldci-ContentIslands">

  {{-- Action Plan --}}
  @if(isset($action_plan) && $action_plan)
    @include('partials.ld.ldap-ActionPlan')
  @endif

  {{-- Text Island --}}
  @if(get_the_content())
    @component('components.ti-TextIsland')
      {!! get_the_content() !!}
    @endcomponent
  @endif

  {{-- FAQ --}}
  @if(isset($faq) && $faq)
    @include('partials.ld.ldfaq-FAQ')
  @endif

</div>
