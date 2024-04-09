@extends('front.layout.app');

@section('main_content')
@if($setting_data->news_ticker_status == 'Show')
<div class="news-ticker-item">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="acme-news-ticker">
                            <div dir="rtl" class="acme-news-ticker-label">Latest News</div>
                            <div class="acme-news-ticker-box">
                                <ul class="my-news-ticker">
                                    @php $i=0; @endphp
                                    @foreach($post_data as $item)
                                    @php $i++; @endphp
                                    @if($i>$setting_data->news_ticker_total)
                                    @break
                                    @endif


                                    <li dir="rtl"><a href="{{route('post_detail', $item->id)}}">{{$item->post_title}}</a></li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif 
       
        <div class="home-main">
            <div class="container">
                <div class="row g-2">
                    <div class="col-lg-8 col-md-12 left">
                        @php $i=0; @endphp
                    @foreach($post_data as $item)
                    @php $i++; @endphp
                    @if ($i>1)
                    @break
                    @endif
                        <div class="inner">
                            <div class="photo">
                                <div class="bg"></div>
                                <img src="{{asset ('uploads/'.$item->post_photo)}}" alt="">
                                <div class="text">
                                    <div class="text-inner">
                                        <div class="category">
                                            <span dir="rtl" class="badge bg-success badge-sm">{{ $item->sub_category_name }}</span>
                                        </div>
                                        <h2 dir="rtl"><a href="">{{$item->post_title}}</a></h2>
                                        <div class="date-user">
                                            <div class="user">
                                            @if ($item->author_id == 0)
                                        @php
                                        $user_data = \App\Models\Admin::where('id', $item->admin_id)->first();
                                        @endphp
                                        @else
                                        @php
                                        $user_data = \App\Models\Author::where('id', $item->author_id)->first();
                                        @endphp
                                        @endif

                                          <a dir="rtl" href="javascript:void;">{{ $user_data->name }}</a>
                                                
                                            </div>
                                            <div class="date">
                                            @php
                                    $ts = strtotime($item->updated_at);
                                    $updated_date = date("Y-F-d", $ts);
                                    @endphp
                                                <a href="javascript:void;">{{$updated_date}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <div class="col-lg-4 col-md-12">
                    @php $i=0; @endphp
                    @foreach($post_data as $item)
                    @php $i++; @endphp
                    @if($i==1)
                         @continue
                    @endif
                    @if($i>3)
                        @break
                    @endif
                        <div class="inner inner-right">
                            <div class="photo">
                                <div class="bg"></div>
                                <img src="{{asset ('uploads/'.$item->post_photo)}}" alt="">
                                <div class="text">
                                    <div class="text-inner">
                                        <div class="category">
                                            <span dir="rtl" class="badge bg-success badge-sm">{{ $item->sub_category_name }}</span>
                                        </div>
                                        <h2 dir="rtl"><a href="">{{$item->post_title}}</a></h2>
                                        <div class="date-user">
                                            <div class="user">
                                            @if ($item->author_id == 0)
                                        @php
                                        $user_data = \App\Models\Admin::where('id', $item->admin_id)->first();
                                        @endphp
                                        @else
                                        @php
                                        $user_data = \App\Models\Author::where('id', $item->author_id)->first();
                                        @endphp
                                        @endif

                                                <a href="">{{ $user_data->name }}</a>
                                          
                                            </div>
                                            <div class="date">
                                            @php
                                    $ts = strtotime($item->updated_at);
                                    $updated_date = date("Y-F-d", $ts);
                                    @endphp
                                                <a href="">{{$updated_date}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach 
                        
                    </div>
                    
                </div>
            </div>
            
        </div>
        @if($home_ad_data->above_search_ad_status == 'Show')
        <div class="ad-section-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if($home_ad_data->above_search_ad_url == '')
                        <img src="{{ asset ('uploads/' .$home_ad_data->above_search_ad) }}" alt="">
                        @else
                        <a href="{{ $home_ad_data->above_search_ad_url }}"><img src="{{asset
                            ('uploads/'.$home_ad_data->above_search_ad) }}" alt=""></a>
                            @endif
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="search-section">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-md-3">
             <form action="{{ route('search_result')}}" method = "">
                @csrf
                            <div class="form-group">
                                <input type="text" name="text_item" class="form-control" placeholder="Title or Description">
                            </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                       <select name="category" id="category" class="form-select">
                        <option value="">Select Category</option>
                       @foreach ($category_data as $item)
                                  <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                         @endforeach
                    </select>
                    </div>
                    </div>
                    <div class="col-md-3">
                   <div class="form-group">
                 <select name="sub_category" id="sub_category" class="form-select">
                          <option value="">Select SubCategory</option>
                             </select>
                          </div>
                              </div>

                        <div class="col-md-3">
                            <button type="submit" class="btn btn-success">پلټنه</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
        
 <div class="home-content">
    <div class="container">
        <div class="row">
            <!-- Sidebar (moved to the left) -->
            <div class="col-lg-4 col-md-6 sidebar-col">
                @include('front.layout.sidebar')
            </div>

            <!-- Main Content (moved to the right) -->
            <div class="col-lg-8 col-md-6 right-col">
                <div class="left">
                    @foreach($sub_category_data as $item)
                    @if(count($item->rPost)==0)
                    @continue
                    @endif
                    <div class="news-total-item">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <h2>{{ $item->sub_category_name }}</h2>
                            </div>
                            <div class="col-lg-4 col-md-12 see-all">
                            <h2 dir="rtl"><a href="{{ route('category',$item->id)}}" class="btn btn-primary btn-sm">...نور</a></h2>
                            </div>
                            <div class="col-md-12">
                                <div class="bar"></div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-lg-6 col-md-12">
                                <div class="right-side">
                                    @foreach($item->rPost as $single)
                                    @if($loop->iteration == 2)
                                    @continue
                                    @endif
                                    @if($loop->iteration == 6)
                                    @break
                                    @endif

                                    <div class="right-side-item">
                                        <div class="left">
                                            <img src="{{ asset('uploads/'.$single->post_photo) }}" alt="">
                                        </div>
                                        <div class="right">
                                        <div class="category" style="direction: rtl;">
    <span class="badge bg-success">{{ $item->sub_category_name }}</span>
