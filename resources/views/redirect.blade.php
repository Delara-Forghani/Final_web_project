<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>سامانه خرید و فروش - رهن و اجاره مسکن | کیلید</title>
    <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
	
	
    <script>
        $.getJSON('http://hallows.ir/mags', function (data) {
            var text = $('<h2>' + '</h2>');
            text.addClass("sect-title");
            text.html(data.section);
            $(".title-display").prepend(text);
            for (var i = 0, len = data.items.length; i < len; i++) {
                var cardHolder = $('<div>' + '</div>');
                cardHolder.addClass("card-keeper flex-cols");
                var img = $('<img>');
                img.addClass("magazine-card");
                img.attr('id', data.items[i].id);
                img.attr('src', data.items[i].image);
                img.appendTo(cardHolder);
                cardHolder.appendTo(".cards-display");
                var title = $('<div>' + '</div>');
                title.addClass("flex-cols be-center caption-holder");
                var titleText = $('<span>' + '</span>');
                titleText.addClass("caption");
                titleText.html(data.items[i].title);
                titleText.appendTo(title);
                title.appendTo(cardHolder);
            }

        });
    </script>

    <script>
        function Unix_timestamp(t) {
            var dt = new Date(t * 1000);
			var now= new Date();
            var dtMonth = dt.getMonth();
			var nowMonth = now.getMonth();
			var dtYear=dt.getFullYear();
			var nowYear=now.getFullYear();
			//console.log(dtYear);
			//console.log(dtMonth);
			//console.log(nowYear);
			//console.log(nowMonth);
            return (nowMonth-dtMonth+12) + " ماه پیش ";
        }

        function createSection(data) {
            var container = $('<div>' + '</div>');
            container.addClass("flex-row be-center be-start List-container");
            for (var i = 0, len = data.items.length; i < len; i++) {
                var id = data.items[i].id;
                var cardHolder = $('<a>' + '</a>');
                cardHolder.attr('id', id);
                cardHolder.addClass("flex-cols be-center listing-card");
                var card = $('<div>' + '</div>');
                card.addClass("home-card flex-cols");
                var imageHolder = $('<div>' + '</div>');
                imageHolder.addClass("image-holder");
                var imageHome = $('<img/>');
                imageHome.attr('src', data.items[i].pic.image);
                imageHome.css({
                    "height": "154",
                    "width": "100%",
                    "border-top-left-radius": "5px",
                    "border-top-right-radius": "5px"
                });
                imageHome.appendTo(imageHolder);

                if (data.items[i].bookmarked == false) {
                    var bookmark = $('<div>' + '</div>');
                    bookmark.css({"position": "absolute", "top": "7px", "left": "8px", "transition": "all .3s ease"});
					bookmark.addClass("bookmark-hover");
                    bookmark.html('<i class="fa fa-bookmark" aria-hidden="true"></i>');
                    bookmark.appendTo(imageHolder);
                }
                if (data.items[i].star == true) {
                    var star = $('<div>' + '</div>');
                    star.css({
                        "position": "absolute",
                        "top": "5px",
                        "width": "33px",
                        "height": "30px",
                        "display": "flex",
                        "border-top-left-radius": "5px",
                        "border-bottom-left-radius": "5px",
                        "justify-content": "center",
                        "align-items": "center",
                        "right": "0",
                        "color": "#fff"
                    });
					var backGround=$('<div>'+'</div>');
					backGround.css({"width": "100%", "height": "100%", "z-index": "11", "position": "absolute","background-color": "#ffba00",
					"border-top-left-radius": "5px", "border-bottom-left-radius": "5px"});
					var fontAwesome=$('<i>'+'</i>');
					fontAwesome.addClass("fa fa-star");
					fontAwesome.css({"aria-hidden":"true","z-index":"12"});
					fontAwesome.appendTo(star);
					backGround.appendTo(star);
                    star.appendTo(imageHolder);
                }

                var imageInfo = $('<div>' + '</div>');
                imageInfo.addClass("flex-row be-end space-between image-info");
                var locationInfo = $('<div>' + '</div>');
                locationInfo.addClass("flex-cols");
                var location = $('<span>' + '</span>');
                location.html(data.items[i].location.locality);
                location.addClass("home-location");
                location.appendTo(locationInfo);
                var imageInfoText = $('<span>' + '</span>');
                imageInfoText.addClass("image-info-title");
                imageInfoText.html(data.items[i].title);
                imageInfoText.appendTo(locationInfo);
                locationInfo.appendTo(imageInfo);
                var number = $('<span>' + '</span>');
                number.html(data.items[i].pic.number + " " + '<i class="fa fa-camera-retro"></i>');

                number.appendTo(imageInfo);

                imageInfo.appendTo(imageHolder);
                imageHolder.appendTo(card);
                card.appendTo(cardHolder);
                cardHolder.appendTo(container);

                var homeProperty = $('<div>' + '</div>');
                homeProperty.addClass("flex-row be-center home-property");
                var dateInfo = $('<div>' + '</div>');
                //var currentTime=$.now();
                //var now = new Date();
                dateInfo.html(Unix_timestamp(new Date(data.items[i].created_at)));
                dateInfo.addClass("flex-row be-center justify-center single-info");
                dateInfo.css("color", "#517cfb");
                dateInfo.appendTo(homeProperty);
                var roomInfo = $('<div>' + '</div>');
                roomInfo.html(data.items[i].bedrooms + " خوابه");
                roomInfo.addClass("flex-row be-center justify-center single-info");
                roomInfo.appendTo(homeProperty);
                var areaInfo = $('<div>' + '</div>');
                areaInfo.html(data.items[i].area);
                areaInfo.addClass(" flex-row be-center justify-center single-info");
                areaInfo.appendTo(homeProperty);
                var typeInfo = $('<div>' + '</div>');
                typeInfo.html(data.items[i].type);
                typeInfo.addClass(" flex-row be-center justify-center single-info");
                typeInfo.appendTo(homeProperty);
                homeProperty.appendTo(card);

                var priceHolder = $('<div>' + '</div>');
                priceHolder.addClass("flex-row space-between price-holder");
                var priceDiv = $('<div>' + '</div>');
                priceDiv.css("flex", "1");
				priceDiv.addClass("flex-cols");
				var price = $('<div>' + '</div>');
                price.addClass("flex-row single-price");
                var priceText = $('<div>' + '</div>');
                priceText.addClass("flex-row be-center price-text");
                priceText.html("قیمت: ");
                var priceAmount = $('<span>' + '</span>');
                priceAmount.addClass("price-amount");
                priceAmount.html(parseFloat(data.items[i].price / 10000000000) + " میلیارد تومان");
				priceText.appendTo(price);
                priceAmount.appendTo(price);
				
				var unitPrice = $('<div>' + '</div>');
				unitPrice.addClass("flex-row single-price");
				priceTitle = $('<div>' + '</div>');
				priceTitle.addClass("flex-row be-center price-text");
				priceTitle.html("متر مربع: ");
			
				perunitPrice = $('<span>' + '</span>');
				perunitPrice.addClass("price-amount");
				perunitPrice.html(parseFloat(((data.items[i].price * 1000) / 10000000000) / data.items[i].area).toPrecision(4) + " میلیون تومان");
				priceTitle.appendTo(unitPrice);
				perunitPrice.appendTo(unitPrice);
			
				
                
               
                price.appendTo(priceDiv);
				unitPrice.appendTo(priceDiv);
                priceDiv.appendTo(priceHolder);
				//xsinglePrice.appendTo(priceHolder);
                priceHolder.appendTo(card);
				
				

                var estateHolder = $('<div>' + '</div>');
                estateHolder.addClass("flex-cols be-center just-around");
                var estate = $('<img/>');
                estate.addClass("estate");
                estate.attr('src', data.items[i].estate.logo);
                estate.appendTo(estateHolder);

                var estateName = $('<span>' + '</span>');
                estateName.addClass("estate-name");
                estateName.html(data.items[i].estate.name);
                estateName.appendTo(estateHolder);

                estateHolder.appendTo(priceHolder);

            }

            return container;

        }
		
	


        $.getJSON('http://hallows.ir/occasion', function (myData) {
            var text = $('<h2>' + '</h2>');
            text.addClass("sect-title");
            text.html(myData.section);

            //var firstContainer = createSection(myData);
            //$(".occasions").prepend(firstContainer);
            //$(".occasions").prepend(text);


            var buttonHolder = $('<div>' + '</div>');
            buttonHolder.addClass("flex-row justify-center be-center");
            var button = $('<a>' + '</a>');
            button.addClass("flex-row be-center justify-center info-button");
            button.html(myData.action.text);
            button.appendTo(buttonHolder);
            //$(".occasions").append(buttonHolder);

            $(".listing-card").each(function () {
                $(this).on("click", function () {
                    console.log($(this).attr('id'));
                    $.getJSON('http://hallows.ir/house/' + $(this).attr('id'), function (newData) {
						var str=newData.id;
						window.location="/main/item?id=" +str;

                    });
           
                });
            });

            buttonHolder.click(function () {
                $.getJSON(myData.action.url, function (newData) {
                    $(".occasions").append(createSection(newData));
                    $(".listing-card").each(function () {
                        $(this).off('click');
                    });

                    $(".listing-card").each(function () {
                        $(this).on("click", function () {
                            $.getJSON('http://hallows.ir/house/' + $(this).attr('id'), function (newData) {
                               var str=newData.id;
							   window.location='new.html?id='+str;
                            });
                           
                        });
                    });
                    buttonHolder.remove();
                });

            });


        });

    </script>


