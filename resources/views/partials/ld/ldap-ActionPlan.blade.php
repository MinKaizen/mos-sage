<div class="ldap-ActionPlan">

  <h2 class="ldap-ActionPlan_Title">Action Plan</h2>

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

</div>
