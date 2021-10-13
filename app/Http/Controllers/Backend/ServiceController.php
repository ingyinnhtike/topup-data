<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreateServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Merchants;
use App\Models\Packages;
use App\Repositories\ServiceRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ServiceController extends AppBaseController
{
    /** @var  ServiceRepository */
    private $serviceRepository;

    public function __construct(ServiceRepository $serviceRepo)
    {
        $this->serviceRepository = $serviceRepo;
    }

    /**
     * Display a listing of the Service.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->serviceRepository->pushCriteria(new RequestCriteria($request));
        $services = $this->serviceRepository->getActivePaginated(25, 'id', 'asc');

        return view('backend.services.index')
            ->withMessage('No record')
            ->with('services', $services);
    }

    /**
     * Show the form for creating a new Service.
     *
     * @return Response
     */
    public function create()
    {
        $merchants = Merchants::all();
        $packagesMPT = Packages::where('operator','MPT');
        $packagesOoredoo = Packages::where('operator','Ooredoo');
        $packagesTelenor = Packages::where('operator','Telenor');
        $packagesMytel = Packages::where('operator','Mytel');

        return view('backend.services.create')
                ->with('merchants', $merchants)
                ->with('packagesMPT', $packagesMPT)
                ->with('packagesOoredoo', $packagesOoredoo)
                ->with('packagesTelenor', $packagesTelenor)
                ->with('packagesMytel', $packagesMytel);
    }

    /**
     * Store a newly created Service in storage.
     *
     * @param CreateServiceRequest $request
     *
     * @return Response
     */
    public function store(CreateServiceRequest $request)
    {
        $input = $request->all();

        $service = $this->serviceRepository->create($input);

        Flash::success('Service saved successfully.');

        return redirect(route('admin.services.index'));
    }

    /**
     * Display the specified Service.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $service = $this->serviceRepository->findWithoutFail($id);

        if (empty($service)) {
            Flash::error('Service not found');

            return redirect(route('admin.services.index'));
        }

        return view('backend.services.show')->with('service', $service);
    }

    /**
     * Show the form for editing the specified Service.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $service = $this->serviceRepository->findWithoutFail($id);
        $merchants = Merchants::all();
        $packagesMPT = Packages::where('operator','MPT');
        $packagesOoredoo = Packages::where('operator','Ooredoo');
        $packagesTelenor = Packages::where('operator','Telenor');
        $packagesMytel = Packages::where('operator','Mytel');

        if (empty($service)) {
            Flash::error('Service not found');

            return redirect(route('admin.services.index'));
        }

        return view('backend.services.edit',compact('service', 'merchants', 'packagesMPT', 'packagesOoredoo', 'packagesTelenor', 'packagesMytel'));
    }

    /**
     * Update the specified Service in storage.
     *
     * @param  int              $id
     * @param UpdateServiceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServiceRequest $request)
    {
        $service = $this->serviceRepository->findWithoutFail($id);

        if (empty($service)) {
            Flash::error('Service not found');

            return redirect(route('admin.services.index'));
        }
//        dd($request->all());

        $input = $request->all();


        $service = $this->serviceRepository->update($input, $id);

        Flash::success('Service updated successfully.');

        return redirect(route('admin.services.index'));
    }

    /**
     * Remove the specified Service from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $service = $this->serviceRepository->findWithoutFail($id);

        if (empty($service)) {
            Flash::error('Service not found');

            return redirect(route('admin.services.index'));
        }

        $this->serviceRepository->delete($id);

        Flash::success('Service deleted successfully.');

        return redirect(route('admin.services.index'));
    }
}