</head>
<body>
<div class="width-100 flex-row be-center pos-holder">
    <div class="flex-row be-center width-100 height-100 padding-rl-40">
        <div class="justify-center be-center logo-margin height-100 flex-row">
            <img id="logo" src="{{url('/pics/kilid-eng-logo.png')}}" alt="logo picture"/>
        </div>
        <div class="flex-row be-center justify-center menu-holder">
            <ul class="flex-row be-center justify-start menu-bar">
                <li class="all-cols"><a class="header-link" href="dgfb">خرید</a></li>
                <li class="all-cols"><a class="header-link" href="dgfb">رهن و اجاره</a></li>
                <li class="all-cols"><a class="header-link" href="dgfb">جستجو روی نقشه</a></li>
                <li class="all-cols"><a class="header-link" href="dgfb">ثبت رایگان آگهی</a></li>
                <li class="all-cols"><a class="header-link" href="dgfb">قیمت خانه شما</a></li>
                <li class="all-cols"><a class="header-link" href="dgfb">اطلاعات بازار مسکن</a></li>
                <li class="all-cols"><a class="header-link" href="dgfb"> آژانس های املاک</a></li>
                <li id="last-item" class="all-cols"><a class="header-link" href="dgfb"> سامانه مشاورین</a></li>
            </ul>
        </div>
        
        @if (Route::has('login'))
        <div class="flex-row be-center justify-space submit-but height-100">
            <ul class="flex-row be-center justify-center">
                <li id="submit-but-li" class="flex-row be-center justify-center">                
                    @auth
                        <a href="{{ url('/main/profile') }}">مشاهده پروفایل</a>
                    @else                     
                        <a class="flex-row be-center justify-center" href="{{ route('login') }}">
                        ورود/
                        </a>

                    @if (Route::has('register'))
                        <a class="flex-row be-center justify-center" href="{{ route('register') }}">
                        ثبت نام
                        </a>
                    @endif
                    @endauth
                </li>
            </ul>
        </div>
        @endif

       @if(isset(Auth::user()->email))
          <br />        
          <div><a id="submit-but-li" class="submit-but" href="{{url('/main/logout')}}">خروج</a></div>
        @else 
            <!-- <div><a href="{{url('/main/logout')}}">Hellllooo else</a></div> -->
            <script>window.location="{{url('/main')}}";</script>      
        
        @endif
      
    </div>
