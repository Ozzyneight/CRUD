@extends('layouts.app')
@section('content')

    <form action="{{ route('user.update', $user->getKey()) }}" method="post" enctype="multipart/form-data"
          class="row g-3"
          style="border:solid 1px darkgray; border-radius: 10px; width: 80%; margin: 2% 10% 2% 10%">
        @csrf
        @method('patch')
        <div style="display: grid; grid-template-columns: 4fr 1fr"><h3 style="margin: 10px 10px 0 10px">Отредактировать
                данные пользователя</h3>
            <a style="text-align: end" href="{{ route('users.index') }}">
                <button type="button" class="btn btn-primary" style="height: 90%; position: relative; top: 10%; left: -7%">Назад</button>
            </a></div>
        <hr>
        <div class="col-12">
            <label for="inputLastName" class="form-label">Фамилия</label>
            <input type="text" class="form-control" id="inputLastName" name="last_name" placeholder="Введите фамилию"
                   value="{{ $user->getLastName() }}">
            @error('last_name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-12">
            <label for="inputFirstName" class="form-label">Имя</label>
            <input type="text" class="form-control" id="inputFirstName" name="first_name" placeholder="Введите Имя"
                   value="{{ $user->getFirstName() }}">
            @error('first_name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-12">
            <label for="inputMiddleName" class="form-label">Отчество</label>
            <input type="text" class="form-control" id="inputMiddleName" name="middle_name"
                   placeholder="Введите отчество" value="{{ $user->getMiddleName() }}">
        </div>
        <div class="col-12">
            <label for="inputDateOfBirthday" class="form-label">Дата рождения</label>
            <input type="date" class="form-control" id="inputDateOfBirthday" name="date_of_birthday"
                   placeholder="Введите дату рождения" value="{{ $user->getDateOfBirthday() }}">
            @error('date_of_birthday')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-12">
            <label for="inputPhone" class="form-label">Телефон</label>
            <input value="{{ old('phone') }}" type="text" class="form-control" id="inputPhone" name="phone" required
                   placeholder="+7 (999)-999-99-99" maxlength="12">
            @error('phone')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-12">
            <label for="inputEmail" class="form-label">Почта</label>
            <input type="text" class="form-control" id="inputEmail" name="email" placeholder="Введите почту"
                   value="{{ $user->getEmail() }}">
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Изменить аватар</label>
            <div id="image" style="display: flex">
                <img style="margin-left:20px; height: 100px; width: 100px"
                     src="{{ $user->getFirstMediaUrl('avatars', 'avatar') }}" alt="Аватар">
                <input style="margin-top: 18px; margin-left: 20px; height: 38px" class="form-control" type="file"
                       name="image">
            </div>
            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="selectRole" class="form-label">Выберите роль</label>
            <select id="selectRole" name="role" class="form-select">
                @foreach($roles as $id => $role)
                    <option value="{{ $id }}" {{ $id == $user->role ? ' selected' : '' }}>{{ $role }}</option>
                @endforeach
            </select>
            @error('role')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-12 mb-2">
            <button type="submit" class="btn btn-primary">Изменить</button>
        </div>
    </form>
@endsection
