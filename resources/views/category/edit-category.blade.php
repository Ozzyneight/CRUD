@extends('layouts.app')
@section('content')

    <form action="{{ route('category.update', $category->getKey()) }}" method="post" class="row g-3"
          style="border:solid 1px darkgray; border-radius: 10px; width: 80%; margin: 2% 10% 2% 10%">
        @csrf
        @method('patch')
        <div style="display: grid; grid-template-columns: 4fr 1fr"><h3 style="margin: 10px 10px 0 10px">Отредактировать
                категорию</h3>
            <a style="text-align: end" href="{{ route('categories.index') }}">
                <button type="button" class="btn btn-primary" style="height: 90%; margin: 5% 5% 0 0">Назад</button>
            </a></div>
        <hr>
        <div class="col-12">
            <label for="inputTitle" class="form-label">Название</label>
            <input value="{{ $category->getTitle() }}" type="text" class="form-control" id="inputTitle" name="title"
                   required
                   placeholder="Введите название">
        </div>
        @error('title')
        <p class="text-danger">{{ $message }}</p>
        @enderror
        <div class="col-12 mb-2">
            <button type="submit" class="btn btn-primary">Изменить</button>
        </div>
    </form>
@endsection