</div>
<header class="flex-cols justify-center background-img">
    <div class="container flex-cols be-center justify-center">
        <h1 class="main-heading" style="height:90px;">کیلید، سامانه هوشمند مسکن</h1>
        <div class="justify-center wrapper">
            <div class="buttons">
                <div class="flex-row be-center justify-center sell button">خرید</div>
                <div class="flex-row be-center justify-center two-other button">رهن و اجاره</div>
                <div class="flex-row be-center justify-center two-other button">قیمت خانه شما؟</div>
            </div>
            <div class="flex-row search-box-holder align-end width-100">
                <div class="flex-row be-center justify-center total-search">
                    <div class="right-search-holder">
                        <div class="flex-row be-center justify-center locate-icon"><img class="locate-icon-img"
                                                                                        src="{{url('/pics/locate.png')}}"/>
                            <form class="flex-row city-list" action="http://127.0.0.1" method="get" name="city-form">
                                تهران
                                <select class="flex-row city-option" name="city-name">
                                    <option class="flex-row city-option option-unique" value="nothing"></option>
                                    <option class="flex-row city-option option-unique" value="تهران">تهران</option>
                                    <option class="flex-row city-option option-unique" value="پردیس">پردیس</option>
                                    <option class="flex-row city-option option-unique" value="کرج">کرج</option>
                                    <option class="flex-row city-option option-unique" value="کیش">کیش</option>
                                    <option class="flex-row city-option option-unique" value="دماوند">دماوند</option>
                                    <option class="flex-row city-option option-unique" value="نوشهر">نوشهر</option>
                                    <option class="flex-row city-option option-unique" value="شهریار">شهریار</option>
                                    <option class="flex-row city-option option-unique" value="بومهن">بومهن</option>

                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="left-search-holder flex-row justify-center be-center">
                        <input class="search-input flex-row" type="text"
                               placeholder="نام محله، منطقه و یا ایستگاه مترو">
                    </div>
                </div>
                <div class="flex-row be-center justify-center search-button"><a><img
                        class="flex-row be-center justify-center search-icon" src="{{url('/pics/search.png')}}"></a></div>
            </div>
        </div>
    </div>
