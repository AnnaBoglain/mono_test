@extends('layout.main')
@section('create')
    <p class="fs-2">Клиент</p>
    <form action="{{ route('user.store') }}" method="post" class="row g-3 col-6 needs-validation">
        @csrf
        <div class="form-outline mb-3">
            <input type="text" class="form-control" id="full_name" placeholder="ФИО" name="full_name"
                   aria-describedby="basic-addon1" value="{{old('full_name')}}">

            @error('full_name')
            <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="mаn" value="Мужской">
            <label class="form-check-label" for="mаn">
                Мужской
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="woman" value="Женский" checked>
            <label class="form-check-label" for="woman">
                Женский
            </label>
        </div>
        <div class="form-outline mb-3">
            <input placeholder="Телефон" type="text" name="tel" class="form-control"
                   data-mdb-input-mask="+7(999)999-99-99" value="{{old('tel')}}">
            @error('phone')
            <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Адрес</label>
            <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Проспект Ленина"
                   value="{{old('address')}}">
            @error('address')
            <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>

        <p class="fs-2">Автомобиль</p>

        <div class="col-12">
            <input type="text" class="form-control" placeholder="Марка" name="stamp" aria-describedby="basic-addon1"
                   value="{{old('stamp')}}">
            @error('stamp')
            <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class="col-12">
            <input type="text" class="form-control" placeholder="Модель" name="model" aria-describedby="basic-addon1"
                   value="{{old('model')}}">
            @error('model')
            <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class="col-12">
            <input type="text" class="form-control" placeholder="Цвет кузова" name="body_color"
                   aria-describedby="basic-addon1" value="{{old('body_color')}}">
            @error('body_color')
            <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class="col-12">
            <input type="text" class="form-control" placeholder="Гос номера" name="state_number"
                   aria-describedby="basic-addon1" value="{{old('state_number')}}">
            @error('state_number')
            <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class="form-check">
            <input type="hidden" name="status" value="off">
            <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="status">
            <label class="form-check-label" for="flexCheckDefault">
                Находится на стоянке
            </label>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
@endsection
