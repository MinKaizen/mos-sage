@if($module_indicator == 'partner')
  <span class="ldnv-Module_Indicator ldnv-Module_Indicator-partner"></span>
@else
  @if($complete)
    <span class="ldnv-Module_Indicator ldnv-Module_Indicator-complete"></span>
  @else
    <span class="ldnv-Module_Indicator ldnv-Module_Indicator-incomplete"></span>
  @endif
@endif
