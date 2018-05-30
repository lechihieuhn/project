<!DOCTYPE html>
<html lang="en" ng-app="menuRecords">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký tài khoản</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        @if (session()->has('success_message'))
        <div class="alert alert-success">
            {{ session()->get('success_message') }}
        </div>
        @endif @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h2>Đăng ký</h2>
        <div class="spacer"></div>

        <form method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>

            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required>

            <input id="password" type="password" class="form-control" name="password" placeholder="Password" placeholder="Password" required>

            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password"
                required>

            <div class="login-container">
                <button type="submit" class="auth-button">Đăng ký</button>
            </div>

        </form>
</div>

</body>
</html>
