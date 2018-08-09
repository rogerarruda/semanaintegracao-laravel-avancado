@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todos produtos</div>
                <div class="card-body">
                    <a href="{{route('admin.products.create')}}" class="btn btn-info">Criar produto</a>

                    <table class="table mt-4">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Preço</th>
                                <th scope="col">Estoque</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <th scope="row">{{$product->id}}</th>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price_br}}</td>
                                    <td>{{$product->stock}}</td>
                                    <td>
                                        <a href="{{route('admin.products.edit',$product->id)}}" class="btn btn-sm btn-primary">Editar</a>
                                        <a href="{{route('admin.products.delete',$product->id)}}" class="btn btn-sm btn-danger">Excluir</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
