<?php

namespace App\Http\Controllers\Backend;

use App\Models\RequestLog;
use App\Repositories\OTPRequestRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Webpatser\Uuid\Uuid;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\Storage;
use Excel;
use Illuminate\Support\Facades\Auth;

class OTPClientRequestController extends AppBaseController
{
    /** @var  OTPRequestRepository */
    private $otpRequestRepository;

    public function __construct(OTPRequestRepository $otpRequestRepository)
    {
        $this->otpRequestRepository = $otpRequestRepository;
    }

    /**
     * Display a listing of the OTP Request.
     *
     * @param Request $request
     * @return Response
     */
    public function report(Request $request)
    {
        $this->otpRequestRepository->pushCriteria(new RequestCriteria($request));
        $otpRequests = $this->otpRequestRepository->getClientActivePaginated(25, 'id', 'desc');

        $count = $this->otpRequestRepository->clientCount();

        return view('backend.requests.client')
            ->withMessage('No record')->withQuery('')->withQuery2('')->withQuery3('')
            ->with('count', $count)
            ->with('otpRequests', $otpRequests);
    }

    /**
     * Search a listing of the OTP Request.
     *
     * @param Request $request
     * @return Response
     */
    public function search(Request $request)
    {
        if (empty($request->all())) {
            return redirect()->back();
        }

        $input = $request->all();

        $startDate = date("Y-m-d", strtotime($request->input('txtStartDate')) );
        $endDate = date("Y-m-d", strtotime($request->input('txtEndDate')) );

        $request->session()->put('txtStartDate', $startDate);
        $request->session()->put('txtEndDate', $endDate);

        $startDateTime = $startDate . " 00:00:00";
        $endDateTime = $endDate . " 23:59:59";

        $this->otpRequestRepository->pushCriteria(new RequestCriteria($request));

        if ($input['txtStartDate'] != '' && $input['txtEndDate'] != '' && $input['q'] != '') {

            $otpRequests = RequestLog::Where('to', 'LIKE', '%' . $input['q'] . '%')
                ->WhereBetween('created_at', array($startDateTime, $endDateTime))
                ->where('merchant_id', Auth::user()->merchants->id)
                ->orderBy('id', 'desc')->paginate(15);

            $count = RequestLog::Where('to', 'LIKE', '%' . $input['q'] . '%')
                ->WhereBetween('created_at', array($startDateTime, $endDateTime))
                ->where('merchant_id', Auth::user()->merchants->id)
                ->orderBy('id', 'desc')->count();

        } elseif ($input['txtStartDate'] != '' && $input['txtEndDate'] != '' && $input['q'] == ''){

            $otpRequests = RequestLog::WhereBetween('created_at', array($startDateTime, $endDateTime))
                ->where('merchant_id', Auth::user()->merchants->id)
                ->orderBy('id', 'desc')->paginate(15);

            $count = RequestLog::WhereBetween('created_at', array($startDateTime, $endDateTime))
                ->where('merchant_id', Auth::user()->merchants->id)
                ->orderBy('id', 'desc')->count();

        } elseif ($input['txtStartDate'] == '' && $input['txtEndDate'] == '' && $input['q'] != '') {

            $otpRequests = RequestLog::Where('to', 'LIKE', '%' . $input['q'] . '%')
                ->where('merchant_id', Auth::user()->merchants->id)
                ->orderBy('id', 'desc')->paginate(15);

            $count = RequestLog::Where('to', 'LIKE', '%' . $input['q'] . '%')
                ->where('merchant_id', Auth::user()->merchants->id)
                ->orderBy('id', 'desc')->count();

        } else {

            $otpRequests = RequestLog::where('merchant_id', Auth::user()->merchants->id)->orderBy('id', 'desc')->paginate(15);

            $count = RequestLog::where('merchant_id', Auth::user()->merchants->id)->orderBy('id', 'desc')->count();

        }



        // if ($input['txtStartDate'] != '' && $input['txtEndDate'] != '') {

        //     $otpRequests = RequestLog::
        //         Where(function ($query) use ($startDateTime, $endDateTime) {
        //             $query->WhereBetween('created_at', array($startDateTime, $endDateTime));
        //         })->Where(function ($query) use ($input) {
        //             $query->Where('request_id', 'LIKE', '%' . $input['q'] . '%');
        //             $query->orWhereHas('merchant', function ($query) use ($input) {
        //                 $query->Where('name', 'LIKE', '%' . $input['q'] . '%');
        //             });
        //             $query->orwhereHas('service', function ($query) use ($input) {
        //                 $query->Where('service_name', 'LIKE', '%' . $input['q'] . '%');
        //             });
        //             $query->orWhere('to', 'LIKE', '%' . $input['q'] . '%');
        //             $query->orWhere('code', 'LIKE', '%' . $input['q'] . '%');
        //             $query->orWhere('code_expiry', 'LIKE', '%' . $input['q'] . '%');
        //             $query->orWhere('b_status', 'LIKE', '%' . $input['q'] . '%');
        //             $query->orWhere('callback_status', 'LIKE', '%' . $input['q'] . '%');
        //             $query->orWhere('b_message_id', 'LIKE', '%' . $input['q'] . '%');
        //             $query->orWhere('b_to', 'LIKE', '%' . $input['q'] . '%');
        //             $query->orWhere('b_client_ref', 'LIKE', '%' . $input['q'] . '%');
        //             $query->orWhere('b_error_text', 'LIKE', '%' . $input['q'] . '%');
        //          })
        //         ->orderBy('id', 'desc')->paginate(15);

        // } elseif ($input['q'] != '') {

        //     $otpRequests = RequestLog::
        //     Where(function ($query) use ($input) {
        //         $query->Where('request_id', 'LIKE', '%' . $input['q'] . '%');
        //         $query->orWhereHas('merchant', function ($query) use ($input) {
        //             $query->Where('name', 'LIKE', '%' . $input['q'] . '%');
        //         });
        //         $query->orwhereHas('service', function ($query) use ($input) {
        //             $query->Where('service_name', 'LIKE', '%' . $input['q'] . '%');
        //         });
        //         $query->orWhere('to', 'LIKE', '%' . $input['q'] . '%');
        //         $query->orWhere('code', 'LIKE', '%' . $input['q'] . '%');
        //         $query->orWhere('code_expiry', 'LIKE', '%' . $input['q'] . '%');
        //         $query->orWhere('b_status', 'LIKE', '%' . $input['q'] . '%');
        //         $query->orWhere('callback_status', 'LIKE', '%' . $input['q'] . '%');
        //         $query->orWhere('b_message_id', 'LIKE', '%' . $input['q'] . '%');
        //         $query->orWhere('b_to', 'LIKE', '%' . $input['q'] . '%');
        //         $query->orWhere('b_client_ref', 'LIKE', '%' . $input['q'] . '%');
        //         $query->orWhere('b_error_text', 'LIKE', '%' . $input['q'] . '%');

        //     })->orderBy('id', 'desc')->paginate(15);

        // } else {

        //     $otpRequests = RequestLog::orderBy('id', 'desc')->paginate(15);

        // }

        $otpRequests->appends(array(
            'txtStartDate' => $input['txtStartDate'],
            'txtEndDate' => $input['txtEndDate'],
            'q' => $input['q']
        ))->links();

        if (count($otpRequests) > 0) {

            return view('backend.requests.client')
                ->with('otpRequests', $otpRequests)
                ->with('message', '')
                ->with('query', $input['q'])
                ->with('count', $count)
                ->with('query2', $input['txtStartDate'])
                ->with('query3', $input['txtEndDate']);

        } else {

            return view('backend.requests.client')
                ->with('otpRequests', $otpRequests)
                ->with('message', 'No Details found. Try to search again !')
                ->with('query', $input['q'])
                ->with('count', 0)
                ->with('query2', $input['txtStartDate'])
                ->with('query3', $input['txtEndDate']);
        }

    }

