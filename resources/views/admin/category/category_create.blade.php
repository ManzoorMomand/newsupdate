@extends('admin.layout.app')

@section('heading', ' advertisement')

@section('main_content')

@section('button')
<a href="{{ route('admin_sidebar_ad_show')}}" class="btn btn-primary"><i class="fas fa-eye"></i> view</a>
@endsection

<div class="section-body">
<form action="{{ route('admin_category_store')}}" method="post" enctype="multipart/form-data">
    @csrf

                    <div class="row">

                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                
                       
                                         <div class="form-group mb-3">
                                            <label>Category Name</label>
                                                <input type="text" class="form-control" 
                                                name="category_name" value=" " >
                                            </div>
                                            
                                        <div class="form-group mb-3">
                                            <label>Show on Menu</label>
                                            <select name="show_on_menu" class="form-control">
                                                <option value="Show">Show</option>
                                                <option value="Hide">Hide</option>
                                            </select>
                                     </div>
                                     <div class="form-group mb-3">
                                            <label>Category Order</label>
                                                <input type="text" class="form-control" 
                                                name="category_order" value=" " >
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