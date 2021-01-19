@php do_action('get_footer') @endphp
<footer class="ft-Footer">
  @if (has_nav_menu('footer'))
    {!! wp_nav_menu(['theme_location' => 'footer', 'menu_class' => 'ft-Menu', 'container' => false, 'walker' => $footer_menu_walker]) !!}
  @endif
  <span class="ft-Copyright">Copyright ©{{ date('Y') }} My Online Startup</span>
</footer>
@php wp_footer() @endphp
