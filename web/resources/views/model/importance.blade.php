<h2 class="section-title">Importance</h2>
<p class="section-lead">
  importance of feature score
</p>
<div class="card">
  <div class="card-body">
    @foreach($importances as $name => $importance)
    <h6>{{ $name }}</h6>
    <div class="progress mb-3">
      <div class="progress-bar" role="progressbar" data-width="{{$importance}}%" aria-valuenow="{{$importance}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$importance}}%">{{$importance}}%</div>
    </div>
    @endforeach
  </div>
</div>
