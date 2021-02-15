<section class="ldap-ActionItem">

  <img class="ldap-ActionItem_Checkbox" src="@asset('images/icon-unticked.png')">

  <h3 class="ldap-ActionItem_Title">{{ $title }}</h3>

  <hr class="ldap-ActionItem_Divider">

  <p class="ldap-ActionItem_Description">{{ $description }}</p>

  <a href="{{ do_shortcode($cta->url) }}"
    class="bt-Button bt-Button-{{ $cta->color }} ldap-ActionItem_CTA ldap-ActionItem_CTA-{{ $cta->color }}"
    @if($cta->new_tab) @new_tab @endif>
    {{ $cta->text }}
  </a>

</section>
