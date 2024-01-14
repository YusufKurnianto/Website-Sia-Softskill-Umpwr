@extends('layouts.main')

@section('contents')
    <div class="d-flex justify-content-center align-items-center vh-100" style="background-color: #ADD8E6;">
        <div class="card" style="width: 60rem; height: 40rem;">
            <div class="d-flex align-items-center mb-3 pb-1">
                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                <span class="h1 fw-bold mb-0" style="font-size: 3em;">LOGIN</span>
            </div>
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-body">
                <form method="post" action="/">
                    @csrf
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label" style="font-size: 2em;">Email</label>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" style="font-size: 2em;">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label" style="font-size: 2em;">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" style="font-size: 2em;">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary" style="font-size: 2em;">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
