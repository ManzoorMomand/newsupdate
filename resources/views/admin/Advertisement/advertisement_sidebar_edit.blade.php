@extends('admin.layout.app')

<h1>@section('heading', 'Sidebar advertisement Edit' )</h1>

@section('main_content')

@section('button')
<a href="{{ route('admin_sidebar_ad_show')}}" class="btn btn-primary"><i class="fas fa-eye"></i> view</a>
@endsection


<div class="section-body">
<form action="{{ route ('admin_sidebar_ad_update',$sidebar_ad_data->id)}}" method="post" enctype="multipart/form-data">
    @csrf

                    <div class="row">

                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                
                                     <div class="form-group mb-3">
                                            <label>Existing Photo</label>
                                            <div>
                                                <img src="{{ asset ('uploads/' .$sidebar_ad_data->sidebar_ad) }}" alt=""  style="width: 100px; height: auto;">
                                            </div>
                                     </div>
                                     <div class="form-group mb-3">
                                            <label>Select Photo</label>
                                            <div>
                                                <input type="file" name="sidebar_ad" >
                                            </div>
                                     </div>
                                         <div class="form-group mb-3">
                                            <label>URL *</label>
                                                <input type="text" class="form-control" name="sidebar_ad_url" 
                                                value="{{$sidebar_ad_data->sidebar_ad_url}} " >
                                            </div>
                                            
                                        <div class="form-group mb-3">
                                            <label>Status</label>
                                            <select name="sidebar_ad_location" class="form-control">
                                                <option value="Top" @if($sidebar_ad_data->sidebar_ad_location == 'Top') selected @endif>Top</option>
                                                <option value="Bottom" @if($sidebar_ad_data->sidebar_ad_location == 'Bottom') selected @endif>Bottom</option>
                                            </select>
                                     </div>
                                        
                                      
                                </div>
                            </div>
                        </div>

                       
                        
                    </div>
                    <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                </div>
@endsection