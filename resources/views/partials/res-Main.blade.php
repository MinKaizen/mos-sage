@php
  global $wp_query;
  $resources = [];
  $no_cat = 'Uncategorized';
  $cat_tax_slug = 'resource_cat';
  $tag_tax_slug = 'resource_tag';

  if ( have_posts() ) {
    while ( have_posts() ) {
      the_post();
      $category = \App\get_category( get_the_ID(), $cat_tax_slug );
      $category = $category ? $category : $no_cat;
      $resources[$category][] = get_post( get_the_ID() );
    }
  }
@endphp

<div class="res-Main">
  @foreach($resources as $category => $resource_list)
    @include('partials.resc-Category', [
      'resources' => $resource_list,
      'category' => $category,
    ])
  @endforeach
</div>
