<?php

class Member
{
  public
    $id,
    $name,
    $min,
    $disc;

  public function __construct($id, $name, $min, $disc)
  {
    $this->id = $id;
    $this->name = $name;
    $this->min = $min;
    $this->disc = $disc;
  }
}

class Brand
{
  public
    $id,
    $name,
    $price;

  public function __construct($id, $name, $price)
  {
    $this->id = $id;
    $this->name = $name;
    $this->price = $price;
  }
}

$non_member = new Member(1, "Non-Member", 10, 5);
$platinum = new Member(2, "Platinum", 3, 10);
$gold = new Member(3, "Gold", 5, 10);
$silver = new Member(4, "Silver", 3, 5);
$type_members = [$non_member, $platinum, $gold, $silver];

$guess = new Brand(1, "Guess", 2000000);
$coach = new Brand(2, "Coach", 3000000);
$zara = new Brand(3, "Zara", 1500000);
$body_pack = new Brand(4, "BodyPack", 1000000);
$brands = [$guess, $coach, $zara, $body_pack];

function currency($price)
{

  $result_price = "Rp " . number_format($price, 0, ',', '.');
  return $result_price;
}

$is_submited = isset($_POST['submit']);
if ($is_submited) {
  $data = $_POST;

  $member = null;
  foreach ($type_members as $type_member) {
    if ((int) $data['type_member'] === $type_member->id) {
      $member = $type_member;
      break;
    }
  }

  $item = null;
  foreach ($brands as $brand) {
    if ((int) $data['brand'] === $brand->id) {
      $item = $brand;
      break;
    }
  }

  $user_transaction = $data['number_transaction'];
  $user_member = $member->name;
  $brand_buying = $item->name;
  $brand_price = $item->price;
  $quantity = $data['quantity'];
  $total = $data['quantity'] * $item->price;
  $disc = 0;
  if ($quantity >= $member->min) {
    $disc = $total * $member->disc / 100;
    $discPercentage = "{$member->disc}%";
  }
  $grandTotal = $total - $disc;
}

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    body {
      margin: 10%;
    }

    .borderless td,
    .borderless th {
      border: none;
    }
  </style>

  <title>Hello, world!</title>
</head>

<body>
  <h1 class="mb-4">Perhitungan Harga Toko XYZ</h1>
  <form action="" method="post">
    <div class="form-group row">
      <label for="numberTransaction" class="col-sm-3 col-form-label">Nomor Transaksi</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="numberTransaction" name="number_transaction" placeholder="Nomor Transaksi" value="<?= uniqid(); ?>" readonly>
      </div>
    </div>
    <fieldset class="form-group">
      <div class="row">
        <legend class="col-form-label col-sm-3 pt-0">Barang</legend>
        <div class="col-sm-9">
          <?php foreach ($type_members as $index => $type_member) : ?>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="type_member" id="gridRadios<?= $index ?>" value="<?= $type_member->id; ?>">
              <label class="form-check-label" for="gridRadios<?= $index ?>">
                <?= $type_member->name; ?>
              </label>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </fieldset>
    <div class="form-group row">
      <label for="brand" class="col-sm-3 col-form-label">Merek</label>
      <div class="col-sm-9">
        <select class="form-control custom-select" id="brand" name="brand" required>
          <option value="">Pilih Merek</option>
          <?php foreach ($brands as $brand) : ?>
            <option value="<?= $brand->id; ?>"><?= $brand->name; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="quantity" class="col-sm-3 col-form-label">Jumlah Barang</label>
      <div class="col-sm-9">
        <input type="number" class="form-control" id="quantity" placeholder="Jumlah Barang" name="quantity">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-9 ml-auto">
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </div>
    </div>
  </form>

  <?php if ($is_submited) : ?>
    <h2 class="mt-5 mb-3">Result</h2>
    <div class="row">
      <div class="col-md-6">
        <table class="table borderless">
          <tr>
            <th>Nomor Transaksi</th>
            <td><?= $user_transaction; ?></td>
          </tr>
          <tr>
            <th>Jenis Member</th>
            <td><?= $user_member; ?></td>
          </tr>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col" class="text-center">Merek</th>
              <th scope="col" class="text-center">Harga</th>
              <th scope="col" class="text-center">Jumlah</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td class="text-center"><?= $brand_buying; ?></td>
              <td class="text-right"><?= currency($brand_price); ?></td>
              <td class="text-center"><?= $quantity; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-4">
        <table class="table borderless">
          <tr>
            <th>Total</th>
            <td class="text-right"><?= currency($total); ?></td>
          </tr>
          <?php if ($disc > 0) : ?>
            <tr>
              <th>Diskon</th>
              <td class="text-right"><?= $discPercentage; ?></td>
            </tr>
          <?php endif; ?>
          <tr>
            <th>Total Diskon</th>
            <td class="text-right"><?= currency($disc); ?></td>
          </tr>
          <tr>
            <th>Grand Total</th>
            <td class="text-right"><?= currency($grandTotal); ?></td>
          </tr>
        </table>
      </div>
    </div>
  <?php endif; ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>