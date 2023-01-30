<?php

namespace App\Http\Traits;

use Carbon\Carbon;
use Illuminate\Support\Str;

trait HelperFunctionTrait
{
    /**
     * @param $inbound_serial_number
     * @param $location
     * @param $raised_date
     * @return string
     */
    public function generate_purchase_inbound_name($inbound_serial_number, $location, $raised_date): string
    {
        $raisedDate = Carbon::parse($raised_date)->format('d/M/y');
        $number_add = str_pad($inbound_serial_number + 1, 6, 0, STR_PAD_LEFT);
        $location = ucfirst(Str::camel($location));
        return $location . '/' . $raisedDate . '/' . $number_add;
    }

    /**
     * @param $stockQuantity
     * @param $stockPrice
     * @param $inboundQuantity
     * @param $inboundPrice
     * @return float|int
     */
    public function average_price_calculation($stockQuantity, $stockPrice, $inboundQuantity, $inboundPrice): float|int
    {
        $inbound_valuation = $inboundQuantity * $inboundPrice;
        $stock_valuation = $stockQuantity * $stockPrice;

        $finalQuantity = $inboundQuantity + $stockQuantity;
        $finalQuantity = $finalQuantity > 0 ? $finalQuantity : 1;

        return ($inbound_valuation + $stock_valuation) / $finalQuantity;
    }

}
