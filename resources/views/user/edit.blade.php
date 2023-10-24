@extends('layout.main')
@section('edit')
    <p class="fs-2 mt-3">Клиент</p>
    <form action="{{ route('user.update_user', $user->id) }}" method="post" class="row  col-6">
        @csrf
        @method('patch')
        <div class="form-outline mb-3">
            <label for="inputFullName" class="form-label">ФИО</label>
            <input type="text" class="form-control" placeholder="ФИО" id="inputFullName" name="full_name"
                   aria-describedby="basic-addon1" value="{{$user->full_name}}">
            @error('full_name')
            <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input " type="radio" name="gender" id="mаn" {{$gender = $user->gender != 'woman' ? "checked" : " "}}>
            <label class="form-check-label" for="mаn">
                Мужской
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="gender" id="woman" {{$gender = $user->gender == 'woman' ? "checked" : " "}}>
            <label class="form-check-label" for="woman">
                Женский
            </label>
        </div>
        <div class="form-outline mb-3">
            <label for="inputPhone" class="form-label">Номер телефона</label>
            <input value="{{$user->tel}}" placeholder="Телефон" type="text" name="tel" id="inputPhone"
                   class="form-control" data-mdb-input-mask="+7(999)999-99-99">
            @error('tel')
            <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class="col-12 mb-3">
            <label for="inputAddress" class="form-label">Адрес</label>
            <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Проспект Ленина"
                   value="{{$user->address}}">
            @error('address')
            <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class="col-12 mb-3">
            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
        </div>
    </form>


    <p class="fs-2">Автомобили</p>
    @foreach($cars as $car)
        @if($car -> user_id === $user -> id)
            <form action="{{ route('user.update_car', $car->id) }}" method="post" class="row g-3 col-6">
                @csrf
                @method('patch')
                <div class="form-outline mb-3">
                    <label for="inputStamp" class="form-label">Марка</label>
                    <input type="text" id="inputStamp" class="form-control" placeholder="Марка" name="stamp"
                           aria-describedby="basic-addon1" value=" {{$car->stamp}} ">

                </div>
                <div class="form-outline mb-3">
                    <label for="inputModel" class="form-label">Модель</label>
                    <input type="text" id="inputModel" class="form-control" placeholder="Модель" name="model"
                           aria-describedby="basic-addon1" value="{{$car->model}}">

                </div>
                <div class="form-outline mb-3">
                    <label for="inputBodyColor" class="form-label">Цвет кузова</label>
                    <input type="text" id="inputBodyColor" class="form-control" placeholder="Цвет кузова"
                           name="body_color" aria-describedby="basic-addon1" value="{{$car->body_color}}">

                </div>
                <div class="form-outline mb-3">
                    <label for="inputStateNumber" class="form-label">Гос номера</label>
                    <input type="text" class="form-control" id="inputStateNumber" placeholder="Гос номера"
                           readonly name="state_number" aria-describedby="basic-addon1" value="{{$car->state_number}} ">

                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="flexCheckDefault"
                           name="status" {{$car_status = $car -> status == 1 ? "checked" : " "}} >
                    <label class="form-check-label" for="flexCheckDefault">
                        Находится на стоянке
                    </label>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                </div>
            </form>

        @else
            @php
                continue;
            @endphp

        @endif
    @endforeach


    <form action="{{ route('user.store.car', $user->id) }}" method="post" class="row g-3 col-6">
        @csrf
        <div class="form-outline mb-3">
            <label for="inputStamp" class="form-label">Марка</label>
            <input type="text" class="form-control" placeholder="Марка" name="stamp" aria-describedby="basic-addon1"
                   id="inputStamp">
            @error('stamp')
            <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class="form-outline mb-3">
            <label for="inputModel" class="form-label">Модель</label>
            <input type="text" class="form-control" placeholder="Модель" name="model" aria-describedby="basic-addon1"
                   id="inputModel">
            @error('model')
            <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class="form-outline mb-3">
            <label for="inputBodyColor" class="form-label">Цвет кузова</label>
            <input type="text" class="form-control" placeholder="Цвет кузова" name="body_color" id="inputBodyColor"
                   aria-describedby="basic-addon1">
            @error('body_color')
            <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class="form-outline mb-3">
            <label for="inputStateNumber" class="form-label">Гос номера</label>
            <input type="text" class="form-control" placeholder="Гос номера" name="state_number"
                   aria-describedby="basic-addon1">
            @error('state_number')
            <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="status" id="inputStateNumber">
            <label class="form-check-label" for="flexCheckDefault">
                Находится на стоянке
            </label>
            @error('status')
            <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Добавить</button>
        </div>
    </form>
@endsection
