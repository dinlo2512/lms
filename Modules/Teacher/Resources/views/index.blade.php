@extends('teacher::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('teacher.name') !!}
    </p>
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault();
       document.getElementById('logout-form').submit();"><i
            class="fas fa-sign-out-alt"></i>
        <div class="name">LOG OUT</div>
    </a>
    <form id="logout-form" action="{{ route('teacher.logout') }}" method="POST" class="d-none">
        @csrf
    </form>
@endsection
