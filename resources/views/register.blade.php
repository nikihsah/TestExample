@extends('catalog')

@section('main_content')

    <div class="row">
        @if(isset($_GET['error']))
            <p class="text-danger col-sm-7" style="float: none; margin: 0 auto;">{{$_GET['error']}}</p>
        @endif
        <form class="form-group col-sm-7" action="registerValidate" method="POST" style="float: none; margin: 0 auto;">
            @csrf
            <div class="mb-3">
                <label class="mb-1" for="login">Логин:</label>
                <input type="text" name="login" class="form-control" placeholder="Введите логин" id="login"/>
            </div>
            <div class="mb-3">
                <label class="mb-1" for="email">Почта:</label>
                <input type="text" name="email" class="form-control" placeholder="Введите логин" id="email"/>
            </div>
            <div class="mb-3">
                <label class="mb-1" for="password">Пароль:</label>
                <input  type="password" name="password" class="form-control" placeholder="Введите пароль" id="password"/>
            </div>
            <button type="submit" class="btn btn-dark right">Submit</button>
        </form>
    </div>

@endsection
