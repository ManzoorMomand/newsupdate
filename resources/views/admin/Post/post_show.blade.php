@extends('admin.layout.app')

@section('heading', 'Home POST')

@section('main_content')
@section('button')
<a href="{{ route('admin_post_create_ajax')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
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
                                    <th>Admin</th>
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
                                    <td>{{$row->post_title}}</td>
                                    <td>{{ $row->rSubCategory->sub_category_name }}</td>
                                    <td>{{ $row->rSubCategory->rCategory->category_name }}</td>
                                    <td>
                                        @if($row->author_id != 0)
                                        {{ \App\Models\Author::where('id',$row->author_id)->first()->name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($row->admin_id != 0)
                                        {{ Auth::guard('admin')->user()->name }}
                                        @endif
                                    </td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_post_edit_ajax' ,$row->id)}}" class='far fa-edit'
                                            style='font-size:48px;color:blue'></a>
                                        <a href="{{ route('admin_post_delete_ajax' ,$row->id)}}" class='far fa-trash-alt'
                                            style='font-size:48px;color:red' onClick="return confirm('Are you sure?');"></a>
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

<!-- Create Post Modal -->
<div class="modal fade" id="createPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createPostForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Form fields go here -->
                    <!-- Example: -->
                    <div class="form-group">
                        <label for="post_title">Post Title</label>
                        <input type="text" class="form-control" id="post_title" name="post_title" required>
                    </div>
                    <!-- Add other form fields here -->
                    <button type="submit" class="btn btn-primary">Create Post</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#openCreatePostForm').click(function () {
            $('#createPostModal').modal('show'); // Open the modal
        });

        $('#createPostForm').on('submit', function (e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: '{{ route("admin_post_store_ajax") }}', // Update the route name
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    // Handle success, e.g., show a success message, clear the form, or redirect
                    console.log('Post created successfully');
                    $('#createPostForm')[0].reset(); // Clear the form
                },
                error: function (xhr) {
                    // Handle errors, e.g., show an error message
                    console.error('Error:', xhr.responseText);
                }
            });
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: '/posts', // Replace with the actual URL
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                // Handle the JSON data here
                console.log(data);
            },
            error: function(xhr) {
                // Handle errors here
                console.error('Error:', xhr.responseText);
            }
        });
    });
</script>

@endsection
