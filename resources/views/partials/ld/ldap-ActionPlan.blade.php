<div class="ldap-ActionPlan ldap-ActionPlan-{{ $island_color }}">

  <h2 class="ldap-ActionPlan_Title ldap-ActionPlan_Title-{{ $island_color }}">Your Action Plan:</h2>

  <div class="ldap-ActionPlan_Inner">
    @if(isset($action_plan) && $action_plan)
      @foreach($action_plan as $action_item)
        @include('partials.ld.ldap-ActionItem', [
          'title' => isset($action_item->title) ? $action_item->title : '',
          'description' => isset($action_item->description) ? $action_item->description : '',
          'cta' => isset($action_item->cta) ? $action_item->cta : (object) [
            'color' => 'red',
            'text' => 'Button Text',
            'url' => '/',
          ],
        ])
      @endforeach
    @endif

    @if($append_complete)
      <section class="ldap-ActionItem">
        <img class="ldap-ActionItem_Checkbox" src="@asset('images/icon-unticked.png')">
        @if($is_complete)
          <h3 class="ldap-ActionItem_Title">Next Lesson</h3>
        @else
          <h3 class="ldap-ActionItem_Title">Complete</h3>
        @endif
        <hr class="ldap-ActionItem_Divider">
        @if($is_complete)
          <p class="ldap-ActionItem_Description">You've completed this lesson! Click the button to go to the next lesson.</p>
          <a class="bt-Button bt-Button-blue ldap-ActionItem_CTA ldap-ActionItem_CTA-blue" href="{{ $next_link }}">Next >>></a>
        @else
          <p class="ldap-ActionItem_Description">Mark this lesson as complete!</p>
          @include('partials.ld.ldap-MarkComplete')
        @endif
      </section>
    @endif

    <div class="ldap-Disclaimer">
      <hr class="ldap-Disclaimer_Divider">
      <div class="ldap-Disclaimer_Text">Affiliate Disclaimer - This lesson may contain affiliate links, which means Partners of My Online Startup may receive a small commission, at no cost to you, if you make a purchase through a link.@if($level_slug == 'free') To learn more about our Partner Program, please click on the top tab “Become A Partner” or <a href="@if($mos_is_launched){{ '/monthly-partner' }}@else{{ '/partner' }}@endif" @new_tab>click here.</a> @endif</div>
    </div>
  </div>

</div>
