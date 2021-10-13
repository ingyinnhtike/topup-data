<div class="wrapper2">
    <div class="div2">
        <table class="no-print table table-condensed table-hover" id="merchants-table">
    <thead>
    <tr>
        <th>Merchant ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Confirmation Code</th>
        <th>Confirmed</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    @if(!$merchants->isEmpty())
        @foreach($merchants as $merchant)
            <tr>
                <td>{!! $merchant->uuid !!}</td>
                <td>{!! $merchant->name !!}</td>
                <td>{!! $merchant->address !!}</td>
                <td>{!! $merchant->phone !!}</td>
                <td>{!! $merchant->email !!}</td>
                <td>{!! $merchant->confirmation_code !!}</td>
                <td>{!! $merchant->confirmed !!}</td>
                <td>
                    {!! Form::open(['route' => ['admin.merchants.destroy', $merchant->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('admin.merchants.show', [$merchant->id]) !!}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('admin.merchants.edit', [$merchant->id]) !!}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-edit"></i></a>
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
{{ $merchants->links() }}
    </div>
</div>
