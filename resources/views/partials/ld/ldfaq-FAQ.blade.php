<div class="ldfaq-FAQ ldfaq-FAQ-{{ $island_color }}">
  <h2 class="ldfaq-FAQ_Title">Frequently Asked Questions</h2>
  <div class="ldfaq-FAQ_List">
    @foreach($faq as $item)
      <details class="ldfaq-FAQ_Item">
        <summary class="ldfaq-FAQ_Question">
          {{ $item->question }}
          <img class="ldfaq-FAQ_Question_Plus" src="@asset('images/icon-plus-solid.svg')">
          <img class="ldfaq-FAQ_Question_Minus" src="@asset('images/icon-minus-solid.svg')">
        </summary>
        <div class="ldfaq-FAQ_Answer">
          {!! $item->answer !!}
        </div>
      </details>
    @endforeach
  </div>
</div>
