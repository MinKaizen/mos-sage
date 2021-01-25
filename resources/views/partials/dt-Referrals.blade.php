<table class='js-MosTable'>
  <thead>
    <tr>
      <th>Date</th>
      <th>Username</th>
      <th>Name</th>
      <th>Email</th>
      <th>Level</th>
      <th>Progress</th>
      <th>Campaign</th>
    </tr>
  </thead>
  <tbody>
    @foreach($referrals as $referral)
      <tr>
        <td>{{ $referral['date'] }}</td>
        <td>{{ $referral['username'] }}</td>
        <td>{{ $referral['name'] }}</td>
        <td>{{ $referral['email'] }}</td>
        <td>{{ $referral['level'] }}</td>
        <td>{{ $referral['progress'] }}</td>
        <td>{{ $referral['campaign'] }}</td>
      </tr>
    @endforeach
  </tbody>
  <tfoot>
  <tr>
      <td>Date</td>
      <td>Username</td>
      <td>Name</td>
      <td>Email</td>
      <td>Level</td>
      <td>Progress</td>
      <td>Campaign</td>
    </tr>
  </tfoot>
</table>
