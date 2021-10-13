<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order\order;
use App\Models\Order\OrderTransfer;
use App\Repositories\OTPRequestRepository;
use App\Repositories\TopUpRequestRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /** @var  OTPRequestRepository */
    private $otpRequestRepository;
    /** @var  TopUpRequestRepository */
    private $topUpRequestRepository;

    public function __construct(OTPRequestRepository $otpRequestRepository, TopUpRequestRepository $topUpRequestRepository)
    {
        $this->otpRequestRepository = $otpRequestRepository;
        $this->topUpRequestRepository = $topUpRequestRepository;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $id = Auth::user()->merchant_id;

        if($id == ''){

            $allDataCount = $this->otpRequestRepository->count();
            $allTopUpCount = $this->topUpRequestRepository->count();
            $allDataSuccessCount = $this->otpRequestRepository->successCount();
            $allTopUpSuccessCount = $this->topUpRequestRepository->successCount();

        }else{

            $allDataCount = $this->otpRequestRepository->clientCount();
            $allTopUpCount = $this->topUpRequestRepository->clientCount();
            $allDataSuccessCount = $this->otpRequestRepository->successClientCount();
            $allTopUpSuccessCount = $this->topUpRequestRepository->successClientCount();

        }


        return view('home')
                ->withAllTopUpSuccessCount($allTopUpSuccessCount)
                ->withAllDataSuccessCount($allDataSuccessCount)
                ->withAllTopUpCount($allTopUpCount)
                ->withAllDataCount($allDataCount);
    }

    public function search(Request $request)
    {
        $barDatas = DB::table('orders')
            ->select(DB::raw('sum(amount) as amount , services.service_name as service_name'))
            ->join('services', 'services.id', '=', 'orders.service_id')
            ->Where(function ($query) use ($request) {
                $id = Auth::user()->merchant_id;
                $from = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('from') . '00:00:00');
                $to = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('to') . '23:59:59');
                $query->whereBetween('orders.created_at', array($from, $to));
                $query->Where('orders.merchant_id', '=', $id);
                $query->Where('orders.payment_status', '=', 0);
            })->groupBy('services.service_name')
            ->get();

        $barDatas = $barDatas->sortBy('service_name', SORT_NATURAL);

        $id = Auth::user()->merchant_id;

        if($id == ''){

            $kbz= order::Where(function ($query) use ($request) {
                $from = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('from') . '00:00:00');
                $to = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('to') . '23:59:59');
                $query->whereBetween('created_at', array($from, $to));
                $query->Where('payment_status', '=', 0);
                $query->Where('payment_method','KBZ');
            })->sum('amount');

            $coda = order::Where(function ($query) use ($request) {
                $from = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('from') . '00:00:00');
                $to = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('to') . '23:59:59');
                $query->whereBetween('created_at', array($from, $to));
                $query->Where('payment_status', '=', 0);
                $query->Where('payment_method','Coda');
            })->sum('amount');

            $mpu = order::Where(function ($query) use ($request) {
                $from = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('from') . '00:00:00');
                $to = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('to') . '23:59:59');
                $query->whereBetween('created_at', array($from, $to));
                $query->Where('payment_status', '=', 0);
                $query->Where('payment_method','MPU');
            })->sum('amount');

            $cash = order::Where(function ($query) use ($request) {
                $from = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('from') . '00:00:00');
                $to = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('to') . '23:59:59');
                $query->whereBetween('created_at', array($from, $to));
                $query->Where('payment_status', '=', 0);
                $query->Where('payment_method','cash');
            })->sum('amount');

            $credit = order::Where(function ($query) use ($request) {
                $from = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('from') . '00:00:00');
                $to = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('to') . '23:59:59');
                $query->whereBetween('created_at', array($from, $to));
                $query->Where('payment_status', '=', 0);
                $query->Where('payment_method','card');
            })->sum('amount');

            $oneTwoThree = order::Where(function ($query) use ($request) {
                $from = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('from') . '00:00:00');
                $to = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('to') . '23:59:59');
                $query->whereBetween('created_at', array($from, $to));
                $query->Where('payment_status', '=', 0);
                $query->Where('payment_method','onetwothree');
            })->sum('amount');

            $okDollar = order::Where(function ($query) use ($request) {
                $from = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('from') . '00:00:00');
                $to = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('to') . '23:59:59');
                $query->whereBetween('created_at', array($from, $to));
                $query->Where('payment_status', '=', 0);
                $query->Where('payment_method','OK Dollar');
            })->sum('amount');

            $waveMoney = order::Where(function ($query) use ($request) {
                $from = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('from') . '00:00:00');
                $to = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('to') . '23:59:59');
                $query->whereBetween('created_at', array($from, $to));
                $query->Where('payment_status', '=', 0);
                $query->Where('payment_method','Wave Money');
            })->sum('amount');

            $totalAmount = order::Where(function ($query) use ($request) {
                $from = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('from') . '00:00:00');
                $to = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('to') . '23:59:59');
                $query->whereBetween('created_at', array($from, $to));
                $query->Where('payment_status', '=', 0);
            })->sum('amount');

        }else{

            $kbz= order::Where(function ($query) use ($request) {
                $id = Auth::user()->merchant_id;
                $from = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('from') . '00:00:00');
                $to = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('to') . '23:59:59');
                $query->whereBetween('created_at', array($from, $to));
                $query->Where('merchant_id', '=', $id);
                $query->Where('payment_status', '=', 0);
                $query->Where('payment_method','KBZ');
            })->sum('amount');

            $coda = order::Where(function ($query) use ($request) {
                $id = Auth::user()->merchant_id;
                $from = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('from') . '00:00:00');
                $to = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('to') . '23:59:59');
                $query->whereBetween('created_at', array($from, $to));
                $query->Where('merchant_id', '=', $id);
                $query->Where('payment_status', '=', 0);
                $query->Where('payment_method','Coda');
            })->sum('amount');

            $mpu = order::Where(function ($query) use ($request) {
                $id = Auth::user()->merchant_id;
                $from = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('from') . '00:00:00');
                $to = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('to') . '23:59:59');
                $query->whereBetween('created_at', array($from, $to));
                $query->Where('merchant_id', '=', $id);
                $query->Where('payment_status', '=', 0);
                $query->Where('payment_method','MPU');
            })->sum('amount');

            $cash = order::Where(function ($query) use ($request) {
                $id = Auth::user()->merchant_id;
                $from = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('from') . '00:00:00');
                $to = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('to') . '23:59:59');
                $query->whereBetween('created_at', array($from, $to));
                $query->Where('merchant_id', '=', $id);
                $query->Where('payment_status', '=', 0);
                $query->Where('payment_method','cash');
            })->sum('amount');

            $credit = order::Where(function ($query) use ($request) {
                $id = Auth::user()->merchant_id;
                $from = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('from') . '00:00:00');
                $to = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('to') . '23:59:59');
                $query->whereBetween('created_at', array($from, $to));
                $query->Where('merchant_id', '=', $id);
                $query->Where('payment_status', '=', 0);
                $query->Where('payment_method','card');
            })->sum('amount');

            $oneTwoThree = order::Where(function ($query) use ($request) {
                $id = Auth::user()->merchant_id;
                $from = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('from') . '00:00:00');
                $to = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('to') . '23:59:59');
                $query->whereBetween('created_at', array($from, $to));
                $query->Where('merchant_id', '=', $id);
                $query->Where('payment_status', '=', 0);
                $query->Where('payment_method','onetwothree');
            })->sum('amount');

            $okDollar = order::Where(function ($query) use ($request) {
                $id = Auth::user()->merchant_id;
                $from = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('from') . '00:00:00');
                $to = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('to') . '23:59:59');
                $query->whereBetween('created_at', array($from, $to));
                $query->Where('merchant_id', '=', $id);
                $query->Where('payment_status', '=', 0);
                $query->Where('payment_method','OK Dollar');
            })->sum('amount');

            $waveMoney = order::Where(function ($query) use ($request) {
                $id = Auth::user()->merchant_id;
                $from = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('from') . '00:00:00');
                $to = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('to') . '23:59:59');
                $query->whereBetween('created_at', array($from, $to));
                $query->Where('merchant_id', '=', $id);
                $query->Where('payment_status', '=', 0);
                $query->Where('payment_method','Wave Money');
            })->sum('amount');

            $totalAmount = order::Where(function ($query) use ($request) {
                $id = Auth::user()->merchant_id;
                $from = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('from') . '00:00:00');
                $to = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('to') . '23:59:59');
                $query->whereBetween('created_at', array($from, $to));
                $query->Where('merchant_id', '=', $id);
                $query->Where('payment_status', '=', 0);
            })->sum('amount');

        }

        return view('home')->withBarDatas($barDatas)
            ->withKbz($kbz)
            ->withCoda($coda)
            ->withMpu($mpu)
            ->withCredit($credit)
            ->withOneTwoThree($oneTwoThree)
            ->withOkDollar($okDollar)
            ->withWaveMoney($waveMoney)
            ->withTotalAmount($totalAmount);
    }
}