</header>
<div class="flex-row be-center justify-center sect-struct wrapping">
    <div class="be-start flex-cols be-center justify-center sect-struct info-width">
        <h2 class="sect-title">بازار مسکن را ارزیابی کنید</h2>
        <p class="sect-par">در بازار مسکن، داشتن اطلاعات و داده های دقیق «طلایی ترین فرصتها» را برای خریداران و سرمایه
            گذاران فراهم می کند. در کیلید این داده ها و اطلاعات پردازش شده و نتیجه پردازش در اختیار مشترکان کیلید قرار
            می گیرد. با تحلیل گذشته و رصد کردن امروز بازار مسکن، خانه آینده را بسازید.</p>
        <div class="info-button flex-row  be-center justify-center">اطلاعات بازار مسکن</div>
    </div>
    <div class="be-center flex-cols justify-center be-start">
        <img id="building" src="{{url('/pics/2.png')}}" alt="building">
    </div>
</div>
<div class="flex-row be-center justify-center sect2-struct wrapping">
    <div class="sect-right flex-cols be-center justify-center">
        <h2 class="sect-title">کیلید خود را همیشه همراه داشته باشید</h2>
        <p id="sect2-info">دریافت اپلیکیشن کیلید</p>
        <div class="flex-cols be-center justify-center">
            <div class="flex-row be-center justify-center">
                <a href="https://play.google.com/store/apps/details?id=com.kilid.portal&amp;hl=en" rel="noopener"
                   target="_blank">
                    <img class="brand-pics" src="{{url('/pics/google-play-badge.png')}}"/>
                </a>
                <a href="https://cafebazaar.ir/app/com.kilid.portal/?l=fa" target="_blank">
                    <img class="brand-pics" src="{{url('/pics/bazaar-badge.png')}}"/>
                </a>
            </div>
            <div class="flex-row be-center justify-center">
                <a href="https://sibche.com/applications/kilid" target="_blank">
                    <img class="brand-pics" src="{{url('/pics/sibche-badge-fa-300x124.png')}}"/>
                </a>

                <a href="https://sibapp.com/applications/kilid" target="_blank">
                    <img class="brand-pics" src="{{url('/pics/SibApp-badge-fa.png')}}"/>
                </a>
            </div>
        </div>
    </div>
    <div class="flex-rows be-center justify-center">
        <img id="pic1-sect-left" src="{{url('/pics/app-info-android-device-img.png')}}"/>
        <img id="pic2-sect-left" src="{{url('/pics/app-info-iphone-img.png')}}"/>
    </div>
    <div class="flex-row " id="angle-end"></div>
