@extends('admin.layout.app')

@section('heading', 'List of Contacts')

@section('main_content')

@section('content')
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
                                                <th>Category Name</th>
                                                <th>Order</th>

                                                <th>Show On menu</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($contacts as $row)
                                                <tr>
                                                <td>{{$loop->iteration}}</td>
                                           
                                                <td>{{$row->name}}</td>
                                                <td>{{$row->email}}</td>

                                                <td>{{$row->message}}</td>
                                                <td class="pt_10 pb_10">
                                                <a href="" class="btn btn-primary">Edit</a>
                                                <a href="" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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
