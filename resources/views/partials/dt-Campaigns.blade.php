<table class='js-MosTable'>
  <thead>
    <tr>
      <th>Name</th>
      <th>Clicks</th>
      <th>Partners</th>
      <th>Commissions</th>
      <th>EPC</th>
    </tr>
  </thead>
  <tbody>
    @foreach($campaigns as $campaign)
    <tr>
      <td>{{ $campaign['name'] }}</td>
      <td>{{ $campaign['clicks'] }}</td>
      <td>{{ $campaign['partners'] }}</td>
      <td>{{ $campaign['commissions_formatted'] }}</td>
      <td>{{ $campaign['epc_formatted'] }}</td>
    </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <td>Name</td>
      <td>Clicks</td>
      <td>Partners</td>
      <td>Commissions</td>
      <td>EPC</td>
    </tr>
  </tfoot>
</table>
