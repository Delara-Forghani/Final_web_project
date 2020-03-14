<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Upload File</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="
    sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
    
</head>

<body>
    <div class="container">
        <div class="row">
        <form method="post" action="{{route('upload.file')}}" class="form-horizontal" enctype="multipart/form-data">
            {{csrf_field()}}

        <input class="title-input" maxlength="45" name="title" placeholder="عنوان آگهی را وارد نمایید" type="text">        
        <input class="title-input" maxlength="45" name="type" placeholder="نوع بنا" type="text">
        <input class="title-input" maxlength="45" name="price" placeholder="قیمت بنا را وارد نمایید" type="text">
        <input class="title-input" maxlength="45" name="area"  placeholder="متراژ بنا" type="text">
        <input class="title-input" maxlength="45" name="bedrooms" placeholder="تعداد اتاق خواب" type="text">
        <input class="title-input" maxlength="45" name="parkings" placeholder="تعداد پارکینگ" type="text">
        <input class="title-input" maxlength="45" name="location" placeholder="محل"  type="text">
        <input class="title-input" maxlength="45" name="estate" placeholder="آژانس املاک" type="text">
        <input name="userid" class="user-id" maxlength="3" value="{{Auth::user()->id}}" readonly="readonly"/> 
        <input type="file" name="pic">

        <input type="submit" id="upload" value="آپلود عکس" class="btn btn-info"> 
        </form>
        </div>
        <div class="flex-row be-center justify-center">
        <a style="margin-top:10px; margin-right:15px; margin-left:15px;" class="info-button flex-row  be-center justify-center" href="{!! route('getHomes', ['id'=>Auth::user()->id,'access'=>Auth::user()->access]) !!}">مشاهده لیست خانه ها</a>
        <a style="margin-top:10px; margin-right:15px; margin-left:15px;" class="info-button flex-row  be-center justify-center" href="{!! route('goToEdit', ['id'=>Auth::user()->id]) !!}">ویرایش خانه ها</a>
        </div>

        <!-- <div class="row">
            <img src="{{asset('storage/uploadFiles/wallpaper8.jpg')}}" alt="تصویر خانه"> 
        </div> -->
    </div>


</body>
</html>