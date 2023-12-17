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
                    <div id="show_success_alert"></div>
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
<script>
    $(function(){
        $("#register_form").submit(function(e){
            e.preventDefault();
            $("#register_btn").text('Please wait...');
            $.ajax({
                url:  '{{route('auth.register')}}',
                method: 'post',
                data: $(this).serialize(),
                // datatype:  'json',
                success: function(res){
                    showError('name',res.messages.name);
                    showError('email',res.messages.email);
                    showError('password',res.messages.password);
                }else if(res.status == 200 ){
                    $("#show_success_alert").html(showMessage('success', res.message));
                    $("#register_form")[0].reset();
                    removeValidationClasses("#register_form");
                    $("#register_btn").val('register');
                }
            })
        });
    });
</script>
@endsection  