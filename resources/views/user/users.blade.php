@extends('layouts.main')
@section('users')

<form style="border:solid 1px darkgray; border-radius: 10px; width: 80%; margin: 2% 10% 2% 10%">
    <div style="display: grid; grid-template-columns: 4fr 1fr"><h2 style="margin: 10px 10px 0px 10px">Пользователи</h2>
        <a href="{{ route('user.create') }}"><button type="button" class="btn btn-primary" style="height: 90%; margin: 5% 5% 0% 0%">Добавить пользователя</button></a></div>
    <hr>
    <table class="table table-striped" style="border:solid 1px darkgray; border-radius: 5px; width: 98%; margin: 10px">
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
                <th scope="row">{{ $user -> id }}</th>
                <td><a href="{{ route('user.show', $user->id) }}">{{ $user -> last_name }}</a></td>
                <td>{{ $user -> first_name }}</td>
                <td>{{ $user -> middle_name }}</td>
                <td>{{ $user -> date_of_birthday }}</td>
                <td>{{ $user -> email }}</td>
                <td style="display: flex">
                    <a href="{{ route('user.edit', $user->id) }}"><button type="button" class="btn btn-secondary" style="font-size: 10pt; padding: 3px; margin: 3px">Edit</button></a>
                    <form action="{{ route('user.destroy', $user->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-secondary" style="font-size: 10pt; padding: 3px; margin: 3px">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</form>
@endsection
