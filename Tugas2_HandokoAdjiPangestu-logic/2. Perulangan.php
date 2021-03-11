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
 * Class Looping
 * 
 * Show number loopong
 */
class Looping extends \stdClass
{


  /**
   * @return string
   */
  public function loop1()
  {
    for ($i = 1, $j = 1; $i > 0; $i += $j) {
      echo "{$i},";
      if ($i == 10)
        $j = -1;
    }
  }

  /**
   * @return string
   */
  public function loop2()
  {
    for ($i = 10, $j = 1; $i < 11; $i -= $j) {
      echo "{$i},";
      if ($i == 1)
        $j = -1;
    }
  }

  /**
   * @return string
   */
  public function loop3()
  {
    for ($i = 1; $i < 19; $i += 2) {
      if ($i === 1) {
        echo "{$i}|";
      }

      echo $i + 3;
      echo ",";
      echo $i + 2;
      echo ",";
      echo $i + 1;
      echo "|";
    }
  }
}

$loop1 = new Looping();
$loop1->loop1();

echo "<hr />";

$loop2 = new Looping();
$loop2->loop2();

echo "<hr />";

$loop3 = new Looping();
$loop3->loop3();
