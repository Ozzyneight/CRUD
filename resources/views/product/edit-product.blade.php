@extends('layouts.app')
@section('content')

    <form action="{{ route('product.update', $product->getKey()) }}" method="post" enctype="multipart/form-data"
          class="row g-3"
          style="border:solid 1px darkgray; border-radius: 10px; width: 80%; margin: 2% 10% 2% 10%">
        @csrf
        @method('patch')
        <div style="display: grid; grid-template-columns: 4fr 1fr"><h3 style="margin: 10px 10px 0 10px">Отредактировать
                данные продукта</h3>
            <a style="text-align: end" href="{{ route('products.index') }}">
                <button type="button" class="btn btn-primary" style="height: 90%; margin: 5% 5% 0 0">Назад</button>
            </a></div>
        <hr>
        <div class="col-12">
            <label for="inputTitle" class="form-label">Название</label>
            <input value="{{ $product->getTitle() }}" type="text" class="form-control" id="inputTitle" name="title"
                   required
                   placeholder="Введите название">
            @error('title')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-12">
            <label for="inputWeight" class="form-label">Вес, г</label>
            <input value="{{ $product->getWeight() }}" type="text" class="form-control" id="inputWeight" name="weight"
                   required
                   placeholder="Введите вес">
            @error('weight')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-12">
            <label for="inputAmount" class="form-label">Количество</label>
            <input value="{{ $product->getAmount() }}" type="text" class="form-control" id="inputAmount" name="amount"
                   required
                   placeholder="Введите количество">
            @error('amount')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-12">
            <label for="inputCost" class="form-label">Стоимость</label>
            <input value="{{ $product->getCost() }}" type="text" class="form-control" id="inputCost" name="cost"
                   required
                   placeholder="Введите стоимость">
            @error('cost')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-12">
            <label for="selectCategoryId" class="form-label">Выберите категорию</label>
            <select id="selectCategoryId" name="category_id" class="form-select">
                @foreach($categories as $category)
                    <option {{ $category->getKey() ==  $product->category->getKey() ? ' selected' : ''}}
                            value="{{ $category->getKey() }}">{{ $category->getTitle() }}</option>
                @endforeach
            </select>
            @error('category_id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-12">
            <label for="inputDateOfDelivery" class="form-label">Дата поставки</label>
            <input value="{{ $product->getDateOfDelivery() }}" type="date" class="form-control" id="inputDateOfDelivery"
                   name="date_of_delivery" required>
            @error('date_of_delivery')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Загрузить фотографию</label>
            <div id="image" style="display: flex">
                <img style="margin-left:20px; height: 100px; width: 100px"
                     src="{{ $product->getFirstMediaUrl('products', 'product') }}" alt="Миниатюра">
                <input style="margin-top: 18px; margin-left: 20px; height: 38px" class="form-control" type="file"
                       name="image" required>
            </div>
            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-12 mb-2">
            <button type="submit" class="btn btn-primary">Изменить</button>
        </div>
    </form>
@endsection
