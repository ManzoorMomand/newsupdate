<div class="sidebar">

<div class="widget">
    @foreach ($global_sidebar_top_ad as $row)

    <div class="ad-sidebar">
        <a href=""><img src="{{asset('uploads/'.$row->sidebar_ad)}}" alt=""></a>
    </div>
    @endforeach
</div>

<div class="widget">
    <div class="tag-heading">
        <h2>Tags</h2>
    </div>
    <div class="tag">
        @php
        $all_tags = \App\Models\Tag::select('tag_name')->distinct()->get();
        @endphp 
        @foreach($all_tags as $item)

        <div class="tag-item">
            <a href="{{ route('tag_show',$item->tag_name)}}"><span class="badge bg-secondary">{{$item->tag_name}}</span></a>
        </div>
        @endforeach
       
    </div>
</div>

<!-- <div class="widget">
    <div class="archive-heading">
        <h2>Archive</h2>
    </div>
    <div class="archive">
        <select name="" class="form-select">
            <option value="">Select Month</option>
            <option value="">February 2022</option>
            <option value="">January 2022</option>
            <option value="">December 2021</option>
            <option value="">November 2021</option>
            <option value="">October 2021</option>
            <option value="">September 2021</option>
            <option value="">August 2021</option>
            <option value="">July 2021</option>
        </select>
    </div>
</div> -->
@foreach($global_live_data as $live)
<div class="widget">
    <div class="live-channel">
       
        <div class="live-channel-heading">

            <h2>{{$live->heading}}</h2>
        </div>
        <div class="live-channel-item">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$live->video_id}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      
    </div>
</div>
@endforeach
<div class="widget">
    <div class="news">
        <div class="news-heading">
            <h2> خبرونه</h2>
        </div>           

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Recent News</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Popular News</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                @foreach ($global_recent_news_data as $item)

                @if ($loop->iteration > 5)
                @break
                @endif
          
                <div class="news-item">
                    <div class="left">
                        <img src="{{asset('uploads/'.$item->post_photo)}}" alt="">
                    </div>
                    <div class="right">
                        <div class="category">
                            <span class="badge bg-success">{{$item->rSubCategory->sub_category_name}}</span>
                        </div>
                        <h2 dir="rtl"><a href="">{{$item->post_title}}</a></h2>
                        <div class="date-user">
                            <div class="user">
                            @if ($item->author_id == 0)
                                        @php
                                        $user_data = \App\Models\Admin::where('id', $item->admin_id)->first();
                                        @endphp
                                        @if ($user_data)
                                            <a href="">{{ $user_data->name }}</a>
                                        @endif
                                    @endif
                            </div>
                            <div class="date">
                            @php
                                    $ts = strtotime($item->updated_at);
                                    $updated_date = date("Y-F-d", $ts);
                                    @endphp
                                <a href="">{{ $updated_date }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
              
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            @foreach ($global_recent_news_data as $item)

            @if ($loop->iteration > 5)
            @break
            @endif
            <div class="news-item">
                    <div class="left">
                        <img src="{{asset('uploads/'.$item->post_photo)}}" alt="">
                    </div>
                    <div class="right">
                        <div class="category">
                            <span class="badge bg-success">{{$item->rSubCategory->sub_category_name}}</span>
                        </div>
                        <h2 dir="rtl"><a href="">{{$item->post_title}}</a></h2>
                        <div class="date-user">
                            <div class="user">
                            @if ($item->author_id == 0)
                                        @php
                                        $user_data = \App\Models\Admin::where('id', $item->admin_id)->first();
                                        @endphp
                                        @if ($user_data)
                                            <a href="">{{ $user_data->name }}</a>
                                        @endif
                                    @endif
                              
                            </div>
                            <div class="date">
                            @php
                                    $ts = strtotime($item->updated_at);
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
    </div>
</div>

<div class="widget">
       @foreach ($global_sidebar_bottom_ad as $row)

    <div class="ad-sidebar">
        <a href=""><img src="{{asset('uploads/'.$row->sidebar_ad)}}" alt=""></a>
    </div>
    @endforeach
</div>

<div class="widget">
    <div class="poll-heading">
        <h2>Online Poll</h2>
    </div>
    <div class="poll">
        <div class="question">
            {{ $global_online_poll_data->question}}
        </div>
        @php
$total_vote = $global_online_poll_data->yes_vote + $global_online_poll_data->no_vote;
if ($global_online_poll_data->yes_vote == 0)
{
    $total_yes_percentage = 0;
}
else
{
    $total_yes_percentage = ($global_online_poll_data->yes_vote * 100) / $total_vote;
$total_yes_percentage = ceil($total_yes_percentage);
}

if($global_online_poll_data->no_vote == 0)
{
    $total_no_percentage = 0;
}
else
{
    $total_no_percentage = ($global_online_poll_data->no_vote * 100) / $total_vote;
$total_no_percentage = ceil($total_no_percentage);
}


@endphp

@if (session()->get('current_poll_id') == $global_online_poll_data->id)
<div class="table-responsive">
    <div class="poll-result">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td style="width: 100px;">Yes {{$global_online_poll_data->yes_vote}}</td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" 
                                 style="width: {{$total_yes_percentage}}%" aria-valuenow="{{$total_yes_percentage}}" aria-valuemin="0"
                                 aria-valuemax="100">{{$total_yes_percentage}}%
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>No {{$global_online_poll_data->no_vote}}</td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" 
                                 style="width: {{$total_no_percentage}}%" aria-valuenow="{{$total_no_percentage}}" aria-valuemin="0"
                                 aria-valuemax="100">{{$total_no_percentage}}%
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endif

@if (session()->get('current_poll_id') != $global_online_poll_data->id)
<div class="answer-option">
    <form action="{{ route('online_poll') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $global_online_poll_data->id }}">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="vote" id="poll_id_1" value="Yes" checked>
            <label class="form-check-label" for="poll_id_1">Yes</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="vote" id="poll_id_2" value="No">
            <label class="form-check-label" for="poll_id_2">No</label>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{route('poll')}}" class="btn btn-primary old">Old Result</a>
        </div>
    </form>
</div>
@endif
</div>
</div>


</div>