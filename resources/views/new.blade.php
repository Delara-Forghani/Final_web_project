<!DOCTYPE html>
<html>
<head>
<title>خرید</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>

         
<!-- @php ($allAddr = [])
@foreach ($addr as $address)
    @php ($allAddr[] = $address->photoAddr)
@endforeach -->



@foreach($house as $row)
<div id="article" class="flex-row article-container"> 
<div class="side-bar-holder">
              <div class="property-details">
                <div class="be-center space-between flex-row date-and-code">
                  <div>کد ملک: {{$row->id}}</div>
                  <div style="color:#517cfb;">{{$row->created_at}}</div>
                </div>
                <h1 class="page-title">{{$row->title}}</h1>
                <div class="house-prices">
                  <span class="price-title">قیمت: </span>
                  <span class="whole-price">{{$row->price}} میلیارد تومان</span>
                </div>
                <div class="house-prices">
                  <span class="price-title">قیمت هر متر مربع: </span>
                  <span class="whole-price">{{round($row->price*(1000)/$row->area)}} میلیون تومان</span>
                </div>
                <br class="break-line"/>
                <div class="flex-row be-center house-detail">
                  <span class="flex-row be-center house-detail"></span>
                  <span style="margin-right:5px;" class="flex-row be-center house-detail">{{$row->type}}</span>
                </div>
                <div class="flex-row be-center house-detail">
                  <span class="flex-row be-center house-detail"></span>
                  <span style="margin-right:5px;" class="flex-row be-center house-detail">{{$row->bedrooms}} خوابه</span>
                </div>
                <div class="flex-row be-center house-detail">
                  <span class="flex-row be-center house-detail"></span>
                  <span style="margin-right:5px;" class="flex-row be-center house-detail">{{$row->area}} متر مربع</span>
                </div>
                <div class="flex-row be-center house-detail">
                  <span class="flex-row be-center house-detail"></span>
                  <span style="margin-right:5px;" class="flex-row be-center house-detail">{{$row->parkings}} عدد پارکینگ</span>
                </div>
              </div>
              <div class="flex-cols agency-info">
                <div class="flex-cols be-center agency-info-header">
                  <div class="agency-logo" style="background-image:url('/Pics/estate.jpg');">
                  </div>
                  <span style="text-align:center;">{{$row->estate}}</span>
                </div>
                <span class="agency-manager">{{$row->estate}}</span>
                <div class="flex-row be-center justify-center agency-phone" href="">{{Auth::user()->phone}}</div>
              </div>
            </div>
            <div class="main-content">
                <div class="flex-row be-center bread-crumb-holder">
                   تهران > {{$row->location}}
                </div>
                <div class="flex-cols" style="margin-bottom: 24px;">
                  <div>
                      <div class="flex-row current-image">
                        <div class="flex-row be-center justify-center single-image">
                           <img class="image-advertise" src="{{asset('/storage/uploadFiles/'.$row->pic)}}"/>
                        </div>
                        <!-- <button class="be-center justify-center flex-row num-of-img">
                          <div class="be-center justify-center flex-row fraction-num">image fraction</div>
                        </button> -->
                        <button id="arrow-right" class="be-center justify-center flex-row arrow-button arrow-right">
                          <svg _ngcontent-c16="" class="ng-tns-c16-8" height="32" viewBox="0 0 18.241 32" width="18.241" xmlns="http://www.w3.org/2000/svg"><path _ngcontent-c16="" class="ng-tns-c16-8" d="M17.585,17.584,3.825,31.343A2.241,2.241,0,0,1,.656,28.174L12.831,16,.657,3.826A2.241,2.241,0,0,1,3.826.656l13.76,13.759a2.241,2.241,0,0,1,0,3.168Z" data-name="Path 5487" fill="rgba(255,255,255,0.7)" id="Path_5487"></path></svg>
                        </button>
                        <button id="arrow-left" class="be-center justify-center flex-row arrow-button arrow-left">
                          <svg _ngcontent-c16="" class="ng-tns-c16-8" height="32" viewBox="0 0 18.241 32" width="18.241" xmlns="http://www.w3.org/2000/svg"><path _ngcontent-c16="" class="ng-tns-c16-8" d="M.656,17.584,14.416,31.343a2.241,2.241,0,0,0,3.169-3.169L5.41,16,17.585,3.826A2.241,2.241,0,1,0,14.415.656L.656,14.416a2.241,2.241,0,0,0,0,3.168Z" data-name="Path 5488" fill="rgba(255,255,255,0.7)" id="Path_5488"></path></svg>
                        </button>
                       <script>
                          var num = 0;
                          // var app = @json($allAddr);
                          $('#arrow-right').click(function () {        
                            // num = (num + 1) % app.length;
                              console.log("hello");
                          
                          });

                          $('#arrow-left').click(function () {
                                      // num = (num - 1);
                                      // if (num == -1) {
                                      //     num = app.length - 1;
                                      // }
                                      console.log("helloback");               
                                  });
                        </script>
                     </div>
                  </div>
                </div>
        </div>
</div>
@endforeach


 
</body>
</html>