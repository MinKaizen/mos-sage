@if (has_nav_menu('primary_navigation'))
  {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'hd-HeaderNav', 'container' => false]) !!}
@endif