@if (has_nav_menu($menu_slug))
  {!! wp_nav_menu(['theme_location' => $menu_slug, 'menu_class' => 'hd-HeaderNavDesktop', 'container' => false]) !!}
@endif