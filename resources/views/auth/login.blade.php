@extends('auth.layout')

@section('meta')
@endsection

@section('title')
    Login
@endsection

@section('content')
    <div class="brand" style="margin-top:150px;">
        <a class="link" href="{{ route('home') }}">{{ _site_title() }}</a>
    </div>
    <form action="{{ route('signin') }}" name="form" id="form" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <h2 class="login-title">Log in</h2>
        <div class="form-group">
            <div class="input-group-icon right">
                <div class="input-icon"><i class="fa fa-envelope"></i></div>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" autocomplete="off">
                <span class="kt-form__help error email"></span>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group-icon right">
                <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                <input class="form-control" type="password" name="password" placeholder="Password">
                <span class="kt-form__help error password"></span>
            </div>
        </div>
        <div class="form-group d-flex justify-content-between">
            <a href="forgot_password.html">Forgot password?</a>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-info btn-block">Login</button>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        $(document).ready(function (e) {
            var form = $('#form');
            $('.kt-form__help').html('');
            form.submit(function(e) {
                $('.help-block').html('');
                $('.m-form__help').html('');
                $.ajax({
                    url : form.attr('action'),
                    type : form.attr('method'),
                    data : form.serialize(),
                    dataType: 'json',
                    async:false,
                    success : function(json){
                        return true;
                    },
                    error: function(json){
                        if(json.status === 422) {
                            e.preventDefault();
                            var errors_ = json.responseJSON;
                            $('.kt-form__help').html('');
                            $.each(errors_.errors, function (key, value) {
                                $('.'+key).html(value);
                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection
