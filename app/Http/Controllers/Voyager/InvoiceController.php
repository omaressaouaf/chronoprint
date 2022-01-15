<?php

namespace App\Http\Controllers\Voyager;

use App\Models\Order;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    public function __invoke(Order $order)
    {
        $pdf = App::make('dompdf.wrapper');
        
        $pdf->loadView('invoices.default', [
            "order" => $order->load("user", "items.product", "items.product.attributs")
        ]);

        return $pdf->stream();
    }
}
