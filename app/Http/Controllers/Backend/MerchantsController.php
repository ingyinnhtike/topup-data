<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreateMerchantsRequest;
use App\Http\Requests\UpdateMerchantsRequest;
use App\Repositories\MerchantsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Webpatser\Uuid\Uuid;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\Storage;

class MerchantsController extends AppBaseController
{
    /** @var  MerchantsRepository */
    private $merchantsRepository;

    public function __construct(MerchantsRepository $merchantsRepo)
    {
        $this->merchantsRepository = $merchantsRepo;
    }

    /**
     * Display a listing of the Merchants.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->merchantsRepository->pushCriteria(new RequestCriteria($request));
        $merchants = $this->merchantsRepository->getActivePaginated(25, 'id', 'asc');

        return view('backend.merchants.index')
            ->withMessage('No record')
            ->with('merchants', $merchants);
    }

    /**
     * Show the form for creating a new Merchants.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.merchants.create');
    }

    /**
     * Store a newly created Merchants in storage.
     *
     * @param CreateMerchantsRequest $request
     *
     * @return Response
     */
    public function store(CreateMerchantsRequest $request)
    {
        $input = $request->all();

        if ($request->has('logo')) {

            $file = $request->file('logo');

            $destinationPath = 'uploads/merchants';

            $file->move($destinationPath, $file->getClientOriginalName());

            $input['logo'] = $destinationPath . '/' . $file->getClientOriginalName();
        } else {
            $array = ['logo' => ''];
            $input = array_merge($input, $array);
        }

        $input['uuid'] = Uuid::generate()->string;

        $merchants = $this->merchantsRepository->create($input);

        Flash::success('Merchants saved successfully.');

        return redirect(route('admin.merchants.index'));
    }

    /**
     * Display the specified Merchants.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $merchants = $this->merchantsRepository->findWithoutFail($id);

        if (empty($merchants)) {
            Flash::error('Merchants not found');

            return redirect(route('admin.merchants.index'));
        }

        return view('backend.merchants.show')->with('merchants', $merchants);
    }

    /**
     * Show the form for editing the specified Merchants.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $merchants = $this->merchantsRepository->findWithoutFail($id);

        if (empty($merchants)) {
            Flash::error('Merchants not found');

            return redirect(route('admin.merchants.index'));
        }

        return view('backend.merchants.edit')->with('merchants', $merchants);
    }

    /**
     * Update the specified Merchants in storage.
     *
     * @param  int              $id
     * @param UpdateMerchantsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMerchantsRequest $request)
    {
        $merchants = $this->merchantsRepository->findWithoutFail($id);

        if (empty($merchants)) {
            Flash::error('Merchants not found');

            return redirect(route('admin.merchants.index'));
        }

        $input = $request->all();

        if (is_null($request->payment_channel) || empty($request->payment_channel)) {
            $input['payment_channel'] = '';
        } else {
            $input['payment_channel'] = serialize($input['payment_channel']);
        }

        if ($request->hasFile('logo')) {

            $file = $request->file('logo');

            //Move Uploaded File
            $destinationPath = 'uploads/merchants';
            $file->move($destinationPath, $file->getClientOriginalName());

            $input['logo'] = $destinationPath . '/' . $file->getClientOriginalName();
        } else {
        }

        //        $input['payment_channel'] = json_encode($input['payment_channel']);

        // Turn the JSON string back into an array
        //        $input['payment_channel'] = json_decode($input['payment_channel'], true);

        $merchants = $this->merchantsRepository->update($input, $id);

        Flash::success('Merchants updated successfully.');

        return redirect(route('admin.merchants.index'));
    }

    /**
     * Remove the specified Merchants from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $merchants = $this->merchantsRepository->findWithoutFail($id);

        if (empty($merchants)) {
            Flash::error('Merchants not found');

            return redirect(route('admin.merchants.index'));
        }

        $this->merchantsRepository->delete($id);

        Flash::success('Merchants deleted successfully.');

        return redirect(route('admin.merchants.index'));
    }
}
