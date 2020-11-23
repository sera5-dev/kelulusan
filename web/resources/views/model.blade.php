@extends('layouts.wrapper')
@section('model', 'active')
@section('page', 'Model')

@section('body')
<h2 class="section-title">Profile</h2>
<p class="section-lead">
  the information model
</p>
<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="fas fa-project-diagram"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Method</h4>
        </div>
        <div class="card-body">
          Classification
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-warning">
        <i class="far fa-calendar-times"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Algortihm</h4>
        </div>
        <div class="card-body">
          Random Forest
        </div>
      </div>
    </div>
  </div>
</div>
@include('model.comparison')
@include('model.performance')
@include('model.importance')
<h2 class="section-title">Diagram</h2>
<p class="section-lead">
  tree diagram
</p>
<div class="row">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-body">
        <div class="table-resposive">
          <img src="data:image/png;base64, {{ $image->image }}" alt="tree" width="100%" />
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
