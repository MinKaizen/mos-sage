<div class="ldfaq-FAQ">
  <h2 class="ldfaq-FAQ_Title @if(isset($island_color))ldfaq-FAQ_Title-{{ $island_color }}@endif">Frequently Asked Questions:</h2>
  <div class="ldfaq-FAQ_List">
    @foreach($faq as $item)
      <details class="ldfaq-FAQ_Item">
        <summary class="ldfaq-FAQ_Question">
          {{ $item->question }}
          <img class="ldfaq-FAQ_Question_Plus" src="@asset('images/icon-plus-hollow.svg')">
          <img class="ldfaq-FAQ_Question_Minus" src="@asset('images/icon-minus-hollow.svg')">
        </summary>
        <div class="ldfaq-FAQ_Answer">
          {!! $item->answer !!}
        </div>
      </details>
    @endforeach
  </div>
</div>
