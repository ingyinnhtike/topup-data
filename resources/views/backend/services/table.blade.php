<div class="wrapper2">
    <div class="div2">
        <table class="no-print table table-condensed table-hover" id="services-table">
            <thead>
            <tr>
                <th>Merchant</th>
                <th>Service Name</th>
                <th>Service Type</th>
                <th>Callback Url</th>
                <th>Amount</th>
                <th>Mpt Package</th>
                <th>Ooredoo Package</th>
                <th>Telenor Package</th>
                <th>Mytel Package</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @if(!$services->isEmpty())
                @foreach($services as $service)
                    <tr>
                        <td>{!! $service->merchants->name !!}</td>
                        <td>{!! $service->service_name !!}</td>
                        <td>{!! $service->service_type !!}</td>
                        <td>{!! $service->CallBackUrl !!}</td>
                        <td>{!! $service->amount !!}</td>
                        <td>{!! (empty($service->packagesMPT))? '' : $service->packagesMPT->volume !!}</td>
                        <td>{!! (empty($service->packagesOoredoo))? '' : $service->packagesOoredoo->volume !!}</td>
                        <td>{!! (empty($service->packagesTelenor))? '' : $service->packagesTelenor->volume !!}</td>
                        <td>{!! (empty($service->packagesMytel))? '' : $service->packagesMytel->volume !!}</td>
                        <td>
                            {!! Form::open(['route' => ['admin.services.destroy', $service->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{!! route('admin.services.show', [$service->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                <a href="{!! route('admin.services.edit', [$service->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                {{--{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            @else
                {{ $message }}
            @endif
            </tbody>
        </table>
        {{ $services->links() }}
    </div>
</div>
