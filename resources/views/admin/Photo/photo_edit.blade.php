@extends('admin.layout.app')

@section('heading', ' advertisement')

@section('main_content')

@section('button')
<a href="{{ route('admin_category_show')}}" class="btn btn-primary"><i class="fas fa-eye"></i> view</a>
@endsection

<div class="section-body">
<form action="{{ route('admin_photo_update',$photo->id)}}" method="post" enctype="multipart/form-data">
    @csrf

    <style>
    img{
    max-width: 45%;
    height: auto;
}

</style>
                    <div class="row">

                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                
                       
                                <div class="form-group mb-3">
           
            <img src="{{ asset('uploads/'.$photo->photo) }}" alt="">
        </div>
        
        <div class="form-group mb-3">
            <label>Caption</label>
            <input type="text" class="form-control" name="caption" value="{{ $photo->caption }}">
        </div>
        
        <div class="form-group mb-3">
            <label>Upload New Photo</label>
            <input type="file" name="photo" class="form-control-file">
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