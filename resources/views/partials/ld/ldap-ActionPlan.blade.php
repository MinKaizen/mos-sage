<div class="ldap-ActionPlan ldap-ActionPlan-{{ $island_color }}">

  <h2 class="ldap-ActionPlan_Title">Action Plan</h2>

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
      <h3 class="ldap-ActionItem_Title">Complete</h3>
      <hr class="ldap-ActionItem_Divider">
      <p class="ldap-ActionItem_Description">Once you're done, mark this lesson as complete!</p>
      @include('partials.ld.ldap-MarkComplete')
    </section>
  @endif

</div>
