@extends('layouts.main')
@section('content')

    <div style="border:solid 1px darkgray; border-radius: 10px; width: 80%; margin: 2% 10% 2% 10%">
        <div style="display: grid; grid-template-columns: 4fr 1fr"><h2 style="margin: 10px 10px 0 10px">
                Категории</h2>
            <a href="{{ route('category.create') }}">
                <button type="button" class="btn btn-primary" style="height: 90%; margin: 5% 5% 0 0">Добавить
                    категорию
                </button>
            </a></div>
        <hr>
        <table class="table table-striped"
               style="border:solid 1px darkgray; border-radius: 5px; width: 98%; margin: 10px">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col" style="width: 800px">Название категории</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{ $category->getKey() }}</th>
                    <td>{{ $category->getTitle() }}</a></td>
                    <td style="display: flex; justify-content: space-evenly">
                        <a href="{{ route('category.edit', $category->getKey()) }}">
                            <button type="button" class="btn btn-secondary"
                                    style="font-size: 10pt; padding: 3px; margin: 3px">Редактировать
                            </button>
                        </a>
                        <form action="{{ route('category.destroy', $category->getKey()) }}" method="post">
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
    <div>{{ $categories->links() }}</div>
@endsection
