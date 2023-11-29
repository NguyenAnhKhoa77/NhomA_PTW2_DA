<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Bills;
use App\Models\Momo;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerCheckOut extends Controller
{
    public function index(Request $request)
    {
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
            return view('fontend.checkout.checkout', compact('checkOutProducts', 'subTotalPrices', 'totalShippingFees', 'totalPrices', 'userInfo'));
        } else {
            return redirect()->route('login')->with('error', 'You need to login first!');
        }
    }

    public function thanksPage(Request $request)
    {
        if ($request->message === "Successful.") {
            $momo = new Momo();
            $momo->partnerCode = $request->partnerCode;
            $momo->orderId = $request->orderId / 10000;
            $momo->requestId = $request->requestId;
            $momo->amount = $request->amount;
            $momo->orderInfo = $request->orderInfo;
            $momo->orderType = $request->orderType;
            $momo->transId = $request->transId;
            $momo->payType = $request->payType;
            $momo->signature = $request->signature;
            if ($momo->save()) {
                $bill = Bills::findOrFail($momo->orderId);
                $bill->status = 'paid';
                $bill->update();
            }
        } else {
            session()->forget('cart');
            return redirect()->route('cart')->with('error', 'Checkout succeed but did not paid!');
        }
        session()->forget('cart');
        return view('fontend.checkout.thankyou');
    }

    public function checkoutMomo(Request $request)
    {
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
            return view('fontend.checkout.checkout-momo', compact('checkOutProducts', 'subTotalPrices', 'totalShippingFees', 'totalPrices', 'userInfo'));
        } else {
            return redirect()->route('login')->with('error', 'You need to login first!');
        }
    }

    public function processCheckout(Request $request)
    {
        // Validate thông tin thanh toán từ $request
        $request->validate([
            'address' => 'required|string',
            'shipping' => 'required|integer',
            'total' => 'required|integer',
            'phone' => 'required|regex:/^0[0-9]{9}$/',
            'payment_type' => 'required|in:0,1',
        ]);
        if (!session('cart')) {
            return redirect()->route('cart')->with('error', 'You did not had any product in cart!');
        }
        // Tạo một hóa đơn mới
        $bill = new Bills();
        $bill->user_id = auth()->id();
        $bill->address = $request->input('address');
        $bill->shipping = $request->input('shipping');
        $bill->total = $request->input('total');
        $bill->phone = $request->input('phone');
        $bill->status = 'pending';
        $bill->payment_type = $request->input('payment_type');

        if ($bill->save()) {
            // Thêm các sản phẩm vào đơn hàng và ghi lại số lượng sản phẩm
            $cart = $request->session()->get('cart', []);
            foreach ($cart as $cartItem) {
                $order = new Orders();
                $order->bill_id = $bill->id;
                $order->product_id = $cartItem['id'];
                $order->quantity = $cartItem['quantity'];
                $order->save();
                if (!$order->save()) {
                    return redirect()->back()->with('error', 'Could not check out!');
                }
            }
            session()->forget('cart');
            return view('fontend.checkout.thankyou');
        }
        return redirect()->route('cart')->with('error', 'Could not check out!');
    }

    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function processCheckoutMomo(Request $request)
    {
        // Validate thông tin thanh toán từ $request
        $request->validate([
            'address' => 'required|string',
            'shipping' => 'required|integer',
            'total' => 'required|integer',
            'phone' => 'required|regex:/^0[0-9]{9}$/',
            'payment_type' => 'required|in:0,1',
        ]);
        if (!session('cart')) {
            return redirect()->route('cart')->with('error', 'You did not had any product in cart!');
        }
        // Tạo một hóa đơn mới
        $bill = new Bills();
        $bill->user_id = auth()->id();
        $bill->address = $request->input('address');
        $bill->shipping = $request->input('shipping');
        $bill->total = $request->input('total');
        $bill->phone = $request->input('phone');
        $bill->status = 'pending';
        $bill->payment_type = $request->input('payment_type');

        if ($bill->save()) {
            // Thêm các sản phẩm vào đơn hàng và ghi lại số lượng sản phẩm
            $cart = $request->session()->get('cart', []);
            foreach ($cart as $cartItem) {
                $order = new Orders();
                $order->bill_id = $bill->id;
                $order->product_id = $cartItem['id'];
                $order->quantity = $cartItem['quantity'];
                $order->save();
                if (!$order->save()) {
                    return redirect()->back() - with('error', 'Could not check out!');
                }
                $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

                $partnerCode = 'MOMOBKUN20180529';
                $accessKey = 'klm05TvNBzhg7h7j';
                $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
                $orderInfo = "Thanh toán qua MoMo";
                $amount = $bill->total;
                if ($bill->id > 1) {
                    $orderId = $bill->id * 1000;
                } else if ($bill->id == 1) {
                    $orderId = $bill->id * 10000;
                }
                $redirectUrl = "http://127.0.0.1:8000/check-out/thank-you";
                $ipnUrl = "http://127.0.0.1:8000/check-out/thank-you";
                $extraData = "";
                $requestId = time() . "";
                $requestType = "payWithATM";
//        $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
                //before sign HMAC SHA256 signature
                $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                $signature = hash_hmac("sha256", $rawHash, $secretKey);
                $data = array('partnerCode' => $partnerCode,
                    'partnerName' => "Test",
                    "storeId" => "MomoTestStore",
                    'requestId' => $requestId,
                    'amount' => $amount,
                    'orderId' => $orderId,
                    'orderInfo' => $orderInfo,
                    'redirectUrl' => $redirectUrl,
                    'ipnUrl' => $ipnUrl,
                    'lang' => 'vi',
                    'extraData' => $extraData,
                    'requestType' => $requestType,
                    'signature' => $signature);
                $result = $this->execPostRequest($endpoint, json_encode($data));
                $jsonResult = json_decode($result, true);  // decode json

                //Just a example, please check more in there
                return redirect()->to($jsonResult['payUrl']);
            }
        }
        return redirect()->route('cart')->with('error', 'Could not check out!');
    }
}
