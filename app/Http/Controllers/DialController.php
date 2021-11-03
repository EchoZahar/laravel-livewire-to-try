<?php

namespace App\Http\Controllers;

use App\Models\Dial;
use Cart;
use Illuminate\Http\Request;

class DialController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function dial(Request $request)
    {
        // Добавить валидацию (вынести в отдельный service class)
        if (!auth()->user()) {
            return back()->withErrors(['message' => 'Need authorization first']);
        }

        dd($request->input());
        $price = preg_replace('/[^0-9.]/', '', $request->input('total_price'));

        if (!$request->input('user_id')) {
            return back()->withErrors(['message' => 'для оформления сделки, пожалуйста авторизуйтесь']);
        }
        if (empty($request->input('total_price'))) {
            return back()->withErrors(['message' => 'Something wrong, please update page and try again']);
        }
        $only = $request->only(['user_id', 'totalPrice']);
        $only['status'] = 'new_deal';
        $only['total_price'] = $price;
        $prod = $request->input('product_id');
        $qua = $request->input('quantity');
        $deal = Dial::create($only);
        foreach ($prod as $key => $item) {
            $deal->products()->attach($item, ['quantity' => $qua[$key]]);
        }

        if ($deal) {
            Cart::clear();
            info('Создана новая сделка ID:, ' . $deal->id . ', пользователем ' . auth()->user()->name . '.');
            return redirect()->route('home')->with(['success' => 'Сделка успешно добавлена !']);
        }
    }

    /**
     * @param Request $request
     * @param $id
     * Отмена сделки
     */
    public function refuseDial(Request $request, $id)
    {
        $dial = Dial::find($id);
        $dial->status = Dial::ST_REFUSE;
        $update = $dial->update();

        if($update) {
            info('Status dial ID: ' . $dial->id . ' has ben changed to: refuse. User ' . auth()->user()->id);
            return back()->with(['success' => 'Dial has been refused successfully']);
        } else {
            return back()->withErrors(['message' => 'Something wrong !!! Pls update page and try again']);
        }
    }

    public function changeStatus($id)
    {
        $dial = Dial::find($id);
        $dial->status = Dial::ST_SUCCESS;
        $update = $dial->update();
        if ($update) {
            info('Status dial ID: ' . $dial->status . 'completed user: ' .auth()->user()->id);
            return back()->with(['success' => 'Dial was completed']);
        } else {
            return back()->withErrors(['message' => 'Something wrong !!! Pls update page and try again']);
        }
    }
}
