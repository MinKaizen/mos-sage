<div class="mn-MobileNav">


  {{-- Drawer --}}
  <div class="mn-MobileNav_Drawer">

    <div class="mn-MobileNav_Drawer_Top">
      <a href="{{ home_url('/') }}"><img src="@asset('images/logo-icon.svg')" alt="My Online Startup"></a>
      <span class="mn-MobileNav_Close js-ClassToggler"
            data-target-selector=".mn-MobileNav"
            data-toggle-class="is-Active">
        <div class="mn-MobileNav_Close_Line1"></div>
        <div class="mn-MobileNav_Close_Line2"></div>
      </span>
    </div>

    @if (has_nav_menu($menu_slug))
      {!! wp_nav_menu([
        'theme_location' => $menu_slug,
        'menu_class' => 'mn-Menu',
        'container' => false,
        'walker' => $mobile_nav_menu_walker,
      ]) !!}
    @endif

  </div>


  {{-- Overlay --}}
  <div class="mn-MobileNav_Overlay js-ClassToggler"
       data-target-selector=".mn-MobileNav"
       data-toggle-class="is-Active">
  </div>


</div>
