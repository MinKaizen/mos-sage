<table class='dt-Table dt-Table-referrals js-MosTable'>
  <thead class="dt-Head dt-Head-referrals">
    <tr class="dt-Row dt-HeaderRow dt-Row-referrals dt-HeaderRow-referrals">
      <th class="dt-Cell dt-HeaderCell dt-Cell-referrals dt-HeaderCell-referrals dt-Col-referrals-date">Date</th>
      <th class="dt-Cell dt-HeaderCell dt-Cell-referrals dt-HeaderCell-referrals dt-Col-referrals-username">Username</th>
      <th class="dt-Cell dt-HeaderCell dt-Cell-referrals dt-HeaderCell-referrals dt-Col-referrals-name">Name</th>
      <th class="dt-Cell dt-HeaderCell dt-Cell-referrals dt-HeaderCell-referrals dt-Col-referrals-email">Email</th>
      <th class="dt-Cell dt-HeaderCell dt-Cell-referrals dt-HeaderCell-referrals dt-Col-referrals-level">Level</th>
      <th class="dt-Cell dt-HeaderCell dt-Cell-referrals dt-HeaderCell-referrals dt-Col-referrals-progress">Progress</th>
      <th class="dt-Cell dt-HeaderCell dt-Cell-referrals dt-HeaderCell-referrals dt-Col-referrals-campaign">Campaign</th>
    </tr>
  </thead>
  <tbody class="dt-Body dt-Body-referrals">
    @foreach($referrals as $referral)
      <tr class="dt-Row dt-Row-referrals">
        <td class="dt-Cell dt-Cell-referrals dt-Col-referrals-date">{{ $referral['date'] }}</td>
        <td class="dt-Cell dt-Cell-referrals dt-Col-referrals-username">{{ $referral['username'] }}</td>
        <td class="dt-Cell dt-Cell-referrals dt-Col-referrals-name">{{ $referral['name'] }}</td>
        <td class="dt-Cell dt-Cell-referrals dt-Col-referrals-email">{{ $referral['email'] }}</td>
        <td class="dt-Cell dt-Cell-referrals dt-Col-referrals-level">{{ $referral['level'] }}</td>
        <td class="dt-Cell dt-Cell-referrals dt-Col-referrals-progress">{{ $referral['progress'] }}</td>
        <td class="dt-Cell dt-Cell-referrals dt-Col-referrals-campaign">{{ $referral['campaign'] }}</td>
      </tr>
    @endforeach
  </tbody>
  <tfoot class="dt-Footer dt-Footer-referrals">
    <tr class="dt-Row dt-FooterRow dt-Row-referrals dt-FooterRow-referrals">
      <td class="dt-Cell dt-FooterCell dt-Cell-referrals dt-FooterCell-referrals dt-Col-referrals-date">Date</td>
      <td class="dt-Cell dt-FooterCell dt-Cell-referrals dt-FooterCell-referrals dt-Col-referrals-username">Username</td>
      <td class="dt-Cell dt-FooterCell dt-Cell-referrals dt-FooterCell-referrals dt-Col-referrals-name">Name</td>
      <td class="dt-Cell dt-FooterCell dt-Cell-referrals dt-FooterCell-referrals dt-Col-referrals-email">Email</td>
      <td class="dt-Cell dt-FooterCell dt-Cell-referrals dt-FooterCell-referrals dt-Col-referrals-level">Level</td>
      <td class="dt-Cell dt-FooterCell dt-Cell-referrals dt-FooterCell-referrals dt-Col-referrals-progress">Progress</td>
      <td class="dt-Cell dt-FooterCell dt-Cell-referrals dt-FooterCell-referrals dt-Col-referrals-campaign">Campaign</td>
    </tr>
  </tfoot>
</table>
