<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testunit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test');
    }

    private function hitungDiscount($discountrate, $hargapcs)
    {
        $discount = $hargapcs * $discountrate / 100;
        return $hargapcs - $discount;
    }

    public function testDiscount()
    {
        $test = $this->hitungDiscount(50, 80000);
        $expected_result = 40000;
        $test_name = 'Menghitung harga setelah diskon';
        echo $this->unit->run($test, $expected_result, $test_name);
    }
}
