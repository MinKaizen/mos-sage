<table class='dt-Table dt-Table-campaigns js-MosTable'>
  <thead class="dt-Head dt-Head-campaigns">
    <tr class="dt-Row dt-HeaderRow dt-Row-campaigns dt-HeaderRow-campaigns">
      <th class="dt-Cell dt-HeaderCell dt-Cell-campaigns dt-HeaderCell-campaigns dt-Col-campaigns-name">Name</th>
      <th class="dt-Cell dt-HeaderCell dt-Cell-campaigns dt-HeaderCell-campaigns dt-Col-campaigns-clicks">Clicks</th>
      <th class="dt-Cell dt-HeaderCell dt-Cell-campaigns dt-HeaderCell-campaigns dt-Col-campaigns-partners">Partners</th>
      <th class="dt-Cell dt-HeaderCell dt-Cell-campaigns dt-HeaderCell-campaigns dt-Col-campaigns-commissions">Commissions</th>
      <th class="dt-Cell dt-HeaderCell dt-Cell-campaigns dt-HeaderCell-campaigns dt-Col-campaigns-epc">EPC</th>
    </tr>
  </thead>
  <tbody class="dt-Body dt-Body-campaigns">
    @foreach($campaigns as $campaign)
      <tr class="dt-Row dt-Row-campaigns">
        <td class="dt-Cell dt-Cell-campaigns dt-Col-campaigns-name">{{ $campaign['name'] }}</td>
        <td class="dt-Cell dt-Cell-campaigns dt-Col-campaigns-clicks">{{ $campaign['clicks'] }}</td>
        <td class="dt-Cell dt-Cell-campaigns dt-Col-campaigns-partners">{{ $campaign['partners'] }}</td>
        <td class="dt-Cell dt-Cell-campaigns dt-Col-campaigns-commissions">{{ $campaign['commissions_formatted'] }}</td>
        <td class="dt-Cell dt-Cell-campaigns dt-Col-campaigns-epc">{{ $campaign['epc_formatted'] }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
