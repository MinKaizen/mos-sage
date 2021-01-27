<table class="dt-Table dt-Table-earnings js-MosTable">
  <thead class="dt-Header dt-Header-earnings">
    <tr class="dt-Row dt-HeaderRow dt-Row-earnings dt-HeaderRow-earnings">
      <th class="dt-Cell dt-HeaderCell dt-Cell-earnings dt-HeaderCell-earnings dt-Col-earnings-date">Date</th>
      <th class="dt-Cell dt-HeaderCell dt-Cell-earnings dt-HeaderCell-earnings dt-Col-earnings-amount">Amount</th>
      <th class="dt-Cell dt-HeaderCell dt-Cell-earnings dt-HeaderCell-earnings dt-Col-earnings-name">Name</th>
      <th class="dt-Cell dt-HeaderCell dt-Cell-earnings dt-HeaderCell-earnings dt-Col-earnings-email">Email</th>
      <th class="dt-Cell dt-HeaderCell dt-Cell-earnings dt-HeaderCell-earnings dt-Col-earnings-product">Product</th>
      <th class="dt-Cell dt-HeaderCell dt-Cell-earnings dt-HeaderCell-earnings dt-Col-earnings-campaign">Campaign</th>
      <th class="dt-Cell dt-HeaderCell dt-Cell-earnings dt-HeaderCell-earnings dt-Col-earnings-payment">Payment</th>
    </tr>
  </thead>
  <tbody class="table-body">
    @foreach( $commissions as $commission )
    <tr class="table-body__row">
      <td class="dt-Cell dt-Cell-earnings dt-Col-earnings-date">{{ $commission['date'] }}</td>
      <td class="dt-Cell dt-Cell-earnings dt-Col-earnings-amount @if((int) $commission['amount'] < 0 ) dt-Cell-negative @endif">{{ App\format_currency( (float) $commission['amount'], 0 ) }}</td>
      <td class="dt-Cell dt-Cell-earnings dt-Col-earnings-name">{{ ucwords( strtolower( $commission['display_name'] ) ) }}</td>
      <td class="dt-Cell dt-Cell-earnings dt-Col-earnings-email">{{ strtolower( $commission['user_email'] ) }}</td>
      <td class="dt-Cell dt-Cell-earnings dt-Col-earnings-product">{{ $commission['description'] }}</td>
      <td class="dt-Cell dt-Cell-earnings dt-Col-earnings-campaign">{{ strtolower( $commission['campaign'] ) }}</td>
      <td class="dt-Cell dt-Cell-earnings dt-Col-earnings-payment">
        {{ $commission['payout_method'] }}
        <span class="dt-Tooltip" style="display: none;" >
          <p class="dt-Tooltip_Data">
            <span class="dt-Tooltip_Key">Date:</span>
            <span class="dt-Tooltip_Value">{{ $commission['payout_date'] }}</span>
          </p>
          <p class="dt-Tooltip_Data">
            <span class="dt-Tooltip_Key">Method:</span>
            <span class="dt-Tooltip_Value">{{ $commission['payout_method'] }}</span>
          </p>
          <p class="dt-Tooltip_Data">
            <span class="dt-Tooltip_Key">Address:</span>
            <span class="dt-Tooltip_Value">{{ $commission['payout_address'] }}</span>
          </p>
          <p class="dt-Tooltip_Data">
            <span class="dt-Tooltip_Key">Transaction ID:</span>
            <span class="dt-Tooltip_Value">{{ $commission['payout_transaction_id'] }}</span>
          </p>
        </span>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
