<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'name',
            'price',
            'description',
            'stock',
        ]);

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Produto cadastrado com sucesso.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->only([
            'name',
            'price',
            'description',
            'stock',
        ]);

        Product::find($id)->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Produto cadastrado com sucesso.');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product->delete()) {
            return redirect()->route('admin.products.index')->with('success', 'Produto excluído com sucesso.');
        } else {
            return redirect()->route('admin.products.index')->with('danger', 'Não foi possível excluir.');
        }
    }
}
