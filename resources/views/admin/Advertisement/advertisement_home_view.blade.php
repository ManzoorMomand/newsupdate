@extends('admin.layout.app')

@section('heading', 'Home advertisement')

@section('main_content')
<div class="section-body">
<form action="{{ route ('admin_home_ad_update') }}" method="post" enctype="multipart/form-data">
    @csrf 

                    <div class="row">

                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <h2>Above search</h2>
                                    
                                    
                                        <div class="form-group mb-3">
                                            <label>Photo</label>
                                            <div>
                                                <img src="{{asset('uploads/' .$home_ad_data->above_search_ad) }}" alt="" style="width: 100px;">
                                            </div>
                                     </div>
                                     <div class="form-group mb-3">
                                            <label>Change Photo</label>
                                            <div>
                                                <input type="file" name="above_search_ad">
                                            </div>
                                     </div>
                                         <div class="form-group mb-3">
                                            <label>URL *</label>
                                                <input type="text" class="form-control" 
                                                 name="above_search_ad_url" value="{{$home_ad_data->above_search_ad_url }} " >
                                            </div>
                                            
                                        <div class="form-group mb-3">
                                            <label>Photo</label>
                                            <select name="above_search_ad_status" class="form-control">
                                                <option value="Show"@if($home_ad_data->above_search_ad_status =='Show') selected @endif >Show</option>
                                                <option value="Hide"@if($home_ad_data->above_search_ad_status =='Hid') selected @endif >Hide</option>
                                            </select>
                                     </div>
                                        
                                      
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <h2>Above footer</h2>

                                    
                                        <div class="form-group mb-3">
                                            <label>Photo</label>
                                            <div>
                                                <img src="{{asset('uploads/' .$home_ad_data->above_footer_ad) }}" alt="" style="width: 100px;">
                                            </div>
                                     </div>
                                     <div class="form-group mb-3">
                                            <label>Change Photo</label>
                                            <div>
                                                <input type="file" name="above_footer_ad">
                                            </div>
                                     </div>
                                         <div class="form-group mb-3">
                                            <label>URL *</label>
                                                <input type="text" class="form-control" 
                                                 name="above_footer_ad_url" value="{{$home_ad_data->above_footer_ad_url }} 
                                                 ">
                                            </div>
                                            
                                        <div class="form-group mb-3">
                                            <label>Status</label>
                                            <select name="above_footer_ad_status" class="form-control">
                                                <option value="Show"@if($home_ad_data->above_footer_ad_status =='Show') selected @endif >Show</option>
                                                <option value="Hide"@if($home_ad_data->above_footer_ad_status =='Hid') selected @endif >Hide</option>
                                            </select>
                                     </div>
                                        
                                         
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-group">
                                            <button type="submit" class="btn btn-primary">update</button>
                                        </div>
                                    </form>
                </div>
@endsection