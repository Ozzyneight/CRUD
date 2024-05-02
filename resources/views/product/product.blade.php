@extends('layouts.main')
@section('content')

    <div style="border:solid 1px darkgray; border-radius: 10px; width: 80%; margin: 2% 10% 2% 10%">
        <div style="display: grid; grid-template-columns: 4fr 1fr"><h2 style="margin: 10px 10px 0 10px">Продукт</h2>
            <a style="text-align: end" href="{{ route('products.index') }}">
                <button type="button" class="btn btn-primary" style="height: 90%; margin: 5% 5% 0 0">Назад</button>
            </a></div>
        <hr>
        <table class="table table-striped"
               style="border:solid 1px darkgray; border-radius: 5px; width: 98%; margin: 10px">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Фотография</th>
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
            <tr>
                <th scope="row">{{ $product->getKey() }}</th>
                <td><img style="height: 70px; width: 70px" src="{{ $image }}" alt="Аватар"></td>
                <td>{{ $product->getTitle() }}</td>
                <td>{{ $product->getWeight()}}</td>
                <td>{{ $product->getAmount() }}</td>
                <td>{{ $product->getCost() }}</td>
                <td>{{ $product->category->getTitle() }}</td>
                <td>{{ $product->getDateOfDelivery() }}</td>
                <td style="width: 130px">
                    <a href="{{ route('product.edit', $product->getKey()) }}">
                        <button type="button" class="btn btn-secondary"
                                style="font-size: 10pt; padding: 3px; margin: 3px; width: 116px">Редактировать
                        </button>
                    </a>
                    <form action="{{ route('product.destroy', $product->getKey()) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-secondary"
                                style="font-size: 10pt; padding: 3px; margin: 3px; width: 116px">Удалить
                        </button>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
