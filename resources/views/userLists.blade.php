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
    @isset($users)
    <div class="flex-row be-center be-start List-container">
    @foreach($users as $row)
        <ul class="flex-row be-center be-start List-container">
            <li class="flex-row be-center be-start List-container">{{$row->name}} {{$row->sirname}} <a style="margin-right:15px; margin-left:15px;" class="info-button flex-row  be-center justify-center" href="{!! route('promote', ['id'=>$row->id]) !!}">ارتقا کاربر</a>
            <a style="margin-right:15px; margin-left:15px;" class="info-button flex-row  be-center justify-center" href="{!! route('delete', ['id'=>$row->id]) !!}">حذف کاربر</a></li>
        </ul>    
    @endforeach    
    </div>
    @endisset
</body>
</html>