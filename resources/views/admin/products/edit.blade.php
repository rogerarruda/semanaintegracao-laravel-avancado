@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar produto</div>
                <div class="card-body">

                    <form action="{{route('admin.products.update', $product->id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nome: </label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Nome do produto" value="{{$product->name}}" required>
                        </div>
                        <div class="input-group mb-3">
                            <label for="price">Preço: </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">R$</span>
                                </div>
                                <input type="number" name="price" step="0.01" min="0" class="form-control" id="price" placeholder="Preço do produto" value="{{$product->price}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Descrição: </label>
                            <textarea name="description"class="form-control" id="description" placeholder="Descrição do produto" required>{{$product->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="stock">Estoque: </label>
                            <input type="number" name="stock" step="1" min="1" class="form-control" id="stock" placeholder="Estoque do produto" value="{{$product->stock}}" required>
                        </div>
                        <button type="submit" class="btn btn-success">Salvar</button>
                        <a href="{{route('admin.products.index')}}" class="btn btn-secondary">Voltar</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
