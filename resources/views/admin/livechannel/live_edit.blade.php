@extends('admin.layout.app')

@section('heading', ' Edit live Video')

@section('main_content')

@section('button')
<a href="{{ route('admin_live_show')}}" class="btn btn-primary"><i class="fas fa-eye"></i> view</a>
@endsection

<div class="section-body">
<form action="{{ route('admin_live_update',$video_edit->id)}}" method="post" enctype="multipart/form-data">
    @csrf

                    <div class="row">

                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                
                       
                                         <div class="form-group mb-3">
                                            <label>Video Id</label>
                                                <input type="text" class="form-control"
                                                name="video_id" value ="{{$video_edit->video_id}}" >
                                                
                                            </div>
                                             
                                      
                                     <div class="form-group mb-3">
                                            <label>Caption</label>
                                                <input type="text" class="form-control" 
                                                name="heading" value="{{$video_edit->heading}}" >
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