</div>
<div class="flex-cols be-center justify-center sect3-struct wrapping title-display">
    <!--<h2 class="sect-title">مجله کیلید را بخوانید</h2>-->
    <p class="magazine-par">کارشناسان کیلید، در مجله "کیلید" شما را با مهم ترین مسائل بازار مسکن آشنا می کنند. این مجله،
        مبتنی بر بررسی های علمی و آماری، اخبار و تحلیل های آینده بازار مسکن را در اختیارتان قرار می دهد.
    </p>
    <div id="test" class="flex-row be-center justify-center cards-display">
        <!-- script runs here-->
    </div>
    <div class="flex-row justify-center be-center">
        <a id="sect3-button" class="flex-row be-center justify-center info-button">
            مطالب بیشتر
        </a>
    </div>
</div>
<div class="flex-cols be-center occasions">
@if(isset($title))
<h2 id="title-all-home" class="sect-title">{{$title}}</h2>   
@else
<h2 id="title-all-home" class="sect-title">تمام خانه ها</h2>   
@endif    
                
    <!-- script runs here*******************************************************--> 
    <div class="flex-row be-center be-start List-container">   
    @foreach($house as $row)                            
        <a id="{{$row->id}}" href="{!! route('houseItem', ['id'=>$row->id,'userid'=>Auth::user()->id]) !!}" class="flex-cols be-center listing-card-main">
        <div class="home-card-main flex-cols">
            <div class="image-holder"><img
                    src="{{asset('storage/uploadFiles/'.$row->pic)}}"
                    style="height: 154px; width: 100%; border-top-left-radius: 5px; border-top-right-radius: 5px;">

                <div style="position: absolute; top: 5px; width: 33px; height: 30px; display: flex; border-top-left-radius: 5px; border-bottom-left-radius: 5px; justify-content: center; align-items: center; right: 0px; color: rgb(255, 255, 255);">
                @if($row->star=="1")
                    <img style="width: 30px; height: 30px;" src="{{url('/Pics/star.jpg')}}" style="z-index: 2;"/>
                @endif    
                    <div style="width: 100%; height: 100%; z-index: -11; position: absolute; background-color: rgb(255, 186, 0); border-top-left-radius: 5px; border-bottom-left-radius: 5px;"></div>
                </div>
                <div class="flex-row be-end space-between image-info">
                    <div class="flex-cols"><span class="home-location">{{$row->location}}</span><span class="image-info-title">{{$row->title}}</span>
                    </div>
                    <!-- <span>4 <i class="fa fa-camera-retro"></i></span> -->
                    </div>
            </div>
            <div class="flex-row be-center home-property">
                <div class="flex-row be-center justify-center single-info" style="color: rgb(81, 124, 251);">{{$row->created_at}}</div>
                <div class="flex-row be-center justify-center single-info">{{$row->bedrooms}} خوابه</div>
                <div class="flex-row be-center justify-center single-info">{{$row->area}} متر</div>
                <div class="flex-row be-center justify-center single-info">{{$row->type}}</div>
            </div>
            <div class="flex-row space-between price-holder">
                <div class="flex-cols" style="flex: 1 1 0%;">
                    <div class="flex-row single-price">
                        <div class="flex-row be-center price-text">قیمت:</div>
                        <span class="price-amount">{{$row->price}} میلیارد تومان</span></div>
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
</div>
<!-- search section -->
<div class="flex-row be-center justify-center sect2-struct wrapping">
    <div class="sect-right flex-cols be-center justify-center">
        <form class="flex-cols" method="post" action="{{ route('search') }}">
            <input name="location" class="email-info" placeHolder="نام محله را وارد کنید" value=""/>
            <button id="search-btn" class="comment-submit-button" type="submit">جستجو</button>
        </form>
    </div>
