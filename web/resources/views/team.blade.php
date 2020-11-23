@extends('layouts.wrapper')
@section('team', 'active')
@section('page', 'About')

@section('body')
<div class="row">
  <div class="col-md-4">
    <div class="card">
      <div class="card-header">
        <h4>Team</h4>
      </div>
      <div class="card-body">
        <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
          <li>Ade Intan Komalasari</li>
          <li>Fajrian Fatan Abdillah</li>
          <li>Molly Siti Mauliah Suzazi Permana</li>
          <li>Riqi Sambas Khairurrohman</li>
          <li>Virna Aleyna Derani</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h4>
          Resources
        </h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-6">
            <div class="card card-statistic-1">
              <div class="card-icon bg-dark">
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>service</h4>
                </div>
                <div class="card-body">
                  FastAPI
                </div>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="card card-statistic-1">
              <div class="card-icon bg-danger">
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>client</h4>
                </div>
                <div class="card-body">
                  Laravel
                </div>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="card card-statistic-1">
              <div class="card-icon bg-warning">
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>ml</h4>
                </div>
                <div class="card-body">
                  SKlearn
                </div>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="card card-statistic-1">
              <div class="card-icon bg-info">
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>db</h4>
                </div>
                <div class="card-body">
                  MySQL
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
