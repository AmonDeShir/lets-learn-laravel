@foreach ($users as $user)
    <h1>{{$user['name']}}</h1>
    <h3>is {{$user['age']}} years old</h3>

    @if ($user['age'] < 18)
        <h3 style='color: red'>and can't drive! What a <b>brat</b> XD</h3>
    @endif

    <hr>
@endforeach


@copyright {{ date('Y') }}
