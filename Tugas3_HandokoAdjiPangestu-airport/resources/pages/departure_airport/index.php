<?php

require './resources/models/Airports.php';
require './resources/models/Utilities.php';

$airports = new Airports('./resources/json/destinationAirport.json');
$utility = new Utilities();

?>
<!-- Content-Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Data Depature Airports</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Data Airports</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<!-- End-Content-Header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card card-solid">
      <!-- Card-Body -->
      <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Airports</th>
              <th>Pajak</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($airports->index() as $index => $airport) : ?>
              <tr>
                <td><?= $index + 1; ?></td>
                <td><?= $airport->airport; ?> (<?= $airport->code; ?>)</td>
                <td><?= $utility->currency($airport->tax); ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Airports</th>
              <th>Pajak</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</section>