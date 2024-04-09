@extends('admin.layout.app')

@section('heading', ' online Poll ')

@section('main_content')

@section('button')
<a href="{{ route('admin_online_poll_show')}}" class="btn btn-primary"><i class="fas fa-eye"></i> view</a>
@endsection

<div class="section-body">
<form action="{{ route('admin_online_poll_store')}}" method="post" enctype="multipart/form-data">
    @csrf

                    <div class="row">

                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                
                       
                                         <div class="form-group mb-3">
                                            <label >Put Question</label>
                                            <textarea name="question" class="form-control"
                                             cols="30" rows="10" style ="height:150px;"></textarea>
                                                
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