@extends('layouts.wrapper')
@section('prediction', 'active')
@section('page', 'Prediction')

@section('body')
<div class="row">
  <div class="col-12 col-md-12 col-lg-12">
    <h2 class="section-title">Create new prediction</h2>
    <p class="section-lead">
      please fill the form to create new prediction
    </p>
    @include('prediction.form')
  </div>
  <div class="col-12 col-md-12 col-lg-12">
    <h2 class="section-title">Validate Prediction Result</h2>
    <p class="section-lead">
      list of datas that haven't been validated
    </p>
    @include('prediction.unvalidated')
  </div>
</div>
@endsection
