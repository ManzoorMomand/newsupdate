@extends('admin.layout.app')

@section('heading', ' Add Author')

@section('main_content')

@section('button')
<a href="{{ route('admin_author_user_show')}}" class="btn btn-primary"><i class="fas fa-eye"></i> view</a>
@endsection

<div class="section-body">
<form action="{{ route('admin_author_update',$authors_data->id)}}" method="post" enctype="multipart/form-data">
    @csrf

                    <div class="row">
                    <div class="col-12">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin_author_store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label>Existing Photo</label> <br>
                    <img src="{{ asset('uploads/'.$authors_data->photo)}}" alt="" 
                    style = "width:150px;">
                </div>
                <div class="form-group mb-3">
                    <label>Photo</label>
                    <input type="file" name="photo" class="form-control-file" >
                </div>
                <div class="form-group mb-3">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value ="{{$authors_data->name}}"> 
                </div>
                <div class="form-group mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value ="{{$authors_data->email}}">
                </div>
                <div class="form-group mb-3">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group mb-3">
                    <label>Retype Password</label>
                    <input type="password" class="form-control" name="retype_password">
                </div>
                <button type="submit" class="btn btn-primary">Add Author</button>
            </form>
        </div>
    </div>
</div>


                       
                        
                    </div>
                    
                </div>

               

@endsection