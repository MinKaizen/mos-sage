@if(isset($list))
  <div class="ac-Accordion">
    @foreach($list as $item)
      <details class="ac-Accordion_Item">
        <summary class="ac-Accordion_Item_Title">
          @if(isset($item['title'])){{ $item['title'] }}@endif
        </summary>
        <div class="ac-Accordion_Item_Content">
          @if(isset($item['content'])){!! $item['content'] !!}@endif
        </div>
      </details>
    @endforeach
  </div>
@else
  <p>Accordion is empty. Click here to add items</p>
@endif
