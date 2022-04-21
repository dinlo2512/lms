@extends('teacher::layouts.home')

@section('nav-list')
    <ul class="nav-list">
        <li>
            <a href="" class="{{ request()->path() ? "actived" : "" }}">
                <i class="fas fa-th-large"></i>
                <span class="links_name">Dashboard</span>
            </a>

        </li>
        <li>
            <a href="{{ route('teacher.admin.allUser') }}">
                <i class="fas fa-user"></i>
                <span class="links_name">User</span>
            </a>
        </li>
        <li>
            <a href="{{ route('teacher.admin.allTeacher') }}">
                <i class="fas fa-graduation-cap"></i>
                <span class="links_name">Teacher</span>
            </a>

        </li>
        <li>
            <a href="{{ route('teacher.admin.allNotification') }}">
                <i class="fas fa-bell"></i>
                <span class="links_name">Notifications</span>
            </a>

        </li>
        <li>
            <a href="{{ route('teacher.admin.roles') }}">
                <i class="fas fa-dice-d6"></i>
                <span class="links_name">Roles</span>
            </a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="content-top">
        <h3>Welcome </h3>
        <p>User / Create User</p>
    </div>
    <div class="content">
        <div class="main">
            <h1 class="h1">User Create</h1>
            <div class="form-group">
                <form action="{{ route('teacher.admin.storeUser') }}" method="post">
                    @csrf
                    <label for="name">
                        Name:
                    </label>
                    @error('name')
                    <p class="error">{{ $message }}</p>
                    @enderror
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    <br>
                    <label for="date_of_birth">
                        Date of Birth:
                    </label>
                    @error('date_of_birth')
                    <p class="error">{{ $message }}</p>
                    @enderror
                    <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}">
                    <br>
                    <label for="username">
                        Username:
                    </label>
                    @error('username')
                    <p class="error">{{ $message }}</p>
                    @enderror
                    <input name="username" type="text" class="form-control" value="{{ old('username') }}">
                    <br>
                    <label for="email">
                        Email:
                    </label>
                    @error('email')
                    <p class="error">{{ $message }}</p>
                    @enderror
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    <br>
                    <label for="phone_number">
                        Phone Number:
                    </label>
                    @error('phone_number')
                    <p class="error">{{ $message }}</p>
                    @enderror
                    <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}">
                    <br>
                    <label for="address">
                        Addresss:
                    </label>
                    @error('address')
                    <p class="error">{{ $message }}</p>
                    @enderror
                    <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                    <br>
                    <button class="btn btn-success" name="submit">Add</button>
                </form>
            </div>
        </div>
    </div>
    <style>
        .form-group{
            margin:10px
        }
    </style>
@endsection

