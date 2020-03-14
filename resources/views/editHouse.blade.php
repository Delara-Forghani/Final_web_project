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
    <div class="container flex-row be-center justify-center">
        <div class="row">
        <h5 style="color:green; margin-left:30px; margin-top:20px;">  
            مشاهده لیست خانه های شما
        </h5> 
        @if(isset($house)) 
        <form method="post" action="{{route('select')}}" class="form-horizontal flex-cols" enctype="multipart/form-data">
        {{csrf_field()}}        
            <select name="originalHome" class="title-input be-center justify-center" style="margin-bottom:30px; margin-top:20px;">
            @foreach($house as $row)
                <option value="{{$row->id}}">{{$row->title}}</option>
            @endforeach    
            </select>  
            <input type="submit" id="upload" value="انتخاب خانه" class="btn btn-info">  
        </form>     
        @endif
        
        
    
        <form method="post" action="{{route('editInfo')}}" class="form-horizontal flex-cols" enctype="multipart/form-data">
            {{csrf_field()}}
            @if(isset($data))  
            @foreach($data as $row)
            <input class="title-input" maxlength="45" name="homeId" placeholder="عنوان آگهی را وارد نمایید" type="text" value="{{$row->id}}">        
            <input class="title-input" maxlength="45" name="title" placeholder="عنوان آگهی را وارد نمایید" type="text" value="{{$row->title}}">        
            <input class="title-input" maxlength="45" name="type" placeholder="نوع بنا" type="text" value="{{$row->type}}"> 
            <input class="title-input" maxlength="45" name="price" placeholder="قیمت بنا را وارد نمایید" type="text" value="{{$row->price}}">
            <input class="title-input" maxlength="45" name="area"  placeholder="متراژ بنا" type="text" value="{{$row->area}}">
            <input class="title-input" maxlength="45" name="bedrooms" placeholder="تعداد اتاق خواب" type="text" value="{{$row->bedrooms}}">
            <input class="title-input" maxlength="45" name="parkings" placeholder="تعداد پارکینگ" type="text" value="{{$row->parkings}}">
            <input class="title-input" maxlength="45" name="location" placeholder="محل"  type="text" value="{{$row->location}}">
            <input class="title-input" maxlength="45" name="estate" placeholder="آژانس املاک" type="text" value="{{$row->estate}}">
            <input name="userid" class="user-id" maxlength="3" value="{{Auth::user()->id}}" readonly="readonly"/>
            <input type="file" name="pic">
            <input type="submit" id="upload" value="ویرایش و اضافه کردن عکس" class="btn btn-info">
            @endforeach 
            @endif          
            <!-- <input type="submit" id="upload" value="ثبت اطلاعات جدید" class="btn btn-info" style="margin-top:10px;">  -->
        </form>
        
       
        </div>
        

    </div>
  

</body>
</html>