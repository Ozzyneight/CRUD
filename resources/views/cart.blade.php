@extends('layouts.app')
@section('content')

    <div style="border:solid 1px darkgray; border-radius: 10px; width: 80%; margin: 2% 10% 2% 10%">
        <div style="display: grid; grid-template-columns: 4fr 1fr"><h2 style="margin: 10px 10px 0 10px">
                Корзина</h2>
            <a style="text-align: end" href="{{ route('products.index') }}">
                <button type="button" class="btn btn-primary" style="height: 90%; margin: 5% 5% 0 0">К продуктам
                </button>
            </a>
        </div>
        <hr>

        @if(count($products) <= 0)
            <h4 style="padding-left: 20px; color: #718096">Ваша корзина пуста</h4>
        @else
        <table class="table table-striped"
               style="border:solid 1px darkgray; border-radius: 5px; width: 98%; margin: 10px; text-align: center">
            <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Вес, г</th>
                <th scope="col">Стоимость, руб.</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td><a href="{{ route('product.show', $product->getKey()) }}">{{ $product->getTitle() }}</a></td>
                    <td>{{ $product->getWeight()}}</td>
                    <td>{{ $product->getCost() }}</td>
                    <td>
                        <form action="{{ route('cart.destroy_product', $product->getKey()) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-secondary"
                                    style="font-size: 10pt; padding: 3px; margin: 3px">Убрать
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            @endif
    </div>
    @if(count($products) <= 0)@else
        <h3 style="position: relative; top: -20px; left: 72.2%">Итого: {{ $cost }} руб.</h3>
    <form action="{{ route('cart.destroy') }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger" style="position: relative; top: -20px; left: 11%">Очистить корзину</button>
    </form>
    <form action="{{ route('order.store') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-success" style="position: relative; top: -37px; left: 72.2%; width: 300px">Оформить заказ</button>
    </form>
    @endif
@endsection
