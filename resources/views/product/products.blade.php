@extends('layouts.main')
@section('content')

    <div style="border:solid 1px darkgray; border-radius: 10px; width: 80%; margin: 2% 10% 2% 10%">
        <div style="display: grid; grid-template-columns: 4fr 1fr"><h2 style="margin: 10px 10px 0 10px">
                Продукты</h2>
            <a href="{{ route('product.create') }}">
                <button type="button" class="btn btn-primary" style="height: 90%; margin: 5% 5% 0 0">Добавить
                    продукт
                </button>
            </a></div>
        <hr>
        <table class="table table-striped"
               style="border:solid 1px darkgray; border-radius: 5px; width: 98%; margin: 10px">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Название</th>
                <th scope="col">Вес, г</th>
                <th scope="col">Количество, ед.</th>
                <th scope="col">Стоимость, руб.</th>
                <th scope="col">Категория</th>
                <th scope="col">Дата поставки</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{ $product->getKey() }}</th>
                    <td><a href="{{ route('product.show', $product->getKey()) }}">{{ $product->getTitle() }}</a></td>
                    <td>{{ $product->getWeight()}}</td>
                    <td>{{ $product->getAmount() }}</td>
                    <td>{{ $product->getCost() }}</td>
                    <td>{{ $product->category->getTitle() }}</td>
                    <td>{{ $product->getDateOfDelivery() }}</td>
                    <td style="display: flex; justify-content: space-evenly">
                        <a href="{{ route('product.edit', $product->getKey()) }}">
                            <button type="button" class="btn btn-secondary"
                                    style="font-size: 10pt; padding: 3px; margin: 3px">Редактировать
                            </button>
                        </a>
                        <form action="{{ route('product.destroy', $product->getKey()) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-secondary"
                                    style="font-size: 10pt; padding: 3px; margin: 3px">Удалить
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div>{{ $products->links() }}</div>
@endsection
