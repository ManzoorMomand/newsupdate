<div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <!-- <div class="item">
                            <h2 class="heading">About Us</h2>
                            <p>
                            </p>
                        </div> -->
                    </div>
                    <div class="col-md-4">
                    <div class="list-item">
                    <h2 class="heading">Contact</h2>
                                <div class="left">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="right">
                                    info@mtechsh.com
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="right">
                                   +93728886888
                                </div>
                            </div>
                    </div>
                    
                    
                    <div class="col-md-4">
                        <div class="item">
                            <h2 class="heading">Address</h2>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="right">
                                    Afghanistan Jalalabad city 
                                    office no 2 Haji Mahmood Market <br>
                    
                                    
                                </div>
                            </div>
                           
                            <ul class="social">
    @foreach($global_social_item_data as $item)
    <li>
        <a href="{{$item->url}}" target="_blank">
            <i class="{{$item->icon}}"></i>
        </a>
    </li>
    @endforeach
</ul>

                        </div>
                    </div>

                    <!-- <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">Newsletter</h2>
                            <p>
                                In order to get the latest news and other great items, please subscribe us here: 
                            </p>
                            <form action="" method="post">
                                <div class="form-group">
                                    <input type="text" name="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Subscribe Now">
                                </div>
                            </form>
                        </div>
                    </div> -->

                </div>
            </div>
        </div>

        <div class="copyright">
        <div id="ww_6b9214ccfa424" v='1.3' loc='id' a='{"t":"responsive","lang":"en","sl_lpl":1,"ids":[],"font":"Arial","sl_ics":"one_a","sl_sot":"celsius","cl_bkg":"#0288D1","cl_font":"#FFFFFF","cl_cloud":"#FFFFFF","cl_persp":"#FFFFFF","cl_sun":"#FFC107","cl_moon":"#FFC107","cl_thund":"#FF5722","cl_odd":"#0000000a"}'>Weather Data Source: <a href="https://sharpweather.com/weather_los_angeles/30_days/" id="ww_6b9214ccfa424_u" target="_blank">Los Angeles 30 days weather</a></div><script async src="https://app2.weatherwidget.org/js/?id=ww_6b9214ccfa424"></script>        </div>
     
        <div class="scroll-top">
            <i class="fas fa-angle-up"></i>
        </div>
		
        <script src="{{ asset('dist_front/js/custom.js')}}"></script>   