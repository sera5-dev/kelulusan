<div class="col-lg-3 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1">
    <div class="card-icon bg-primary">
      <i class="fas fa-project-diagram"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4>Entry</h4>
      </div>
      <div class="card-body">
        {{ $predicted }}
      </div>
    </div>
  </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1">
    <div class="card-icon bg-success">
      <i class="fas fa-check-double"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4>Validated</h4>
      </div>
      <div class="card-body">
        {{ $validated }}
      </div>
    </div>
  </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1">
    <div class="card-icon bg-info">
      <i class="far fa-calendar-check"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4>Tepat</h4>
      </div>
      <div class="card-body">
        {{ $tepat }}
      </div>
    </div>
  </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1">
    <div class="card-icon bg-warning">
      <i class="far fa-calendar-times"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4>Terlambat</h4>
      </div>
      <div class="card-body">
        {{ $terlambat }}
      </div>
    </div>
  </div>
</div>
