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
        <p>Dashboard / Create Course</p>
    </div>
    <div class="content">
        <div class="main">
            <h1 class="h1">Course Create</h1>
            <div class="form-group">
            <form action="{{ route('teacher.admin.storeCourse') }}" method="post">
                @csrf
                <label for="name">
                    Name:
                </label>
                @error('name')
                <p class="error">{{ $message }}</p>
                @enderror
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                <br>
                <label for="subject">
                    Subject:
                </label>
                @error('subject')
                <p class="error">{{ $message }}</p>
                @enderror
                <input type="text" class="form-control" name="subject" value="{{ old('subject') }}">
                <br>
                <label for="description">
                    Description:
                </label>
                @error('description')
                <p class="error">{{ $message }}</p>
                @enderror
                <textarea name="description" type="text" class="form-control" rows="10">{{ old('description') }}</textarea>
                <br>
                <label for="open_date">
                    Open Date:
                </label>
                @error('open_date')
                <p class="error">{{ $message }}</p>
                @enderror
                <input type="date" class="form-control" name="open_date" value="{{ old('open_date') }}">
                <br>
                <label for="close_date">
                    Close Date:
                </label>
                @error('close_date')
                <p class="error">{{ $message }}</p>
                @enderror
                <input type="date" class="form-control" name="close_date" value="{{ old('close_date') }}">
                <br>
                <label for="teacher">Teacher:</label>
                @error('teacher')
                <p class="error">{{ $message }}</p>
                @enderror
                <select name="teacher" id="teacher" class="form-control">
                    <option value="">Select Teacher</option>
                    @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}">
                        {{ $teacher->name }}
                    </option>
                    @endforeach
                </select>
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
