@extends('admin.layout.app')

@section('heading', 'Home settings')

@section('main_content')
@section('button')
<a href="{{ route('admin_category_create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
@endsection
<div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

      <form action="{{ route('admin_setting_update',$setting_data->id)}}" method="post" enctype="multipart/form-data">
        @csrf

    <div class="row">
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-1-tab" data-toggle="pill" href="#v-1" role="tab" aria-controls="v-1" aria-selected="true">
                Photo Item
            </a>
            <a class="nav-link" id="v-2-tab" data-toggle="pill" href="#v-2" role="tab" aria-controls="v-2" aria-selected="false">
                Text Item
            </a>
        </div>
    </div>
    <div class="col-xl-10 col-lg-9 col-md-8 col-sm-12">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="pt_0 tab-pane fade show active" id="v-1" role="tabpanel" aria-labelledby="v-1-tab">
                <!-- Photo Item Start -->
                <div class="form-group mb-3">
                    <label>
                        Existing Photo
                    </label>
                    <div>
                        <img src="{{asset('uploads/' .$setting_data->logo)}}" alt="" class="w_200">
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label>
                        Change Photo
                    </label>
                    <div>
                        <input type="file" name="logo">
                    </div>
                </div>
                <!-- Photo Item End -->
            </div>

            <div class="form-group mb-3">
                    <label>
                        Existing Favicon
                    </label>
                    <div>
                        <img src="{{asset('uploads/' .$setting_data->favicon)}}" alt="" class="w_200">
                    </div>
                <div class="form-group mb-3">
                    <label>
                        Change favicon
                    </label>
                    <div>
                        <input type="file" name="favicon">
                    </div>
                </div>
                <!-- Photo Item End -->
            </div>
            <div class="pt_0 tab-pane fade" id="v-2" role="tabpanel" aria-labelledby="v-2-tab">
                <!-- Text Item Start -->
                <div class="form-group mb-3">
                    <label>News Ticker Total </label>
                    <input type="text" class="form-control" 
                    name="news_ticker_total" value="{{ $setting_data->news_ticker_total }}">
                </div>
                <div class="form-group mb-3">
                    <label>Status</label>
                    <select name="news_ticker_status" class="form-control">
                        <option value="Show" @if($setting_data->news_ticker_status == 'Show') selected @endif>Show</option>
                        <option value="Hide"@if($setting_data->news_ticker_status == 'Hide') selected @endif>Hide</option>
                    </select>
                </div>

                <!-- <div class="pt_0 tab-pane fade" id="v-2" role="tabpanel" aria-labelledby="v-2-tab"> -->
                <!-- Text Item Start -->
                <div class="form-group mb-3">
                    <label>Video Total </label>
                    <input type="text" class="form-control" 
                    name="video_total" value="{{ $setting_data->video_total }}">
                </div>
                <div class="form-group mb-3">
                    <label>Status</label>
                    <select name="video_status" class="form-control">
                        <option value="Show" @if($setting_data->video_status == 'Show') selected @endif>Show</option>
                        <option value="Hide"@if($setting_data->video_status == 'Hide') selected @endif>Hide</option>
                    </select>
                </div>
                <!-- Text Item End -->
            </div>
        </div>
    </div>
</div>

<div class="form-group mt_30">
    <button type="submit" class="btn btn-primary btn-block">Update</button>
</div>
</form>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
@endsection