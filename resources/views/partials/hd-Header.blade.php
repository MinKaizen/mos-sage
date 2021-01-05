<header class="hd-Header">
  @include('partials.hd-HeaderLogo')
  @if (has_nav_menu('primary_navigation'))
    {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav-primary', 'container' => false]) !!}
  @endif
</header>
