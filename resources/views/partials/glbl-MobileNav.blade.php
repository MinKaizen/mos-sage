<div class="glbl-MobileNav">


  {{-- Drawer --}}
  <div class="glbl-MobileNav_Drawer">

    <span class="glbl-MobileNav_Close js-ClassToggler"
          data-target-selector=".glbl-MobileNav"
          data-toggle-class="is-Active">
      <div class="glbl-MobileNav_Close_Line"></div>
      <div class="glbl-MobileNav_Close_Line"></div>
    </span>

    <img src="@asset('images/logo-type-light.png')" alt="My Online Startup">

    @if (has_nav_menu($menu_slug))
      {!! wp_nav_menu(['theme_location' => $menu_slug, 'menu_class' => 'glbl-MobileNav_Menu', 'container' => false]) !!}
    @endif

    <span class="glbl-MobileNav_Close js-ClassToggler"
          data-target-selector=".glbl-MobileNav"
          data-toggle-class="is-Active">
      <div class="glbl-MobileNav_Close_Line"></div>
      <div class="glbl-MobileNav_Close_Line"></div>
    </span>

  </div>


  {{-- Overlay --}}
  <div class="glbl-MobileNav_Overlay js-ClassToggler"
       data-target-selector=".glbl-MobileNav"
       data-toggle-class="is-Active">
  </div>


</div>