    /**
     * Download a listing of the OTP Request.
     *
     * @param Request $request
     * @return Response
     */
    public function download(Request $request)
    {
        if (empty($request->all())) {
            return redirect()->back();
        }

        $input = $request->all();

        $startDate = date("Y-m-d", strtotime($request->input('txtStartDate')) );
        $endDate = date("Y-m-d", strtotime($request->input('txtEndDate')) );

        $request->session()->put('txtStartDate', $startDate);
        $request->session()->put('txtEndDate', $endDate);

        $startDateTime = $startDate . " 00:00:00";
        $endDateTime = $endDate . " 23:59:59";

        // if ($input['txtStartDate'] != '' && $input['txtEndDate'] != '') {
        //     $otpRequests = RequestLog::
        //     Where(function ($query) use ($startDateTime, $endDateTime) {
        //         $query->WhereBetween('created_at', array($startDateTime, $endDateTime));
        //     })->Where(function ($query) use ($input) {
        //         $query->Where('request_id', 'LIKE', '%' . $input['q'] . '%');
        //         $query->orWhereHas('merchant', function ($query) use ($input) {
        //             $query->Where('name', 'LIKE', '%' . $input['q'] . '%');
        //         });
        //         $query->orwhereHas('service', function ($query) use ($input) {
        //             $query->Where('service_name', 'LIKE', '%' . $input['q'] . '%');
        //         });
        //         $query->orWhere('to', 'LIKE', '%' . $input['q'] . '%');
        //         $query->orWhere('code', 'LIKE', '%' . $input['q'] . '%');
        //         $query->orWhere('code_expiry', 'LIKE', '%' . $input['q'] . '%');
        //         $query->orWhere('b_status', 'LIKE', '%' . $input['q'] . '%');
        //         $query->orWhere('callback_status', 'LIKE', '%' . $input['q'] . '%');
        //         $query->orWhere('b_message_id', 'LIKE', '%' . $input['q'] . '%');
        //         $query->orWhere('b_to', 'LIKE', '%' . $input['q'] . '%');
        //         $query->orWhere('b_client_ref', 'LIKE', '%' . $input['q'] . '%');
        //         $query->orWhere('b_error_text', 'LIKE', '%' . $input['q'] . '%');
        //     })
        //         ->orderBy('id', 'desc');

        // } elseif ($input['q'] != '') {
        //     $otpRequests = RequestLog::
        //     Where(function ($query) use ($input) {
        //         $query->Where('request_id', 'LIKE', '%' . $input['q'] . '%');
        //         $query->orWhereHas('merchant', function ($query) use ($input) {
        //             $query->Where('name', 'LIKE', '%' . $input['q'] . '%');
        //         });
        //         $query->orwhereHas('service', function ($query) use ($input) {
        //             $query->Where('service_name', 'LIKE', '%' . $input['q'] . '%');
        //         });
        //         $query->orWhere('to', 'LIKE', '%' . $input['q'] . '%');
        //         $query->orWhere('code', 'LIKE', '%' . $input['q'] . '%');
        //         $query->orWhere('code_expiry', 'LIKE', '%' . $input['q'] . '%');
        //         $query->orWhere('b_status', 'LIKE', '%' . $input['q'] . '%');
        //         $query->orWhere('callback_status', 'LIKE', '%' . $input['q'] . '%');
        //         $query->orWhere('b_message_id', 'LIKE', '%' . $input['q'] . '%');
        //         $query->orWhere('b_to', 'LIKE', '%' . $input['q'] . '%');
        //         $query->orWhere('b_client_ref', 'LIKE', '%' . $input['q'] . '%');
        //         $query->orWhere('b_error_text', 'LIKE', '%' . $input['q'] . '%');

        //     })->orderBy('id', 'desc');
        // } else {

        //     $otpRequests = RequestLog::orderBy('id', 'desc');

        // }

        if ($input['txtStartDate'] != '' && $input['txtEndDate'] != '' && $input['q'] != '') {

            $otpRequests = RequestLog::Where('to', 'LIKE', '%' . $input['q'] . '%')
                ->WhereBetween('created_at', array($startDateTime, $endDateTime))
                ->where('merchant_id', Auth::user()->merchants->id)
                ->orderBy('id', 'desc');

        } elseif ($input['txtStartDate'] != '' && $input['txtEndDate'] != '' && $input['q'] == ''){

            $otpRequests = RequestLog::WhereBetween('created_at', array($startDateTime, $endDateTime))
                ->where('merchant_id', Auth::user()->merchants->id)
                ->orderBy('id', 'desc');

        } elseif ($input['txtStartDate'] == '' && $input['txtEndDate'] == '' && $input['q'] != '') {

            $otpRequests = RequestLog::Where('to', 'LIKE', '%' . $input['q'] . '%')
                ->where('merchant_id', Auth::user()->merchants->id)
                ->orderBy('id', 'desc');

        } else {

            $otpRequests = RequestLog::where('merchant_id', Auth::user()->merchants->id)->orderBy('id', 'desc');

        }

        Excel::create('Excel', function ($excel) use ($request, $otpRequests) {

            $excel->sheet('first', function ($sheet) use ($otpRequests) {
                $sheet->row(1, [
                    'ID',
                    'Start Date',
                    'End Date',
                    'Merchant Request Id',
                    'Transaction Id',
                    'Phone',
                    'Operator',
                    'Service Name',
                    'Package Name',
                    'Volume',
                    'Price',
                    'Status',
                    'Description',
                ]);

                $index = 2;

                $otpRequests->chunk(200, function ($otpRequests) use ($sheet, $index) {
                    foreach ($otpRequests as $otpRequest) {
                        $sheet->appendRow([
                            $otpRequest->id,
                            $otpRequest->created_at,
                            $otpRequest->updated_at,
                            $otpRequest->merchant_request_id,
                            $otpRequest->request_id,
                            $otpRequest->to,
                            $otpRequest->operator,
                            $otpRequest->service->service_name,
                            $otpRequest->packages->package_name,
                            $otpRequest->packages->volume,
                            $otpRequest->packages->price,
                            $otpRequest->status,
                            $otpRequest->description,
                        ]);
                    }
                });


            });

        })->download($request->input('ext'));
    }
}
