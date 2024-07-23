<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;

class RazorpayController extends Controller
{
    private $api;

    public function __construct()
    {
        $this->api = new Api("rzp_test_W50AOTjqDXB5NR", "QnrSROAINjxFX32NT4OKWDWd");
    }

    public function form_page()
    {
        return view("payment_form");
    }

    public function make_order(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $order_id = rand('111111', '999999');

        $orderData = [
            'receipt' => uniqid(),
            'amount' => $request->amount * 100, // amount in paise
            'currency' => 'INR',
            'payment_capture' => 1, // auto capture
            'notes' => [
                'offer_id' => $order_id,

            ]
        ];

        $razorpayOrder = $order = $this->api->order->create($orderData);
        // dd($razorpayOrder);

        return view('order_detail', compact('order_id', 'razorpayOrder'));
    }

    public function success(Request $request)
    {
        $status = $this->api->payment->fetch($request->payment_id);
        // dd($status);
        if ($status->status == 'captured') {
            return redirect('payment')->with('success', "successfully Payment");
        }
    }
}
