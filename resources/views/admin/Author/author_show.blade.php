@extends('admin.layout.app')

@section('heading', 'Author List ')

@section('main_content')
@section('button')
<a href="{{ route('admin_author_create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
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
                                                <th>Name</th>
                                                <th>Email</th>
                                                
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($authors as $row)
                                                <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                                    @if($row->photo == null)
                                                <img src="{{asset('uploads/loading.gif')}}" alt=""
                                                    style="width: 50px; height: auto;">
                                                    @else

                                                    <img src="{{asset('uploads/'.$row->photo)}}" alt=""
                                                    style="width: 50px; height: auto;">
                                                    @endif
                                                </td>

                                           <td>{{$row->name}}</td>
                                           <td>{{$row->email}}</td>

                                                
                                                <td class="pt_10 pb_10">
                                                <a href="{{ route('admin_author_edit' ,$row->id)}}" class='far fa-edit' style='font-size:48px;color:blue'></a>
                                                <a href="{{ route('admin_author_delete' ,$row->id)}}" class='far fa-trash-alt' style='font-size:48px;color:red' onClick="return confirm('Are you sure?');"></a>
                                                </td>
                                                
                                            </tr>
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