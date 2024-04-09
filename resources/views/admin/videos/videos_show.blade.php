@extends('admin.layout.app')

@section('heading', 'Video')

@section('main_content')
@section('button')
<a href="{{ route('admin_video_create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
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
                                                <th>Video</th>
                                                <th>Captition</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($videos as $row)
                                                <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$row->video_id}}" 
                                                    title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; 
                                                    encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                                </td>

                                              
                                                <td>{{$row->caption}}</td>
                                                
                                                <td class="pt_10 pb_10">
                                                <a href="{{ route('admin_video_edit' ,$row->id)}}" class="btn btn-primary">Edit</a>
                                                <a href="{{ route('admin_video_delete' ,$row->id)}}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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