<div class="pgc-Content">
  <div class="pgm-Main">
    @php the_content() @endphp
  </div>
  @if(isset($show_sidebar) && $show_sidebar)
    <aside class="pgsb-Sidebar">
      @php dynamic_sidebar($mos_sidebar); @endphp
      @php dynamic_sidebar('affiliate_sidebar'); @endphp
    </aside>
  @endif
</div>
