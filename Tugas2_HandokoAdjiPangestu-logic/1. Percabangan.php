<?php

/** 
 * Output
 * 
 * [Struktur Program - Percabangan]
 * [Case: Penilaian Otomatis Restriksi Jalan Ganji Genap]
 * [No Polisi B 1520 GDS]
 * [Hasil: Kendaraan B 1520 GDS diizinkan lewat] 
 */

/**
 * Class OddEven
 * 
 * Show odd or even vehicle
 */
class OddEven extends \stdClass
{

  /**
   * @var string
   */
  private $plate;

  /**
   * @param string $plate
   */
  function __construct($plate)
  {
    $this->plate = $plate;
  }

  /**
   * @return string
   */
  public function check()
  {
    // Check
    // 1 = odd
    // 0 = even
    $date =  (int) date('d');
    $oddEven = $date % 2 === 1 ? 1 : 0;

    // Explode String
    $full_plate = explode(' ', $this->plate)[1];
    // Split String from full_plate
    $plate = str_split($full_plate);

    return "Tanggal {$date} {$this->oddEven($plate,$oddEven)}";
  }

  /**
   * @param array $plate
   * @param int $oddEven
   * 
   * @return string
   */
  private function oddEven($plate, $oddEven)
  {
    if (end($plate) % 2 === $oddEven) {
      return "Kendaraan {$this->plate} diizinkan lewat";
    } else {
      return "Kendaraan {$this->plate} tidak diizinkan lewat";
    }
  }
}

$plate = new OddEven("B 1526 GDS");
echo $plate->check();
