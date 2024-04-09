@extends('author.layout.app')

@section('heading', 'Author POST')

@section('main_content')
@section('button')
<a href="{{ route('author_post_create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
@endsection
<div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="example1">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Thumbnail</th>
                                                <th>Post Title</th>
                                                <th>Sub Category Name</th>
                                                <th>Category</th>
                                                <th>Author</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($posts as $row)
                                                <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                                <img src="{{asset('uploads/'.$row->post_photo)}}" alt=""
                                                    style="width: 50px; height: auto;">
                                                </td>

                                           <td>
                                            {{$row->post_title}}
                                        </td>
                                                <td>
                                                    {{ $row->rSubCategory->sub_category_name }}
                                                </td>
                                                <td> 
                                                {{ $row->rSubCategory->rCategory->category_name }}
                                                </td>
                                                <td> 
                                                    @if($row->author_id != 0)
                                                    {{ Auth::guard('author')->user()->name }}
                                                    @endif
                                                </td>

                                               
                                                
                                                <td class="pt_10 pb_10">
                                                <a href="{{ route('author_post_edit' ,$row->id)}}" class='far fa-edit' style='font-size:48px;color:blue'></a>
                                                <a href="{{ route('author_post_delete' ,$row->id)}}" class='far fa-trash-alt' style='font-size:48px;color:red' onClick="return confirm('Are you sure?');"></a>
                                            
                                            </td>
                                                
                                            </tr>
                                            </thead>
                                                @endforeach
                                          
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
@endsection