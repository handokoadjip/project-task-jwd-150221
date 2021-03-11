<?php

require './resources/models/Airlines.php';
require './resources/models/Utilities.php';

$airlines = new Airlines('./resources/json/airlines.json');
$utility = new Utilities();

?>
<!-- Content-Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Data Airlines</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Data Airlines</li>
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
              <th class="text-center" style="width:5%">No</th>
              <th>Airlines</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($airlines->index() as $index => $airline) : ?>
              <tr>
                <td class="text-center"><?= $index + 1; ?></td>
                <td><?= $airline->airline; ?></td>
                <td class="text-right"><?= $utility->currency($airline->price); ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</section>