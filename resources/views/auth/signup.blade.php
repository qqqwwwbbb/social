@extends('templates.default')

@section('content')
    <div class="row">
    <div class="col-lg-4 mx-auto">
    <h1>Регистрация</h1>
    <form method="POST" action="{{ route('auth.signup') }}" novalidate>
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email"
                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email"
                   placeholder="например, test@mail.ru"
            value="{{ Request::old('email') ?: '' }}">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            @if ($errors->has('email'))
                <span class="help-block text-danger">
                    {{ $errors->first('email') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="username">Логин</label>
            <input type="text" name="username"
                   class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" id="username"
                   placeholder="username"
                   value="{{ Request::old('username') ?: '' }}">
            @if ($errors->has('username'))
                <span class="help-block text-danger">
                    {{ $errors->first('username') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" name="password"
                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password"
                   placeholder="минимум 6 символов">
            @if ($errors->has('password'))
                <span class="help-block text-danger">
                    {{ $errors->first('password') }}
                </span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Создать аккаунт</button>
    </form>
    </div>
    </div>
@endsection

