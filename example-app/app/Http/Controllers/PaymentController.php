<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use App\Models\Bills;
use App\Models\Momo;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Account;
use Illuminate\Http\Request;
use Omnipay\Omnipay;

class PaymentController extends Controller
{
    private $gateway;

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function pay(Request $request)
    {
        
        try {
            
            // Xác định tỷ giá chuyển đổi từ VND sang USD (hoặc tiền tệ khác)
            $exchangeRate = 23000;

            // Chuyển đổi giá trị sang USD và làm tròn số lẻ với 2 chữ số thập phân
            $amountInUSD = number_format($request->input('total') / $exchangeRate, 2, '.', '');
            
            $response = $this->gateway->purchase(array(
                'amount' => $amountInUSD,
                'currency' => 'USD',
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ))->send();
            
    
            if ($response->isRedirect()) {
                $response->redirect();
            } else {
                return $response->getMessage();
            }
    
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function success(Request $request)
    {
        
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));

            $response = $transaction->send();

            if ($response->isSuccessful()) {

                $arr = $response->getData();

                $payment = new Payment();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];

                $payment->save();

                return view('fontend.checkout.thankyou');

            }
            else{
                return $response->getMessage();
            }
        }
        else{
            return 'Payment declined!!';
        }
    }

    public function error()
    {
        return 'User declined the payment!';   
    }

public function checkoutPaypal(Request $request){
    if (Auth::check()) {
        $userInfo = Account::findOrFail(auth()->user()->id);
        if (!session('cart')) {
            return redirect()->route('cart')->with('error', 'You did not had any product in cart!');
        }
        $cart = $request->session()->get('cart', []);

        $checkOutProducts = [];
        $subTotalPrices = 0;
        $totalShippingFees = 0;
        foreach ($cart as $cartItem) {
            $product = Product::find($cartItem['id']);
            if ($product) {
                $product->quantityInCart = $cartItem['quantity'];
                $checkOutProducts[] = $product;
                $prices = $product->quantityInCart * $product->price;
                $subTotalPrices += $prices;
                $totalShippingFees += $product->quantityInCart * 10000;
            }
        }
        if ($subTotalPrices > 1000000) {
            $totalShippingFees = 0;
        } else if ($subTotalPrices > 500000) {
            $totalShippingFees = $totalShippingFees - $totalShippingFees * 0.1;
        }

        $totalPrices = $subTotalPrices + $totalShippingFees;
        return view('fontend.checkout.paypal-Payment', compact('checkOutProducts', 'subTotalPrices', 'totalShippingFees', 'totalPrices', 'userInfo'));
    } else {
        return redirect()->route('login')->with('error', 'You need to login first!');
    }
}
    
}
