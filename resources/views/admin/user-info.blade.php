@extends('layouts.admin-layout')
@php
    $user_controller = new App\Http\Controllers\UpdateUserInfoController();
    $users = $user_controller->ViewRegisteredUsers();
@endphp
@guest

@else

@section('content')
    @php $user = Auth::user() @endphp

    @if(session('failed'))
        <div class="alert-danger">
            {{ session('failed') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h5>User Settings</h5>
        </div>
        <div class="card-body">
            <form id="change-userinfo-form" method="POST" enctype="multipart/form-data"
                  action="{{ action('UpdateUserInfoController@UpdateUserInfo') }}">
                {{ csrf_field() }}
                <label for="username-input">
                    <strong>Username:</strong>
                    <input name="name" id="username-input" class="input_example" type="text" value="{{ $user->name }}"
                           required>
                </label>

                <input type="hidden" name="user_id" value="{{ $user->id }}">

                <br/>
                <label>
                    <strong>Email:</strong>
                    <input name="email" class="input_example" id="email-input" type="email" value="{{ $user->email }}"
                           required>
                </label>
                <br>
                <label>
                    <strong>Password:</strong>
                    <input name="password" class="input_example" id="password-input" type="password"
                           value="{{ $user->password }}"
                           required>
                </label>
                <br>

                <input name="user_avatar" id="user_avatar" type="file">
                <img style="width: 90px;" src="/abyss/public/uploads/{!! $user->user_avatar !!}" alt=""/>
                <br>
                <input id="change-email-button" class="primary-button" value="Save" type="submit">
            </form>
            <br>
            Created at: {{  date('M j, Y', strtotime( $user->created_at )) }}
        </div>
    </div>

    <br>

    <div class="card">
        <div class="card-header">
            Hash test
        </div>
        <div class="card-body">
            <form method="POST" action="{{ action('UpdateUserInfoController@hash_test') }}">
                <input type="text" class="input_example" name="hash_test" placeholder="hash">
                <input type="submit">
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5>All registered Users</h5>
        </div>
        <div class="card-body">

            <table class="table_template">
                <thead>
                <tr>
                    <th>ID<i class="fas fa-id-card"></i></th>
                    <th>Name<i class="fas fa-file-signature"></i></th>
                    <th>Email<i class="fas fa-at"></i></th>
                    <th>Created At<i class="fas fa-calendar-alt"></i></th>
                    <th>Updated At<i class="fas fa-stopwatch"></i></th>
                    <th>Status<i class="fas fa-signal"></i></th>
                </tr>
                </thead>
                <tbody>

                @foreach($users as $user)
                    <tr>
                        <td>{!! $user->id  !!}</td>
                        <td>{!! $user->name !!}</td>
                        <td>{!! $user->email !!}</td>
                        <td>{!! $user->created_at !!}</td>
                        <td>{!! $user->updated_at !!}</td>
                        <td>Active</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <br>
        </div>
    </div>


    @endguest

@endsection