@extends('templates.default')

@section('content')
    <div class="row">

        <div class="col-lg-6">
            @include('user.partials.userblock')
        </div>

        <div class="col-lg-4 col-lg-offset-3">
            <h4>Друзья {{ $user->getFirstNameOrUsername() }}</h4>

            @if (!$user->friends()->count())
                <p>{{ $user->getFirstNameOrUsername() }} ни с кем не дружит :(</p>
            @else
                @foreach($user->friends() as $user)
                    @include('user.partials.userblock')
                @endforeach
            @endif

        </div>

    </div>
@endsection

