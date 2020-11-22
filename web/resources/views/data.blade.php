@extends('layouts.wrapper')
@section('data', 'active')
@section('page', 'Data')

@section('body')
<div class="row">
  @include('data.badges')
  <div class="col-12 col-md-12 col-lg-12">
    <h2 class="section-title">Valid Predicted Data</h2>
    <p class="section-lead">
      list of datas that have validated
    </p>
    @include('data.predicted')
  </div>
</div>
@endsection
