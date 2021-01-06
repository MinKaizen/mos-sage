<div class="hd-HeaderNavMobile">
  <span class="hd-HeaderNavMobile_Hamburger js-hd-HeaderNavMobile_Hamburger" data-nav-selector=".hd-HeaderNavMobile">
    <div class="hd-HeaderNavMobile_HamburgerLine"></div>
    <div class="hd-HeaderNavMobile_HamburgerLine"></div>
    <div class="hd-HeaderNavMobile_HamburgerLine"></div>
  </span>
  @if (has_nav_menu($menu_slug))
    {!! wp_nav_menu(['theme_location' => $menu_slug, 'menu_class' => 'hd-HeaderNavMobile_Menu', 'container' => false]) !!}
  @endif
</div>