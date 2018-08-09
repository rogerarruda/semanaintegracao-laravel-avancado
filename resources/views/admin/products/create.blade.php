@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cadastrar produto</div>
                <div class="card-body">

                    <form action="{{route('admin.products.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nome: </label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Nome do produto" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Preço: </label>
                            <input type="number" name="price" step="0.01" min="0" class="form-control" id="price" placeholder="Preço do produto" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Descrição: </label>
                            <textarea name="description"class="form-control" id="description" placeholder="Descrição do produto" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="stock">Estoque: </label>
                            <input type="number" name="stock" step="1" min="1" class="form-control" id="stock" placeholder="Estoque do produto" required>
                        </div>
                        <button type="submit" class="btn btn-success" name="button">Salvar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