</div>
<h2 dir="rtl"><a href="">{{ $single->post_title }}</a></h2>

                                            <div class="date-user">
                                                <div class="user">
                                                    @if ($single->author_id == 0)
                                                    @php
                                                    $user_data = \App\Models\Admin::where('id', $single->admin_id)->first();
                                                    @endphp
                                                    @if ($user_data)
                                                    <a href="">{{ $user_data->name }}</a>
                                                    @endif
                                                    @endif
                                                </div>
                                                <div class="date">
                                                    @php
                                                    $ts = strtotime($single->updated_at);
                                                    $updated_date = date("Y-F-d", $ts);
                                                    @endphp
                                                    <a href="">{{ $updated_date }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @foreach($item->rPost as $single)
                            @if($loop->iteration == 2)
                            @break
                            @endif
                            <div class="col-lg-6 col-md-12">
                                <div class="left-side">
                                    <div class="photo">
                                        <img src="{{ asset('uploads/'.$single->post_photo) }}" alt="">
                                    </div>
                                 <div class="category" style="direction: rtl;">
    <span class="badge bg-success">{{ $item->sub_category_name }}</span>
</div>
<h3 style="direction: rtl;"><a href="{{ route('post_detail', $single->id) }}">{{ $single->post_title }}</a></h3>
<div class="date-user" style="direction: rtl;">
    <div class="user">
        @if ($single->author_id == 0)
        @php
        $user_data = \App\Models\Admin::where('id', $single->admin_id)->first();
        @endphp
        @if ($user_data)
        <a href="">{{ $user_data->name }}</a>
        @endif
        @endif
    </div>
    <div class="date">
        @php
        $ts = strtotime($single->updated_at);
        $updated_date = date("Y-F-d", $ts);
        @endphp
        <a href="">{{ $updated_date }}</a>
    </div>
</div>
<div class="limited-lines-container" style="direction: rtl;">
    <p class="limited-lines">
        {!! $single->post_detail !!}
    </p>
</div>

                                </div>
                            </div>
                            @endforeach

                            
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

        @if ($setting_data->video_status == 'Show')
        <div class="video-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="video-heading">
                            <h2>Videos</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="video-carousel owl-carousel">
                            @foreach ($video_data as  $item)
                            <div class="item">
                                <div class="video-thumb">
                                    <img src="http://img.youtube.com/vi/{{$item->video_id}}/0.jpg" alt="">
                                    <div class="bg"></div>
                                    <div class="icon">
                                        <a href="http://www.youtube.com/watch?v={{$item->video_id}}" class="video-button"><i class="fas fa-play"></i></a>
                                    </div>
                                </div>
                                <div class="video-caption">
                                    <a href="">{{$item->caption}}</a>
                                </div>
                                <div class="video-date">
                                @php
                                    $ts = strtotime($item->updated_at);
                                    $updated_date = date("Y-F-d", $ts);
                                    @endphp
                                    <i class="fas fa-calendar-alt"></i> {{ $updated_date }}
                                </div>
                            </div>
                            @endforeach
                     
                        </div>
        
                    </div>
                </div>
            </div>
        </div>
        
        @endif
        

        @if($home_ad_data->above_footer_ad_status == 'Show')
        <div class="ad-section-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if($home_ad_data->above_footer_ad_url == '')
                        <img src="{{ asset ('uploads/' .$home_ad_data->above_footer_ad) }}" alt="">
                        @else
                        <a href="{{ $home_ad_data->above_footer_ad_url }}"><img src="{{asset
                            ('uploads/'.$home_ad_data->above_footer_ad) }}" alt=""></a>
                            @endif
                    </div>
                </div>
            </div>
        </div>
        @endif
        <script>
    $(document).ready(function() {
        $("#category").on("change", function() {
            var categoryId = $(this).val(); // Corrected variable name

            if (categoryId) {
                $.ajax({
                    type: "get",
                    url: "{{ url('/subcategory-by-category/') }}" + "/" + categoryId, // Added missing variable
                    success: function(response) {
                        $("#sub_category").html(response.sub_category_data);
                    },
                    error: function(err) {
                        // Handle error here
                    }
                });
            }
        });
    });
</script>

@endsection