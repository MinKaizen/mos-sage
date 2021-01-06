<div class="hd-HeaderNavMobile">
  <span class="hd-HeaderNavMobile_Burger js-hd-HeaderNavMobile_Burger" data-nav-selector=".hd-HeaderNavMobile">
    <div class="hd-HeaderNavMobile_BurgerLine"></div>
    <div class="hd-HeaderNavMobile_BurgerLine"></div>
    <div class="hd-HeaderNavMobile_BurgerLine"></div>
  </span>
  @if (has_nav_menu($menu_slug))
    {!! wp_nav_menu(['theme_location' => $menu_slug, 'menu_class' => 'hd-HeaderNavMobile_Menu', 'container' => false]) !!}
  @endif
</div>