@extends('layouts.app')

@push('scripts')
    <script type="text/javascript">
    $('#buy').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var url = button.data('url')
        var max = button.data('max')

        console.log(url)

        var modal = $(this)
        modal.find('form').attr('action', url)
        modal.find('input[name="quantity"]').attr('max', max)
    })
    </script>
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todos produtos</div>
                <div class="card-body">

                    <table class="table mt-4">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Preço</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <th scope="row">{{$product->id}}</th>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price_br}}</td>
                                    <td>
                                        <button data-toggle="modal" data-target="#buy" data-url="{{route('user.products.buy',$product->id)}}" data-max="{{$product->stock}}" class="btn btn-sm btn-primary">Comprar</button>
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