</div>

<!-- Comment Section :) -->
<div class="flex-row be-center justify-center sect2-struct wrapping">
    <div class="sect-right flex-cols be-center justify-center">
        <form class="flex-cols" method="post" action="{{ route('comment')}}">
            <input name="userId" style="margin-bottom:5px;" class="email-info" value="کاربر شماره ی {{Auth::user()->id}}" readonly="readonly"/>
            <input name="homeId" class="email-info" placeHolder="کد خانه را وارد کنید" value=""/>
            <textarea name="comment" class="comment-info" rows="5" cols="50">
            </textarea>
            <button class="comment-submit-button" type="submit">ثبت نظر</button>
        </form>
    </div>
</div>
<!-- last section -->
<div id="sect-last">
    <div id="pink-wall">
    </div>
    <div class="flex-cols be-center">
        <div class="flex-cols be-center sect4-struct">
            <div><img id="comp-pic" src="{{url('/pics/3.png')}}"/></div>
            <h4 id="info-title" class="sect-title">کیلید،پنجره ای نو به دنیای مسکن</h4>
            <p class="info-par">وب سایت کیلید ( شرکت کلان داده شهر فناوران ) یک سایت و اپلیکیشن آگهی و جستجو هوشمند خرید
                خانه، رهن و اجاره خانه ، ویلا، مغازه می‌باشد. تمام آژانس‌‌های معاملات املاک ( بنگاه های معاملات ملکی ) و
                مالکین شخصی ( کاربران عادی ) که قصد فروش، رهن و یا اجاره ملک دارند می‌توانند به صورت رایگان اطلاعات فایل
                های خود را مانند آگهی فروش، رهن و یا اجاره مسکن مانند آپارتمان مسکونی نوساز یا کلنگی، اداری، تجاری،
                ویلا، زمین، مغازه منتشر کنند. از مزیت‌های وب سایت و اپلیکیشن جستجو مسکن کیلید میتوان به این مورد نیز
                اشاره کرد که با استفاده از فناوری نوین و بستر اینترنت مالکان و خریداران بدون اتلاف وقت ملک مورد نظر خود
                را آگهی و اجاره، رهن یا به فروش می‌رسانند. علاوه بر جستجو مسکن ( خرید، فروش، رهن و اجاره ملک ) کاربران
                می‌توانند به اطلاعات تمام آژانس‌های معاملاتی املاک ( بنگاه‌های معاملاتی املاک ) در سراسر تهران دسترسی
                داشته باشند. به دلیل آنلاین بودن خدمات، وب سایت و اپلیکیشن کیلید محدودیتی در ارائه خدمات در سراسر ایران
                ندارد ولی در فاز اول فقط در تهران شروع به سرویس دهی کرده است و در فازهای بعدی تمام شهرهای ایران را در
                پوشش خود قرار خواهد داد. دفتر مرکزی کیلید واقع در منطقه وزرا تهران می‌باشد ولی به دلیل آنلاین بودن
                خدمات، دایره مشتریان کیلید، در سراسر ایران خواهد بود.
            </p>
            <div class="flex-row justify-center be-center">
                <a id="sect4-button" class="flex-row be-center justify-center info-button">
                    مطالب بیشتر
                </a>
            </div>
        </div>
    </div>
