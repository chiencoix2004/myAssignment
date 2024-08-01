{{-- @extends('client.layouts.default')

@section('content')
    <div class="container ">
        <h3>Login</h3>
        @if (session('message'))
            <p class="text-danger">{{ session('message') }}</p>
        @endif

        <form action="{{ route('postLogin') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for=""></label>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
            </div>
            <div class="mb-3">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me</label>
            </div>
            <button class="btn btn-primary">Đăng Nhập</button>
        </form>
        <br>
        <div>
            <a class="btn btn-danger" href="{{ route('register') }}">Đăng ký</a>
        </div>
    </div>
@endsection --}}

@extends('client.layouts.default')
@section('content')
    <main>
        <div class="container mt-5">

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <br>
                    <br>
                    <div class="card">
                        <div style="text-align: center">
                            <h2>Login</h2>
                        </div>
                        <div class="card-body">
                            @if (session('message'))
                                <div class="alert alert-danger text-center">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <form action="{{ route('postLogin') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email"
                                        placeholder="Email">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Password">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="remember" id="remember">
                                    <label class="form-check-label" for="remember">Remember Me</label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Đăng Nhập</button>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <a class="btn btn-link" href="{{ route('register') }}">Đăng ký</a>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
