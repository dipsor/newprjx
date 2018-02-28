<?php

namespace App\Http\Controllers\Api;

use App\Orders\Models\Order;
use Carbon\Carbon;
use GoPay\Definition\TokenScope;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use HazeStudio\LaravelGoPaySDK\Facade as GoPay;
use GoPay\Api;
use GoPay\Definition\Language;
use GoPay\Definition\Payment\Currency;
use GoPay\Definition\Payment\PaymentInstrument;
use GoPay\Definition\Payment\BankSwiftCode;
use Illuminate\Support\Facades\App;

class GopayController extends Controller
{
    public function payment(Request $request)
    {
        $orderId = $request->get('orderId');
        $order = Order::findOrFail($orderId);

        $response = GoPay::lang(App::getLocale())->scope('CREATE_PAYMENT')->createPayment([
            'payer' => [
                'default_payment_instrument' => PaymentInstrument::BANK_ACCOUNT,
                'allowed_payment_instruments' => [PaymentInstrument::BANK_ACCOUNT],
                'default_swift' => BankSwiftCode::FIO_BANKA,
                'allowed_swifts' => [BankSwiftCode::FIO_BANKA, BankSwiftCode::MBANK],
                'contact' => [
                    'first_name' => $order->first_name,
                    'last_name' => $order->last_name,
                    'email' => $order->user->email,
                    'phone_number' => $order->phone_number,
                    'city' => $order->city,
                    'street' => $order->street,
                    'postal_code' => $order->postal_code,
                    'country_code' => 'CZE',
                ],
            ],
            'amount' => $order->price,
            'currency' => Currency::CZECH_CROWNS,
            'order_number' => $order->id,
            'order_description' => $order->name,
//            'items' => [$order->name],
            'additional_params' => [
                array('name' => 'invoicenumber', 'value' => $this->getInvoiceNumber($order->id, $order->user_id)),
            ],
            'callback' => [
                'return_url' => route('users.index'),
                'notification_url' => route('thesis.notify'),
            ]
        ]);

        if ($response->hasSucceed()) {
            $url = $response->json['gw_url'];
            logger($response->json['state']);
            return response(['gw_url' => $url, 'state' => $response->json['state']], 200);
        }

    }

    private function getInvoiceNumber($orderId, $userId)
    {
        return (string)$orderId . (string)$userId . str_replace('%-%','', Carbon::now()->toDateString());
    }

    public function getStatus(Request $request)
    {
        $state = '';

        if ($request->get('id') !== null) {
            $state = GoPay::getStatus($request->get('id'));
        }

        return response($state, 200);
    }
}