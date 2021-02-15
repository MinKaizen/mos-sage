<div class="resc-Category ti-TextIsland c-Content">
  <h3 class="resc-Title">{{ $category }}</h3>
  @foreach($resources as $resource)
    <p class="resc-Resource">
      <a href="{{ \App\resource_generate_link( $resource->ID ) }}" @new_tab>{{ $resource->post_title }}:</a> {!! wp_strip_all_tags($resource->post_content) !!}
    </p>
  @endforeach
</div>
