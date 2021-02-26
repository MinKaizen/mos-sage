<div style="
  display: grid;
  align-items: start;
  @if(!empty($justify_content))justify-content: {{ $justify_content }};@endif
  @if(!empty($grid_template_columns))grid-template-columns: {{ $grid_template_columns }};@endif
  @if(!empty($grid_template_rows))grid-template-rows: {{ $grid_template_rows }};@endif
  @if(!empty($gap))gap: {{ $gap }};@endif
  @if(!empty($padding))padding: {{ $padding }};@endif
">
  <InnerBlocks />
</div>
