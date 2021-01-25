<table class="js-MosTable">
  <thead class="table-header">
    <tr class="table-header__row">
      <th class="table-cell table-header-cell col-date">Date</th>
      <th class="table-cell table-header-cell col-amount">Amount</th>
      <th class="table-cell table-header-cell col-name">Name</th>
      <th class="table-cell table-header-cell col-email">Email</th>
      <th class="table-cell table-header-cell col-product">Product</th>
      <th class="table-cell table-header-cell col-campaign">Campaign</th>
      <th class="table-cell table-header-cell col-payment">Payment</th>
    </tr>
  </thead>
  <tbody class="table-body">
    @foreach( $rows as $row )
    <tr class="table-body__row">
      <td class="table-cell table-body-cell col-date">{{ $row['date'] }}</td>
      <td class="table-cell table-body-cell col-amount @if((int) $row['amount'] < 0 ) col-amount--negative @endif ">{{ format_currency( (float) $row['amount'], 0 ) }}</td>
      <td class="table-cell table-body-cell col-name">{{ ucwords( strtolower( $row['display_name'] ) ) }}</td>
      <td class="table-cell table-body-cell col-email">{{ strtolower( $row['user_email'] ) }}</td>
      <td class="table-cell table-body-cell col-product">{{ $row['description'] }}</td>
      <td class="table-cell table-body-cell col-campaign">{{ strtolower( $row['campaign'] ) }}</td>
      <td class="table-cell table-body-cell col-payment">
        {{ $row['payout_method'] }}
        <span class="tooltip" style="display: none;" >
          <p>Date: {{ $row['payout_date'] }}</p>
          <p>Method: {{ $row['payout_method'] }}</p>
          <p>Address: {{ $row['payout_address'] }}</p>
          <p>Transaction ID: {{ $row['payout_transaction_id'] }}</p>
        </span>
      </td>
    </tr>
    @endforeach
  </tbody>
  <tfoot class="table-footer">
    <tr class="table-footer__row">
      <th class="table-cell table-footer-cell col-date">Date</th>
      <th class="table-cell table-footer-cell col-amount">Amount</th>
      <th class="table-cell table-footer-cell col-name">Name</th>
      <th class="table-cell table-footer-cell col-email">Email</th>
      <th class="table-cell table-footer-cell col-product">Product</th>
      <th class="table-cell table-footer-cell col-campaign">Campaign</th>
      <th class="table-cell table-footer-cell col-payment">Payment</th>
    </tr>
  </tfoot>
</table>
