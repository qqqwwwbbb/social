@extends('templates.default')

@section('content')
    <div class="row">

        <div class="col-lg-6">
            <h3>Ваши друзья</h3>

            @if (!$friends->count())
                <p>Вы ни с кем не дружите :(</p>
            @else
                @foreach($friends as $user)
                    @include('user.partials.userblock')
                @endforeach
            @endif

        </div>

        <div class="col-lg-6">
            <h3>Запросы в друзья</h3>
        </div>

    </div>
@endsection
