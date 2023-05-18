@extends('templates.default')

@section('content')
    <div class="row">

        <div class="col-lg-6 mt-2">
            @include('user.partials.userblock')
        </div>

        <div class="col-lg-4 col-lg-offset-3 mt-4">

            @if ( Auth::user()->hasFriendRequestPending($user) )
                <p>В ожидании {{ $user->getFirstNameOrUsername() }} подтверждения запроса в друзья.</p>

            @elseif ( Auth::user()->hasFriendRequestReceived($user) )
                <a href="{{ route('friend.accept', ['username' => $user->username]) }}" class="btn btn-primary mb-2">Подтвердить запрос о дружбе</a>
            @elseif ( Auth::user()->isFriendWith($user) )
                {{ $user->getFirstNameOrUsername() }} у Вас в друзьях.
            @elseif ( Auth::user()->id !== $user->id )
                <a href="{{ route('friend.add', ['username' => $user->username]) }}"
                   class="btn btn-primary mb-2">Добавить в друзья</a>
            @endif

            <h4>Друзья {{ $user->getFirstNameOrUsername() }}</h4>

            @if ( ! $user->friends()->count() )
                <p>{{ $user->getFirstNameOrUsername() }} ни с кем не дружит :(</p>
            @else
                @foreach($user->friends() as $user)
                    @include('user.partials.userblock')
                @endforeach
            @endif

        </div>

    </div>
@endsection

