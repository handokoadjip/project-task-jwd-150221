<?php

require './resources/models/Airlines.php';
require './resources/models/Airports.php';
require './resources/models/flight.php';


$airlines = new Airlines('./resources/json/airlines.json');
$originAirports = new Airports('./resources/json/originAirport.json');
$depatureAirports = new Airports('./resources/json/destinationAirport.json');
$transaction = new Flight('./resources/json/transaction.json');

?>

<!-- Content-Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
        </ol>
      </div>
    </div>
  </div>
</section>
<!-- End-Content-Header -->

<!-- Main-Content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small-Boxes -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <div class="small-box bg-light">
          <div class="inner">
            <h3><?= count($airlines->index()); ?></h3>

            <p>Airlines</p>
          </div>
          <div class="icon">
            <i class="fas fa-archway"></i>
          </div>

        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box bg-light">
          <div class="inner">
            <h3><?= count($originAirports->index()); ?></h3>

            <p>Origin Airports</p>
          </div>
          <div class="icon">
            <i class="fas fa-plane-departure"></i>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box bg-light">
          <div class="inner">
            <h3><?= count($depatureAirports->index()); ?></h3>

            <p>Departure Airports</p>
          </div>
          <div class="icon">
            <i class="fas fa-plane-arrival"></i>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box bg-ligh">
          <div class="inner">
            <h3><?= count($transaction->index()); ?></h3>

            <p>Flights</p>
          </div>
          <div class="icon">
            <i class="fas fa-plane"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End-Small-Boxes -->
  </div>
</section>
<!-- End-Main-Content -->