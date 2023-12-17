@extends('layouts.app')
@section('title','Login')

@section('content')
<div class="container-fluid">
    <div class="row d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-lg-4">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="fw-bold text-secondary">Login</h2>
                </div>
                <div class="card-body p-5">
                    <form actions="#" method="POST" id="login_form">
                        @csrf  
                        <div class="mb-3">
                            <input type="email" name="email" id="email" class="form-control rounded-0" placeholder="Email">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" id="password" class="form-control rounded-0" placeholder="Password">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <a class="text-decoration-none" href="/forgot">Forgot password?</a>
                        </div>
                        <div class="mb-3 d-grid">
                            <input type="submit" value="Login" class="btn btn-dark rounded-0"
                            id="login_btn">
                        </div>
                        <div class="text-center text-secondary">
                            <div>You don't have a account? <a href="/register" 
                            class="text-decoration-none" >Register  here</a></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $("#login_form").submit(function(e){
        e.preventDefault()
        $("#login_btn").val('Please wait...');
        $.ajax({
            url: '{{ route('auth.login')}}',
            method: 'post',
            data: $(this).serialize(),
            dataType:  'json',
            success:  function(res){
                console.log(res);
            }
        })
    })
</script>
@endsection  