</div>
<div class="flex-cols footer">
    <div class="flex-row be-center justify-center">
        <a class="flex-row be-center justify-center icon-holder"><img id="telegram" src="{{url('/pics/telegram.png')}}"></a>
        <a class="flex-row be-center justify-center icon-holder"><img id="instagram" src="{{url('/pics/instagram.png')}}"></a>
        <a class="flex-row be-center justify-center icon-holder"><img id="twitter" src="{{url('/pics/twitter.png')}}"></a>
        <a class="flex-row be-center justify-center icon-holder"><img id="linkedin" src="{{url('/pics/linkedin.png')}}"></a>
    </div>
    <div class="flex-row be-center justify-center">
        <ul class="flex-row be-center justify-start">
            <li class="footer-menu"><a href="dgfb">خرید</a></li>
            <li class="footer-menu"><a href="dgfb">رهن و اجاره</a></li>
            <li class="footer-menu"><a href="dgfb">جستجو روی نقشه</a></li>
            <li class="footer-menu"><a href="dgfb">ثبت رایگان آگهی</a></li>
            <li class="footer-menu"><a href="dgfb">قیمت خانه شما</a></li>
            <li class="footer-menu"><a href="dgfb">اطلاعات بازار مسکن</a></li>
            <li class="footer-menu"><a href="dgfb"> آژانس های املاک</a></li>
            <li class="footer-menu"><a href="dgfb"> سامانه مشاورین</a></li>
        </ul>
    </div>
    <div class="flex-row be-center justify-center brand-icons">
        <div class="brand-pic">
            <a class="brand-holder">
                <img class="brand" src=".{{url('/pics/logo.png')}}"/>
            </a>
        </div>
        <div class="brand-pic">
            <a class="brand-holder">
                <img class="brand" src="{{url('/pics/eanjoman.jpg')}}"/>
            </a>
        </div>
        <div class="brand-pic">
            <a class="brand-holder">
                <img class="brand" src="{{url('/pics/tempsnip.png')}}"/>
            </a>
        </div>
        <div class="brand-pic">
            <a class="brand-holder">
                <img class="brand" src="{{url('/pics/ecunion-logo.png')}}"/>
            </a>
        </div>
    </div>
    <div class="flex-row be-center justify-center extra-info">
        <ul class="flex-row be-center justify-center">
            <li class="extra-items"><a class="click-item">درباره کیلید</a></li>
            <li class="extra-items"><a class="click-item">تماس با ما</a></li>
            <li class="extra-items"><a class="click-item">بلاگ</a></li>
            <li class="extra-items"><a class="click-item">اپلیکیشن موبایل</a></li>
            <li class="extra-items"><a class="click-item">نقشه سایت</a></li>
        </ul>
    </div>
    <div class="flex-row be-center justify-center logo-item">
        <img id="bottom-logo" class="flex-row be-center justify-center" src="./Pics/bot-logo.png"/>
    </div>
    <div class="flex-cols be-center justify-center contact">
        <div>تهران، خیابان وزرا، کوچه نهم، پلاک 26</div>
        <div>021-75071000</div>
    </div>
    <div class="location flex-row justify-center">
        <div class="columns flex-row justify-center">
            <div class="be-start"><span class="opt-name">خرید</span></div>
            <div class="opt-items flex-row be-center justify-center">
                <ul class="opt-cols">
                    <li>تهرانپارس</li>
                    <li>پونک</li>
                    <li>بلوار فردوس</li>
                    <li>سعادت آباد</li>
                    <li>نواب</li>
                </ul>
                <ul class="opt-cols">
                    <li>پاسداران</li>
                    <li>شهرک غرب</li>
                    <li>ستارخان</li>
                    <li>ونک</li>
                    <li>مرزداران</li>
                </ul>
            </div>
        </div>
        <div class="columns flex-row justify-center">
            <div class="be-start"><span class="opt-name">اجاره</span></div>
            <div class="opt-items flex-row be-center justify-center">
                <ul class="opt-cols">
                    <li>تهرانپارس</li>
                    <li>پونک</li>
                    <li>بلوار فردوس</li>
                    <li>سعادت آباد</li>
                    <li>نواب</li>
                </ul>
                <ul class="opt-cols">
                    <li>پاسداران</li>
                    <li>شهرک غرب</li>
                    <li>ستارخان</li>
                    <li>ونک</li>
                    <li>مرزداران</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="flex-row be-center justify-center rights">
        <p id="item-clr1" class="right-item">کلیه حقوق این سایت متعلق به شرکت کلان داده شهر فناوران می‌باشد
        </p>
        <a class="right-link">حریم خصوصی</a>
        <a class="right-link">شرایط استفاده</a>
    </div>
</div>
</body>
</html>