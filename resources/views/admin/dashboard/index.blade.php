@can('delete_products')
@extends('admin.layout')

@section('content')

<h3>Page Dashboard</h3>
<!-- <div class="row">
							<div class="col-xl-8 col-md-12"> -->
                      <!-- Sales Graph -->
                      <div class="card card-default" data-scroll-height="675">
                        <div class="card-header">
                          <h2>Sales Of The Year</h2>
                        </div>
                        <div class="card-body">
                          <canvas id="linechart" class="chartjs"></canvas>
                        </div>
                        <div class="card-footer d-flex flex-wrap bg-white p-0">
                          <div class="col-6 px-0">
                            <div class="text-center p-4">
                              <h4>$6,308</h4>
                              <p class="mt-2">Total orders of this year</p>
                            </div>
                          </div>
                          <div class="col-6 px-0">
                            <div class="text-center p-4 border-left">
                            <br> AWB: huahahahha
                              <!-- $totalOrders += $revenue->num_of_orders; -->
                              <p class="mt-2">Total revenue of this year</p>
                            </div>
                          </div>
                        </div>
                      </div>
<!-- </div> -->

@stop
@endcan