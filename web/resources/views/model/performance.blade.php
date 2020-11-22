<?php //dd($performances); 
?>
<h2 class="section-title">Performance</h2>
<p class="section-lead">
  the score of performance model
</p>
<div class="card">
  <div class="table-responsive">
    <table class="table">
      <thead>
        <th>Type</th>
        <th>True Postive</th>
        <th>True Negative</th>
        <th>Accuracy</th>
        <th>Macro Avg</th>
        <th>Weight Avg</th>
      </thead>
      <tbody>
        <tr>
          <td>Precision</td>
          <td>{{ $performances["precision"]["1"]}}</td>
          <td>{{ $performances["precision"]["0"]}}</td>
          <td>{{ $performances["precision"]["accuracy"]}}</td>
          <td>{{ $performances["precision"]["macro avg"]}}</td>
          <td>{{ $performances["precision"]["weighted avg"]}}</td>
        </tr>
        <tr>
          <td>F1-Score</td>
          <td>{{ $performances["f1-score"]["1"]}}</td>
          <td>{{ $performances["f1-score"]["0"]}}</td>
          <td>{{ $performances["f1-score"]["accuracy"]}}</td>
          <td>{{ $performances["f1-score"]["macro avg"]}}</td>
          <td>{{ $performances["f1-score"]["weighted avg"]}}</td>
        </tr>
        <tr>
          <td>Recall</td>
          <td>{{ $performances["recall"]["1"]}}</td>
          <td>{{ $performances["recall"]["0"]}}</td>
          <td>{{ $performances["recall"]["accuracy"]}}</td>
          <td>{{ $performances["recall"]["macro avg"]}}</td>
          <td>{{ $performances["recall"]["weighted avg"]}}</td>
        </tr>
        <tr>
          <td>Support</td>
          <td>{{ $performances["support"]["1"]}}</td>
          <td>{{ $performances["support"]["0"]}}</td>
          <td>{{ $performances["support"]["accuracy"]}}</td>
          <td>{{ $performances["support"]["macro avg"]}}</td>
          <td>{{ $performances["support"]["weighted avg"]}}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
