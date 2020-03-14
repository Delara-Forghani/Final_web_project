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

@isset($house)
<!-- <script>
// $(document).ready(function(){
//     $(this).attr("value", "اضافه کردن عکس");
// }); 
</script> -->
<div class="flex-cols be-center occasions">
<div class="flex-row be-center be-start List-container">
@foreach($house as $row)
<a id="{{$row->id}}" class="flex-cols be-center listing-card">
    <div class="home-card flex-cols">
        <div class="image-holder"><img
                src="{{asset('/storage/uploadFiles/'.$row->pic)}}"
                style="height: 154px; width: 100%; border-top-left-radius: 5px; border-top-right-radius: 5px;">
            <div style="position: absolute; top: 5px; width: 33px; height: 30px; display: flex; border-top-left-radius: 5px; border-bottom-left-radius: 5px; justify-content: center; align-items: center; right: 0px; color: rgb(255, 255, 255);">
                <!-- <div style="width: 100%; height: 100%; z-index: 1; position: absolute; background-color: rgb(255, 186, 0); border-top-left-radius: 5px; border-bottom-left-radius: 5px;"></div> -->
                @if($access=="admin")
                <a cless="flex-row" style="width: 30px; height: 30px;" href="{!! route('star', ['id'=>$row->id,'access'=>$access]) !!}"><img style="width: 30px; height: 30px;" src="{{url('/Pics/star.jpg')}}" style="z-index: 2;"/></a> 
                @endif    
            </div>
            <div class="flex-row be-end space-between image-info">
                <div class="flex-cols"><span class="home-location">{{$row->location}}</span><span class="image-info-title">{{$row->title}}</span>
                </div>
            </div>
        </div>
        <div class="flex-row be-center home-property">
            <div class="flex-row be-center justify-center single-info" style="color: rgb(81, 124, 251);">{{$row->created_at}}</div>
            <div class="flex-row be-center justify-center single-info">{{$row->bedrooms}}خوابه</div>
            <div class="flex-row be-center justify-center single-info">{{$row->area}}متر</div>
            <div class="flex-row be-center justify-center single-info">{{$row->type}}</div>
        </div>
        <div class="flex-row space-between price-holder">
            <div class="flex-cols" style="flex: 1 1 0%;">
                <div class="flex-row single-price">
                    <div class="flex-row be-center price-text">قیمت:</div>
                    <span class="price-amount">{{$row->price}} میلیارد تومان </span></div>
                <div class="flex-row single-price">
                    <div class="flex-row be-center price-text">متر مربع:</div>
                    <span class="price-amount">{{round($row->price*(1000)/$row->area)}} میلیون تومان</span></div>
            </div>
            <div class="flex-cols be-center just-around"><img class="estate"
                                                              src="{{url('/pics/estate.jpg')}}"><span
                    class="estate-name">{{$row->estate}}</span></div>
        </div>
    </div>
</a>        
@endforeach
</div> 
@endisset
</div>
</body>
</html>