@extends('layouts.app')
@section('content')

    <div style="border:solid 1px darkgray; border-radius: 10px; width: 80%; margin: 2% 10% 2% 10%">
        <div style="display: grid; grid-template-columns: 4fr 1fr"><h2 style="margin: 10px 10px 0 10px">
                Пользователи</h2>
            <a href="{{ route('user.create') }}">
                <button type="button" class="btn btn-primary" style="height: 90%; margin: 5% 5% 0 0">Добавить
                    пользователя
                </button>
            </a></div>
        <hr>
        <table class="table table-striped"
               style="border:solid 1px darkgray; border-radius: 5px; width: 98%; margin: 10px">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Фамилия</th>
                <th scope="col">Имя</th>
                <th scope="col">Отчество</th>
                <th scope="col">Дата рождения</th>
                <th scope="col">Почта</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->getKey() }}</th>
                    <td><a href="{{ route('user.show', $user->getKey()) }}">{{ $user->getLastName() }}</a></td>
                    <td>{{ $user->getFirstName()}}</td>
                    <td>{{ $user->getMiddleName() }}</td>
                    <td>{{ $user->getDateOfBirthday() }}</td>
                    <td>{{ $user->getEmail() }}</td>
                    <td style="display: flex; justify-content: space-evenly">
                        <a href="{{ route('user.edit', $user->getKey()) }}">
                            <button type="button" class="btn btn-secondary"
                                    style="font-size: 10pt; padding: 3px; margin: 3px">Редактировать
                            </button>
                        </a>
                        <form action="{{ route('user.destroy', $user->getKey()) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-secondary"
                                    style="font-size: 10pt; padding: 3px; margin: 3px">Удалить
                            </button>
                        </form>
                        <a href="{{ route('user.edit_password', $user->getKey()) }}">
                            <button type="button" class="btn btn-secondary"
                                    style="font-size: 10pt; padding: 3px; margin: 3px">Изменить пароль
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div>{{ $users->links() }}</div>
@endsection
