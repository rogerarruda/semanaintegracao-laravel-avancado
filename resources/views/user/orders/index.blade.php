@extends('layouts.app')

@push('scripts')
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todos pedidos</div>
                <div class="card-body">

                    <table class="table mt-4">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Produto</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Preço</th>
                                <th scope="col">Total</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <th scope="row">{{$order->id}}</th>
                                    <td>{{$order->product->name}}</td>
                                    <td>{{$order->quantity}}</td>
                                    <td>{{$order->price_unity_br}}</td>
                                    <td>{{$order->total_br}}</td>
                                    <td>
                                        <a href="{{route('user.orders.cancel', $order->id)}}" class="btn btn-sm btn-danger">Cancelar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                    <!-- Modal -->
                    <div class="modal fade" id="buy" tabindex="-1" role="dialog" aria-labelledby="buyLabel" data-backdrop="static" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="buyLabel">Comprar produto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="" method="post">
                                    <div class="modal-body">
                                        @csrf
                                        <div class="form-group">
                                            <label for="quantity">Quantidade: </label>
                                            <input type="number" name="quantity" step="1" min="1" max="" class="form-control" id="quantity" placeholder="Quantidade do produto" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary">Comprar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
