@if($module_indicator == 'partner')
  <img class="ldnv-Module_Indicator ldnv-Module_Indicator-partner" src="@asset('images/icon-partner-module-hollow.png')">
@else
  @if($complete)
    <img class="ldnv-Module_Indicator ldnv-Module_Indicator-complete" src="@asset('images/icon-lesson-complete-hollow.png')" alt="(Complete)">
  @else
    <img class="ldnv-Module_Indicator ldnv-Module_Indicator-incomplete" src="@asset('images/icon-lesson-incomplete-hollow.png')" alt="(Incomplete)">
  @endif
@endif
