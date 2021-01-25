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
    @foreach( $commissions as $commission )
    <tr class="table-body__row">
      <td class="table-cell table-body-cell col-date">{{ $commission['date'] }}</td>
      <td class="table-cell table-body-cell col-amount @if((int) $commission['amount'] < 0 ) col-amount--negative @endif ">{{ App\format_currency( (float) $commission['amount'], 0 ) }}</td>
      <td class="table-cell table-body-cell col-name">{{ ucwords( strtolower( $commission['display_name'] ) ) }}</td>
      <td class="table-cell table-body-cell col-email">{{ strtolower( $commission['user_email'] ) }}</td>
      <td class="table-cell table-body-cell col-product">{{ $commission['description'] }}</td>
      <td class="table-cell table-body-cell col-campaign">{{ strtolower( $commission['campaign'] ) }}</td>
      <td class="table-cell table-body-cell col-payment">
        {{ $commission['payout_method'] }}
        <span class="tooltip" style="display: none;" >
          <p>Date: {{ $commission['payout_date'] }}</p>
          <p>Method: {{ $commission['payout_method'] }}</p>
          <p>Address: {{ $commission['payout_address'] }}</p>
          <p>Transaction ID: {{ $commission['payout_transaction_id'] }}</p>
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
