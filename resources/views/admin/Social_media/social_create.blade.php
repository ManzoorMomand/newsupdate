@extends('admin.layout.app')

@section('heading', ' Social ITEM')

@section('main_content')

@section('button')
<a href="{{ route('admin_social_item_show')}}" class="btn btn-primary"><i class="fas fa-eye"></i> view</a>
@endsection

<div class="section-body">
<form action="{{ route('admin_social_item_store')}}" method="post" enctype="multipart/form-data">
    @csrf

                    <div class="row">

                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                
                       
                                         <div class="form-group mb-3">
                                            <label>Social Item</label>
                                                <input type="text" class="form-control" 
                                                name="icon" value=" " >
                                            </div>
                                            
                                       
                                     <div class="form-group mb-3">
                                            <label>URL</label>
                                                <input type="text" class="form-control" 
                                                name="url" value=" " >
                                            </div>
                                      
                                </div>
                            </div>
                        </div>

                       
                        
                    </div>
                    <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                </div>
@endsection