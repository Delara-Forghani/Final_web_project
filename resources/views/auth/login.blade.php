<!DOCTYPE html>
<html>
<head>
    <link href="{{url('css/style.css')}}" type="text/css" rel="stylesheet"/>
    <link href="{{url('css/app.css')}}" type="text/css" rel="stylesheet"/>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        function changeToSignup() {
            $("#login").css({'color': 'rgba(170,170,170,.7)', 'border-right': '1px solid rgba(170,170,170,.7)'});
            $("#signup").css({'color': '#b30753', 'border-right': '1px solid #b30753'});
            $("#the-form").attr('action','{{url('/register2')}}');
            var inputs = ['نام', 'نام خانوادگی','رمز عبور','شماره همراه','ایمیل'];
            var names = ['name', 'sirname', 'password','phone','email'];
            var types = ['text', 'text','password' ,'text', 'email'];
            var holder = $('<div>' + '</div>');
            holder.addClass("flex-cols be-center");
            for (let i = 0; i < inputs.length; i++) {
                var formContainer = $('<div>' + '</div>');
                formContainer.addClass("flex-cols form-line");
                var formInput = $('<input />');
                formInput.addClass("data-input");
                formInput.attr('type', types[i]);
                formInput.attr('name', names[i]);
                formInput.attr('value', '');
                formInput.attr('size', '30');
                formInput.attr('placeholder', inputs[i]);
                if(i!=3){
                formInput.prop('required', true);
                }
                formInput.appendTo(formContainer);
                formContainer.appendTo(holder);
            }
            var resume = $('<div class="flex-row be-center justify-center terms"><div class="flex-row"><input class="flex-row checkbox-button" type="checkbox" name="accept" required><span class="flex-row be-center" id="get-news">دریافت خبرنامه</span></input><span class="flex-row be-center justify-center term-statement">ثبت نام به معنی قبول  <a class="term-link">&nbsp قوانین و مقررات &nbsp</a> می باشد.</span></div></div><button class="signup-submit-button justify-center be-center" type="submit">ارسال</button>');

            resume.appendTo(holder);
            $("#the-form").html(holder);
        }

        function changeToLogin() {
            $("#signup").css({'color': 'rgba(170,170,170,.7)', 'border-right': '1px solid rgba(170,170,170,.7)'});
            $("#login").css({'color': '#b30753', 'border-right': '1px solid #b30753'});
            var inputs = ['شماره همراه یا ایمیل', 'رمز عبور'];
            var names = ['email', 'password'];
            var types = ['email', 'password'];
            var holder = $('<div>' + '</div>');
            holder.addClass("flex-cols be-center");
            for (let i = 0; i < inputs.length; i++) {
                var formContainer = $('<div>' + '</div>');
                formContainer.addClass("flex-cols form-line");
                var formInput = $('<input />');
                formInput.addClass("data-input");
                formInput.attr('type', types[i]);
                formInput.attr('name', names[i]);
                formInput.attr('value', '');
                formInput.attr('size', '30');
                formInput.attr('placeholder', inputs[i]);
                formInput.prop('required', true);
                formInput.appendTo(formContainer);
                formContainer.appendTo(holder);
            }
            var resume = $('<div class="flex-cols be-center justify-center forgot-password"><span>آیا رمز خود را <a class="forgot-link">فراموش کرده اید؟</a></span></div><button class="form-submit-button" type="submit">ارسال</button>');
            resume.appendTo(holder);
            $("#the-form").html(holder);

        }

    </script>
</head>
<body>
<div class="flex-row be-center justify-center background-login">
    <div class="flex-row login-holder">
        <div class="cross-holder flex-cols be-center justify-center"><a class="flex-row be-center justify-center"
                                                                        href="{{ url('/hello') }}"><img class="cross"
                                                                                                src="{{url('/pics/cross.png')}}"/></a>
        </div>
        <div class="pink-sidebar"></div>
        <div class="flex-cols login-info-holder">
            <div class="login-title"><span id="login" class="login-word">ورود</span>
                <script>
                    $("#login").click(function () {
                        changeToLogin();
                    });
                </script>
                <span id="signup" class="signup-word">ثبت نام</span>
                <script>
                    $("#signup").click(function () {

                        changeToSignup();
                    });
                </script>

            </div>



            @if(isset(Auth::user()->email))
                <script>window.location="/main/successlogin";</script>          
            @endif

            @if ($message = Session::get('error'))
                <div  class="alert alert-danger alert-block">
                    <button type=button class="close" data-dismiss="alert">x</button>
                    <strong>{{ $message }}</strong>
                </div>

            @endif
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li> {{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form id="the-form" class="flex-cols login-form" action="{{ url('/main/checklogin') }}" method="post">
                {{csrf_field()}}
                <script>
                    changeToLogin();
                </script>
            </form>
        </div>
    </div>
</div>
</body>
</html>