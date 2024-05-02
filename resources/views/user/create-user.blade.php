@extends('layouts.main')
@section('content')
    <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data" class="row g-3"
          style="border:solid 1px darkgray; border-radius: 10px; width: 80%; margin: 2% 10% 2% 10%">
        @csrf
        <div style="display: grid; grid-template-columns: 4fr 1fr"><h3 style="margin: 10px 10px 0 10px">Добавить
                пользователя</h3>
            <a style="text-align: end" href="{{ route('users.index') }}">
                <button type="button" class="btn btn-primary" style="height: 90%; margin: 5% 5% 0 0">Назад</button>
            </a></div>
        <hr>
        <div class="col-12">
            <label for="inputLastName" class="form-label">Фамилия</label>
            <input value="{{ old('last_name') }}" type="text" class="form-control" id="inputLastName" name="last_name"
                   required
                   placeholder="Введите фамилию">
            @error('last_name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-12">
            <label for="inputFirstName" class="form-label">Имя</label>
            <input value="{{ old('first_name') }}" type="text" class="form-control" id="inputFirstName"
                   name="first_name" required
                   placeholder="Введите Имя">
            @error('first_name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-12">
            <label for="inputMiddleName" class="form-label">Отчество</label>
            <input value="{{ old('middle_name') }}" type="text" class="form-control" id="inputMiddleName"
                   name="middle_name"
                   placeholder="Введите отчество">
        </div>
        <div class="col-12">
            <label for="inputDateOfBirthday" class="form-label">Дата рождения</label>
            <input value="{{ old('date_of_birthday') }}" type="date" class="form-control" id="inputDateOfBirthday"
                   name="date_of_birthday" required
                   placeholder="Введите дату рождения">
            @error('date_of_birthday')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-12">
            <label for="inputEmail" class="form-label">Почта</label>
            <input value="{{ old('email') }}" type="text" class="form-control" id="inputEmail" name="email" required
                   placeholder="Введите почту">
            @error('email')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-12">
            <label for="inputPassword" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="inputPassword" name="password" required
                   placeholder="Введите пароль">
            @error('password')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Загрузить аватар</label>
            <input value="{{ old('image') }}" class="form-control" type="file" id="image" name="image" required>
            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-12 mb-2">
            <button type="submit" class="btn btn-primary">Добавить</button>
        </div>
    </form>
@endsection
