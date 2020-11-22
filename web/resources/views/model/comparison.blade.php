<h2 class="section-title">Comparison</h2>
<p class="section-lead">
  comparison with other algorithm
</p>
<div class="card">
  <table class="table">
    <thead>
      <th>Score</th>
      @foreach($comparison as $name)
      <th>{{ $name->name }}</th>
      @endforeach
    </thead>
    <tbody>
      <tr>
        <th>Mean</th>
        @foreach($comparison as $mean)
        <td>{{ $mean->mean }}</td>
        @endforeach
      </tr>
      <tr>
        <th>Accuracy</th>
        @foreach($comparison as $acc)
        <td>{{ $acc->acc }}</td>
        @endforeach
      </tr>
    </tbody>
  </table>
</div>
