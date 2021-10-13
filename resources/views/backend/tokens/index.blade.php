@extends('layouts.app')

@section('content')
    <div id="app">
        <section class="content-header">
            <h1 class="pull-left">Tokens</h1>
            <h1 class="pull-right">
                <a href="javascript:;" onclick="$('#modal-create-token').modal('show')"
                   class="btn btn-success btn-xs">Create Token</a>

            </h1>
        </section>
        <div class="content">
            <div class="clearfix"></div>

            @include('flash::message')

            <div class="clearfix"></div>
            <div class="box box-primary">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="card-header">
                            <tr>
                                <th>Merchants</th>
                                <th>token_type</th>
                                <th>expires_in</th>
                                <th>access_token</th>
                                <th>refresh_token</th>
                                <th>{{ __('labels.general.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody class="card-body">
                            @if(!$passwordGrantTokens->isEmpty())
                                @foreach($passwordGrantTokens as $passwordGrantToken)
                                    <?php $tokens = json_decode($passwordGrantToken->tokens);?>
                                    <tr>
                                        <td>{!! $passwordGrantToken->merchants->name !!}</td>
                                        <td>{!! $tokens->token_type !!}</td>
                                        <td>{!! $tokens->expires_in !!}</td>
                                        <td>{!! $tokens->access_token !!}</td>
                                        <td>{!! $tokens->refresh_token !!}</td>
                                        <td>
                                            {{--{!! Form::open(['route' => ['admin.merchants.destroy', $passwordGrantToken->id], 'method' => 'delete']) !!}--}}
                                            <div class='btn-group'>
                                                <a href="{!! route('admin.tokens.show', [$passwordGrantToken->id]) !!}" class='btn btn-default btn-xs'><i
                                                            class="glyphicon glyphicon-eye-open"></i></a>
                                                {{--<a href="{!! route('admin.merchants.edit', [$passwordGrantToken->id]) !!}" class='btn btn-default btn-xs'><i--}}
                                                            {{--class="glyphicon glyphicon-edit"></i></a>--}}
{{--                                                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                                            </div>
{{--                                            {!! Form::close() !!}--}}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                {{ $message }}
                            @endif
                            </tbody>
                        </table>
                        {{ $passwordGrantTokens->links() }}
                    </div><!--table-responsive-->
                </div>
            </div>
            <div class="text-center">

            </div>
        </div>

        <div class="modal fade" id="modal-create-token" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title">
                            Create Token
                        </h4>
                    </div>

                    <div class="alert alert-danger" v-if="form.errors.length > 0">
                        <p><strong>Whoops!</strong> Something went wrong!</p>
                        <br>
                        <ul>
                            <li v-for="error in form.errors">
                                @{{ error }}
                            </li>
                        </ul>
                    </div>

                    <!-- Create Token Form -->
                    <form action="{{ route('admin.tokens.store') }}" method="POST" class="form-horizontal" role="form">
                        @csrf
                        <div class="modal-body">

                            <!-- Email -->
                            <div class="form-group">
                                <label class="col-md-4 control-label">Merchant Email</label>

                                <div class="col-md-6">
                                    <input type="email" name="email" class="form-control" v-model="tokens.email" placeholder="email" required title="You need to provide a number in the form of integer">
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <label class="col-md-4 control-label">Merchant Password</label>

                                <div class="col-md-6">
                                    <input type="password" name="password" class="form-control" v-model="tokens.password"
                                           placeholder="password" required>
                                </div>
                            </div>

                        </div>

                        <!-- Modal Actions -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
{{--                            @click="createToken"--}}
                            <button type="submit" class="btn btn-primary">
                                Create
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('after-scripts')
    <script>

        $(function () {

            var aaa = new Vue({
                el: '#aaa',
                data: {
                    message: "hello"
                }
            });


            var app = new Vue({
                el: '#app',
                data: {
                    tokens: {
                        email: '',
                        password: ''
                    },
                    hasError: true,
                    hasDeleted: true
                },
                methods: {
                    createToken: function () {

                        var self = this;
                        axios.post('{{ route('admin.tokens.store') }}', this.tokens).then(function (response) {

                            $('#modal-create-token').modal('hide');

                            location.reload();
                        });

                    }

                }
            });
        });


    </script>
@endsection
