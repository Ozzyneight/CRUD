@extends('layouts.main')
@section('content')

    <form action="{{ route('user.update_password', $user->getKey()) }}" method="post" class="row g-3"
          style="border:solid 1px darkgray; border-radius: 10px; width: 80%; margin: 2% 10% 2% 10%">
        @csrf
        @method('patch')
        <div style="display: grid; grid-template-columns: 4fr 1fr"><h3 style="margin: 10px 10px 0 10px">Изменение пароля
                пользователя</h3>
            <a style="text-align: end" href="{{ route('users.index') }}">
                <button type="button" class="btn btn-primary" style="height: 90%; margin: 5% 5% 0 0">Назад</button>
            </a></div>
        <hr>
        <div class="col-12">
            <label for="inputPassword" class="form-label">Пароль</label>
            <input type="text" class="form-control" id="inputPassword" name="password" placeholder="Введите пароль"
                   value="{{ $user->getPassword() }}">
            @error('password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-12 mb-2">
            <button type="submit" class="btn btn-primary">Изменить</button>
        </div>
    </form>
@endsection
