<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="./js/vue.js"></script>
    <link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="
    sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>


    <div class="flex-row be-center justify-center background-login">
        <div class="flex-row login-holder">
        <div class="pink-sidebar"></div>
        <div class="be-center justify-center flex-cols login-info-holder">
        <h1 class="edit-info"><span>ویرایش اطلاعات</span></h1>
        
        <form class="flex-cols login-form" action="/update" method="post">
            <div class="flex-cols form-line">
            <input name="name" class="email-info" value="{{Auth::user()->name}}"/>
        </div>
        <div class="flex-cols form-line">
            <input name="sirname" class="email-info" value="{{Auth::user()->sirname}}"/>
        </div>
        <div class="flex-cols form-line">
            <input name="phone" placeholder="شماره همراه" class="email-info" value="{{Auth::user()->phone}}"/>
        </div>
        <div class="flex-cols form-line">
            <input name="email" class="email-info" value="{{Auth::user()->email}}"/>
        </div>
        <button class="signup-submit-button" type="submit">ذخیره</button>

        </form>
        <div class="flex-row">        
        <a class="info-button flex-row  be-center justify-center" href="{{ route('upload.file') }}">افزودن خانه جدید</a>
        
        @if(Auth::user()->access=="admin")
        <a style="margin-right:5px;" class="info-button flex-row  be-center justify-center" href="{{ url('/main/list') }}">مشاهده لیست کاربران</a>    
        @endif
        </div>
        </div>
        </div>
        </div>
        
       
</body>
</html>