<table class='dt-Table dt-Table-campaigns js-MosTable'>
  <thead class="dt-Head dt-Head-campaigns">
    <tr class="dt-Row dt-HeaderRow dt-Row-campaigns dt-HeaderRow-campaigns">
      <th class="dt-Cell dt-HeaderCell dt-Cell-campaigns dt-HeaderCell-campaigns dt-Col-campaigns-name">Name</th>
      <th class="dt-Cell dt-HeaderCell dt-Cell-campaigns dt-HeaderCell-campaigns dt-Col-campaigns-clicks">Clicks</th>
      <th class="dt-Cell dt-HeaderCell dt-Cell-campaigns dt-HeaderCell-campaigns dt-Col-campaigns-monthly">Monthly P.</th>
      <th class="dt-Cell dt-HeaderCell dt-Cell-campaigns dt-HeaderCell-campaigns dt-Col-campaigns-yearly">Yearly P.</th>
      @if($show_lifetime)<th class="dt-Cell dt-HeaderCell dt-Cell-campaigns dt-HeaderCell-campaigns dt-Col-campaigns-lifetime">Lifetime P.</th>@endif
      @if($show_coaching)<th class="dt-Cell dt-HeaderCell dt-Cell-campaigns dt-HeaderCell-campaigns dt-Col-campaigns-coaching">Coaching</th>@endif
      <th class="dt-Cell dt-HeaderCell dt-Cell-campaigns dt-HeaderCell-campaigns dt-Col-campaigns-fbt">FBT</th>
      <th class="dt-Cell dt-HeaderCell dt-Cell-campaigns dt-HeaderCell-campaigns dt-Col-campaigns-lgs">LGS</th>
      <th class="dt-Cell dt-HeaderCell dt-Cell-campaigns dt-HeaderCell-campaigns dt-Col-campaigns-abb">ABB</th>
      <th class="dt-Cell dt-HeaderCell dt-Cell-campaigns dt-HeaderCell-campaigns dt-Col-campaigns-commissions">Commissions</th>
      {{-- <th class="dt-Cell dt-HeaderCell dt-Cell-campaigns dt-HeaderCell-campaigns dt-Col-campaigns-epc">EPC</th> --}}
    </tr>
  </thead>
  <tbody class="dt-Body dt-Body-campaigns">
    @foreach($campaigns as $campaign)
      <tr class="dt-Row dt-Row-campaigns">
        <td class="dt-Cell dt-Cell-campaigns dt-Col-campaigns-name">{{ $campaign['name'] }}</td>
        <td class="dt-Cell dt-Cell-campaigns dt-Col-campaigns-clicks">{{ $campaign['clicks'] }}</td>
        <td class="dt-Cell dt-Cell-campaigns dt-Col-campaigns-monthly">{{ $campaign['monthly_partner'] }}</td>
        <td class="dt-Cell dt-Cell-campaigns dt-Col-campaigns-yearly">{{ $campaign['yearly_partner'] }}</td>
        @if($show_lifetime)<td class="dt-Cell dt-Cell-campaigns dt-Col-campaigns-lifetime">{{ $campaign['lifetime_partner'] }}</td>@endif
        @if($show_coaching)<td class="dt-Cell dt-Cell-campaigns dt-Col-campaigns-coaching">{{ $campaign['coaching'] }}</td>@endif
        <td class="dt-Cell dt-Cell-campaigns dt-Col-campaigns-fbt">{{ $campaign['fb_toolkit'] }}</td>
        <td class="dt-Cell dt-Cell-campaigns dt-Col-campaigns-lgs">{{ $campaign['lead_system'] }}</td>
        <td class="dt-Cell dt-Cell-campaigns dt-Col-campaigns-abb">{{ $campaign['authority_bonuses'] }}</td>
        <td class="dt-Cell dt-Cell-campaigns dt-Col-campaigns-commissions">{{ $campaign['commissions_formatted'] }}</td>
        {{-- <td class="dt-Cell dt-Cell-campaigns dt-Col-campaigns-epc">{{ $campaign['epc_formatted'] }}</td> --}}
      </tr>
    @endforeach
  </tbody>
</table>
