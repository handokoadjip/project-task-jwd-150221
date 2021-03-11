<?php

/**
 * Class resource Flight
 *
 * @package   Tugas2 : Handoko Adji Pangestu
 * @author    Handoko Adji Pangestu <Handokoadjipangestu@gmail.com>
 * @copyright Copyright (c) 2021 - 2022, Dokumenary Net.
 * @since     1.0
 * @link      http://dokumenary.net
 *
 * INDEMNITY
 * You agree to indemnify and hold harmless the authors of the Software and
 * any contributors for any direct, indirect, incidental, or consequential
 * third-party claims, actions or suits, as well as any related expenses,
 * liabilities, damages, settlements or fees arising from your use or misuse
 * of the Software, or a violation of any terms of this license.
 *
 * DISCLAIMER OF WARRANTY
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESSED OR
 * IMPLIED, INCLUDING, BUT NOT LIMITED TO, WARRANTIES OF QUALITY, PERFORMANCE,
 * NON-INFRINGEMENT, MERCHANTABILITY, OR FITNESS FOR A PARTICULAR PURPOSE.
 *
 * LIMITATIONS OF LIABILITY
 * YOU ASSUME ALL RISK ASSOCIATED WITH THE INSTALLATION AND USE OF THE SOFTWARE.
 * IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS OF THE SOFTWARE BE LIABLE
 * FOR CLAIMS, DAMAGES OR OTHER LIABILITY ARISING FROM, OUT OF, OR IN CONNECTION
 * WITH THE SOFTWARE. LICENSE HOLDERS ARE SOLELY RESPONSIBLE FOR DETERMINING THE
 * APPROPRIATENESS OF USE AND ASSUME ALL RISKS ASSOCIATED WITH ITS USE, INCLUDING
 * BUT NOT LIMITED TO THE RISKS OF PROGRAM ERRORS, DAMAGE TO EQUIPMENT, LOSS OF
 * DATA OR SOFTWARE PROGRAMS, OR UNAVAILABILITY OR INTERRUPTION OF OPERATIONS.
 */

class Flight extends \stdClass
{
  /**
   * @var string
   */
  private $dbjson;

  /**
   * @param string $dbjson
   */
  function __construct($dbjson)
  {
    $this->dbjson = $dbjson;
  }

  /**
   * @return array
   */
  public function index()
  {
    $dataJson = file_get_contents($this->dbjson);
    return json_decode($dataJson);
  }


  /**
   * @param mixed $transaksi
   * @param mixed $data
   * 
   * @return [type]
   */
  public function store($transaksi, $data)
  {
    $harga = (int) preg_replace("/[^0-9]/", "", $transaksi['harga']);
    $data_lama = (array) $data;
    $data_baru = [
      '_id' => uniqid(),
      'airline' => $transaksi['maskapai'],
      'origin' => $transaksi['asal'],
      'depature' => $transaksi['tujuan'],
      'price' => $harga,
      'tax' => $transaksi['pajak1'] + $transaksi['pajak2'],
      'total' => $harga + $transaksi['pajak1'] + $transaksi['pajak2']
    ];


    array_push($data_lama, $data_baru);

    $dataJson = json_encode($data_lama, JSON_PRETTY_PRINT);
    file_put_contents($this->dbjson, $dataJson);

    $_SESSION['success'] = "sukses tambah data transaksi";
    header('Location: http://localhost/project-learn/bpptik/project-task-jwd-150221-airport/index.php?pref=flight&page=index');
    exit();
  }
}
