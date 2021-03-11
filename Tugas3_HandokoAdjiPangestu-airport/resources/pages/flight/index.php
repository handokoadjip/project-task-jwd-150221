<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<?php

require './resources/models/Airlines.php';
require './resources/models/Airports.php';
require './resources/models/flight.php';
require './resources/models/Utilities.php';

$airlines = new Airlines('./resources/json/airlines.json');
$originAirports = new Airports('./resources/json/originAirport.json');
$depatureAirports = new Airports('./resources/json/destinationAirport.json');
$transaction = new Flight('./resources/json/transaction.json');
$utility = new Utilities();

if (isset($_POST['save'])) {
  $transaction->store($_POST, $transaction->index());
}

?>

<!-- Content-Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Data Flight</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Data Flight</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<!-- End-Content-Header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Button trigger modal -->
    <div class="row mb-3">
      <div class="col d-flex justify-content-end">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Transaksi
        </button>
      </div>
    </div>
    <div class="card card-solid">
      <!-- Card-Body -->
      <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Airline</th>
              <th>Origin Flight</th>
              <th>Depature Flight</th>
              <th>Price</th>
              <th>Tax</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($transaction->index() as $index => $transaksi) : ?>
              <tr>
                <td><?= $index + 1; ?></td>
                <td><?= $transaksi->airline; ?></td>
                <td><?= $transaksi->origin; ?></td>
                <td><?= $transaksi->depature; ?></td>
                <td><?= $utility->currency($transaksi->price); ?></td>
                <td><?= $utility->currency($transaksi->tax); ?></td>
                <td><?= $utility->currency($transaksi->total); ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="maskapai">Airlines</label>
            <select class="form-control" id="maskapai" name="maskapai" required>
              <option value="">Choose Airlines</option>
              <?php foreach ($airlines->index() as $airline) : ?>
                <option value="<?= $airline->airline; ?>" data-harga="<?= $airline->price; ?>"><?= $airline->airline; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="bandara-asal">Origin Airport</label>
            <select class="form-control" id="bandara-asal" name="asal" required>
              <option value="">Choose Airport Origin</option>
              <?php foreach ($originAirports->index() as $airportAsal) : ?>
                <option value="<?= $airportAsal->airport; ?>" data-pajak1="<?= $airportAsal->tax; ?>"><?= $airportAsal->airport; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <input type="hidden" name="pajak1" id="pajak1">
          <div class=" form-group">
            <label for="bandara-tujuan">Destination Airport</label>
            <select class="form-control" id="bandara-tujuan" name="tujuan" required>
              <option value="">Choose Airport Depature</option>
              <?php foreach ($depatureAirports->index() as $airportTujuan) : ?>
                <option value="<?= $airportTujuan->airport; ?>" data-pajak2="<?= $airportTujuan->tax; ?>"><?= $airportTujuan->airport; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <input type="hidden" name="pajak2" id="pajak2">
          <div class="form-group">
            <label for="harga">Price</label>
            <input type="text" class="form-control" id="harga" name="harga" aria-describedby="harga" placeholder="Enter harga" value="Rp. 0" readonly>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="save">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#maskapai').change(function() {
      $('#harga').val(`Rp. ${($(this).find(':selected').data('harga') / 1000).toFixed(3)}`);
    });

    $('#bandara-asal').change(function() {
      $('#pajak1').val($(this).find(':selected').data('pajak1'));
    });

    $('#bandara-tujuan').change(function() {
      $('#pajak2').val($(this).find(':selected').data('pajak2'));
    });
  });
</script>