@extends('admin.layout.app')

@section('heading', 'Admin Post')

@section('main_content')

@section('button')
<a href="{{ route('admin_post_show_ajax') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection

<div class="section-body">
    <form action="{{ route('admin_post_store_ajax') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Post Title</label>
                            <input type="text" class="form-control" name="post_title" value="">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label>Post Details</label>
                            <div id="post-container" class="form-group mb-3">
                                <textarea name="post_detail" class="form-control snote" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label>IS Sharable?</label>
                            <select name="is_share" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">NO</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>Post Photo</label>
                            <div><input type="file" name="post_photo"></div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Sub Category</label>
                            <select name="sub_category_id" class="form-control">
                                @foreach($sub_categories as $item)
                                <option value="{{ $item->id }}">{{ $item->sub_category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>IS Comment?</label>
                            <select name="is_comment" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">NO</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>Tags</label>
                            <input type="text" class="form-control" name="tags" value="">
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

<script src="https://cdn.tiny.cloud/1/YOUR_API_KEY/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea.snote',
        plugins: 'image',
        toolbar: 'image',
        images_upload_url: '/uploads', // Your image upload route
        images_upload_handler: function (blobInfo, success, failure) {
            // Your image upload logic here
        }
    });
</script>
@endsection
