@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>All Posts of Tag {{$tag_name}}</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>

                        <li class = "breadcrumb-item">Tag </li>
                        <li class ="breadcrumb-item active" aria-current ="page">{{$tag_name}}

                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="page-content">
    <div class="container">
        <div class="row">
           
                    <div class="col-lg-8 col-md-6">
                        <div class="category-page">
                            <div class="row">
                            @if(count($all_data))
                @foreach($all_data as $item)
                                <div class="col-lg-6 col-md-12">
                                    <div class="category-page-post-item">
                                        <div class="photo">
                                            <img src="{{ asset('uploads/'.$item->post_photo) }}" alt="">
                                        </div>
                                        <div class="category">
                                            <span class="badge bg-success">{{ $item->rSubCategory->sub_category_name }}</span>
                                        </div>
                                        <h3><a href="{{ route('post_detail', $item->id) }}">{{ $item->post_title }}</a></h3>
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
            @endif
            <div class ="col-md-12">
                            {{$all_data->links()}}
                            

                        </div>
                        
                            </div>
                            
                        </div>
                        
                    </div>
                    <div class="col-lg-4 col-md-6 sidebar-col">
                       @include('front.layout.sidebar')
                    </div>
        </div>
    </div>
</div>
@endsection
