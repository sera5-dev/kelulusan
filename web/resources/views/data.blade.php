@extends('layouts.wrapper')
@section('data', 'active')
@section('page', 'Data')

@section('body')
<div class="row">
  <div class="col-12 col-md-12 col-lg-12">
    <h2 class="section-title">Info Data</h2>
    <p class="section-lead">
    </p>
    <div class="row">
      @include('data.badges')
    </div>
  </div>
  <div class="col-12 col-md-12 col-lg-12">
    <h2 class="section-title">Persentase Data</h2>
    <p class="section-lead">
      Persentase kelulusan pada tiap feature
    </p>
    <div class="row">
      @include('data.persentase')
    </div>
  </div>
  <div class="col-12 col-md-12 col-lg-12">
    <h2 class="section-title">Rata Rata</h2>
    <p class="section-lead">
      Rata-rata kelulusan dari tiap nilai feature
    </p>
    <div class="row">
      @include('data.akademik')
    </div>
  </div>
  <div class="col-12 col-md-12 col-lg-12">
    <h2 class="section-title">Valid Predicted Data</h2>
    <p class="section-lead">
      list of datas that have validated
    </p>
    @include('data.predicted')
  </div>
</div>
@endsection
