@extends('layouts.app')
@section('title','Register')

@section('content')
<div class="container-fluid">
    <div class="row d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-lg-4">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="fw-bold text-secondary">Register</h2>
                </div>
                <div class="card-body p-5">
                    <form actions="#" method="POST" id="register_form">
                        @csrf  
                        <div class="mb-3">
                            <input type="Name" name="name" id="name" class="form-control rounded-0" placeholder="Full name">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" id="email" class="form-control rounded-0" placeholder="Email">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" id="password" class="form-control rounded-0" placeholder="Password">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" id="password" class="form-control rounded-0" placeholder="Confirm password">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <a class="text-decoration-none" href="">Forgot password?</a>
                        </div>
                        <div class="mb-3 d-grid">
                            <input type="submit" value="Register" class="btn btn-dark rounded-0"
                            id="register_btn">
                        </div>
                        <div class="text-center text-secondary">
                            <div>Already have a account? <a href="/" 
                            class="text-decoration-none" >Login here</a></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection  