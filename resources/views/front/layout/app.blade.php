<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
        <meta name="description" content="">
        <title>News Portal Website</title>        
		
        <link rel="icon" type="image/png" href="{{asset('uploads/' .$global_setting_data->favicon)}}">

      @include('front.layout.styles')
        
       @include('front.layout.scripts')

        <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">

        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6212352ed76fda0a"></script>        
        
        <!-- Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-84213520-6"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-84213520-6');
        </script>

    </head>
    <body>
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                  
                        <ul>
                            
                            <li class="today-text">Today: January 20, 2022</li>
                            <li class="email-text">info@mtechsh.com</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="right">
                            <li class="menu"><a href="faq.html">FAQ</a></li>
                            <li class="menu"><a href="{{route('about')}}">About</a></li>
                            <li class="menu"><a href="{{route('contact')}}">Contact</a></li>
                            <li class="menu"><a href="{{route('login')}}">Login</a></li>
                            <li>
                                <div>
                                    
                                <!-- <table>
              <tr><td style="text-align: center;"><canvas id="canvas_tt64eef45171524" width="105" height="105"></canvas></td></tr>
              <tr><td style="text-align: center; font-weight: bold"><a href="/Afghanistan/time" style="text-decoration: none" class="clock24" id="tz24-1693381713-cc10001-eyJzaXplIjoiMTc1IiwiYmdjb2xvciI6IjAwMDBGRiIsImxhbmciOiJlbiIsInR5cGUiOiJhIiwiY2FudmFzX2lkIjoiY2FudmFzX3R0NjRlZWY0NTE3MTUyNCJ9" title="Kabul time now" target="_blank" rel="nofollow">Afghanistan</a></td></tr>
          </table>
<script type="text/javascript" src="//w.24timezones.com/l.js" async></script> -->
                                </div>
                                <!-- <div class="language-switch">
                                    <select name="">
                                        <option value="">English</option>
                                        <option value="">Hindi</option>
                                        <option value="">Arabic</option>
                                    </select>
                                </div> -->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="heading-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 d-flex align-items-center">
                        <div class="logo">
                            <a href="{{route('home')}}">
                                <img src="{{asset('uploads/' .$global_setting_data->logo)}}" alt="">
                            </a>
                        </div>
                        <div>
                        <div style="align: right;">
    <script src="https://cdn.logwork.com/widget/digital.js"></script>
    <a href="https://logwork.com/current-time-in-kabul-afghanistan" class="digital-clock" data-style="round" data-size="400" data-timezone="Asia/Kabul" data-language="en">Kabul, Afghanistan</a>
</div>

                        </div>
                    </div>
                    <div class="col-md-8">
                        @if($global_top_ad_data->top_ad_status =='Show')
                        <div class="ad-section-1">
                            @if($global_top_ad_data->top_ad_url == '')
                            <img src="{{ asset('uploads/' .$global_top_ad_data->top_ad)}}" alt="">
                        
                            @else
                            <a href="{{ $global_top_ad_data->top_ad_url}}"><img src="{{ asset('uploads/' .$global_top_ad_data->top_ad)}}" alt=""></a>
                        @endif
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

      @include('front.layout.nav')  

     
  @yield('main_content')

@include('front.layout.scripts_footer')     
		

   </body>
</html>