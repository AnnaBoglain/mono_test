@extends('layout.main')
@section('login')

    <form method="post" action="{{ route('user.login', $user->id) }}">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Адрес электронной почты</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('email')}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="exampleInputPassword1" value="">
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>

@endsection
