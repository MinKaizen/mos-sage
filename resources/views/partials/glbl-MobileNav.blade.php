<div class="glbl-MobileNav">


  {{-- Drawer --}}
  <div class="glbl-MobileNav_Drawer">

    <div class="glbl-MobileNav_Drawer_Top">
      <a href="{{ home_url('/') }}"><img src="@asset('images/logo-icon-40x36.png')" alt="My Online Startup"></a>
      <span class="glbl-MobileNav_Close js-ClassToggler"
            data-target-selector=".glbl-MobileNav"
            data-toggle-class="is-Active">
        <div class="glbl-MobileNav_Close_Line1"></div>
        <div class="glbl-MobileNav_Close_Line2"></div>
      </span>
    </div>

    @if (has_nav_menu($menu_slug))
      {!! wp_nav_menu(['theme_location' => $menu_slug, 'menu_class' => 'glbl-MobileNav_Menu', 'container' => false]) !!}
    @endif

  </div>


  {{-- Overlay --}}
  <div class="glbl-MobileNav_Overlay js-ClassToggler"
       data-target-selector=".glbl-MobileNav"
       data-toggle-class="is-Active">
  </div>


</div>