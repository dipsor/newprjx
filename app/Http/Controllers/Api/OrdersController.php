<?php

namespace App\Http\Controllers\Api;

use App\Orders\Models\Order;
use App\Transformers\Orders\OrderTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Users\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCreated;

class OrdersController extends Controller
{

    private $transformer;

    public function __construct(OrderTransformer $orderTransformer)
    {
        $this->transformer = $orderTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->get();

        return response($orders, 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'city' => 'required',
            'street' => 'required',
            'postal_code' => 'required',
            'country_code' => 'required',
        ],

        ['first_name.required' => 'Prosím, vyplňte křestní jméno.',
            'last_name.required'  => 'Prosím, vyplňte příjmení.',
            'phone_number.required'  => 'Prosím, vyplňte telefonní číslo.',
            'city.required'  => 'Prosím, vyplňte město.',
            'street.required'  => 'Prosím, vyplňte ulici.',
            'postal_code.required'  => 'Prosím, vyplňte PSČ.',
            'country_code.required'  => 'Prosím, vyplňte kód země.',
            ]
        );

        $order = Order::create([
            'user_id'           => $request->user_id,
            'thesis_id'         => $request->thesis_id,
            'orderName'         => $request->orderName,
            'first_name'        => $request->first_name,
            'last_name'         => $request->last_name,
            'phone_number'      => $request->phone_number,
            'city'              => $request->city,
            'street'            => $request->street,
            'postal_code'       => $request->postal_code,
            'country_code'      => $request->country_code,
            'price'             => $request->price,
            'gopay_order_id'    => $request->gopay_order_id,
        ]);

        $user = User::find($request->user_id);

        Mail::to($user->email)->send(new OrderCreated($user, $order));


        return response($this->transformer->transform($order));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);

        return response($this->transformer->transform($order));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'city' => 'required',
            'street' => 'required',
            'postal_code' => 'required',
            'country_code' => 'required',
        ]);

        $order->update([
            'user_id'           => $request->user_id,
            'thesis_id'         => $request->thesis_id,
            'orderName'         => $request->orderName,
            'first_name'        => $request->first_name,
            'last_name'         => $request->last_name,
            'phone_number'      => $request->phone_number,
            'city'              => $request->city,
            'street'            => $request->street,
            'postal_code'       => $request->postal_code,
            'country_code'      => $request->country_code,
            'price'             => $request->price,
            'gopay_order_id'    => $request->gopay_order_id,
        ]);

        return response($this->transformer->transform($order));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();

        return response('ok', 200);
    }

    /**
     * @param $userId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getUsersOrders(Request $request, int $userId)
    {
        $user = User::find($userId);
        $orders = Order::where('user_id', '=', $user->id)->orderBy('id', 'desc')->get();

        if (!empty($orders)) {
            return response($orders, 200);
        }
    }
}
