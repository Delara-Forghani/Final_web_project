@isset($house)
<script>
$(document).ready(function(){
    $(this).attr("value", "اضافه کردن عکس");
}); 
</script>
<div class="flex-row be-center be-start List-container">
@foreach($house as $row)
<a class="flex-cols be-center listing-card">
    <div class="home-card flex-cols">
        <div class="image-holder"><img
                src="{{ asset($row->pic)}}"
                style="height: 154px; width: 100%; border-top-left-radius: 5px; border-top-right-radius: 5px;">
            <div class="bookmark-hover" style="position: absolute; top: 7px; left: 8px; transition: all 0.3s ease 0s;">
                <i class="fa fa-bookmark" aria-hidden="true"></i></div>
            <div style="position: absolute; top: 5px; width: 33px; height: 30px; display: flex; border-top-left-radius: 5px; border-bottom-left-radius: 5px; justify-content: center; align-items: center; right: 0px; color: rgb(255, 255, 255);">
                <i class="fa fa-star" style="z-index: 12;"></i>
                <div style="width: 100%; height: 100%; z-index: 11; position: absolute; background-color: rgb(255, 186, 0); border-top-left-radius: 5px; border-bottom-left-radius: 5px;"></div>
            </div>
            <div class="flex-row be-end space-between image-info">
                <div class="flex-cols"><span class="home-location">{{$row->location}}</span><span class="image-info-title">{{$row->title}}</span>
                </div>
                <span>4 <i class="fa fa-camera-retro"></i></span></div>
        </div>
        <div class="flex-row be-center home-property">
            <div class="flex-row be-center justify-center single-info" style="color: rgb(81, 124, 251);">{{$row->created_at}}</div>
            <div class="flex-row be-center justify-center single-info">{{$row->bedrooms}}</div>
            <div class="flex-row be-center justify-center single-info">{{$row->area}}</div>
            <div class="flex-row be-center justify-center single-info">{{$row->type}}</div>
        </div>
        <div class="flex-row space-between price-holder">
            <div class="flex-cols" style="flex: 1 1 0%;">
                <div class="flex-row single-price">
                    <div class="flex-row be-center price-text">قیمت:</div>
                    <span class="price-amount">{{$row->price}}</span></div>
                <div class="flex-row single-price">
                    <div class="flex-row be-center price-text">متر مربع:</div>
                    <span class="price-amount">28.89 میلیون تومان</span></div>
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