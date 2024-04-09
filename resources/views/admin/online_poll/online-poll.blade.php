@extends('admin.layout.app')

@section('heading', 'onlin Poll')

@section('main_content')
@section('button')
<a href="{{ route('admin_online_poll_create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
@endsection
<style>
    .thumbnail-image {
    max-width: 45%;
    height: auto;
}

</style>
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
                                                <th>online poll Question</th>
                                                <th>Yes_Vote</th>
                                                <th>No_Vote</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($online_poll_data as $row)
                                                <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                               {{$row->question}}
                                                </td>

                                              
                                                <td>{{$row->yes_vote}}</td>
                                                
                                                <td>
                                                    {{$row->no_vote}}
                                                </td>
                                                <td class="pt_10 pb_10">
                                                <a href="{{ route('admin_online_poll_edit' ,$row->id)}}" class='far fa-edit' style='font-size:48px;color:blue'></a>
                                                <a href="{{ route('admin_online_poll_delete' ,$row->id)}}" class='far fa-trash-alt' style='font-size:48px;color:red' onClick="return confirm('Are you sure?');"></a>
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