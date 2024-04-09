@extends('author.layout.app')

@section('heading', ' Admin Post')

@section('main_content')

@section('button')
<a href="{{ route('author_post_show')}}" class="btn btn-primary"><i class="fas fa-eye"></i> view</a>
@endsection

<div class="section-body">
<form action="{{ route('author_post_store')}}" method="post" enctype="multipart/form-data">
    @csrf

                    <div class="row">

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                         <div class="form-group mb-3">
                                            <label>Post Title</label>
                                                <input type="text" class="form-control" 
                                                name="post_title" value=" " >
                                            </div>
                                            <label>Post Details</label>
                                            <div id="post-container"  class="form-group mb-3">
                                            <textarea name="post_detail" class="form-control snote" cols="30" rows="10">
                                            </textarea>
                                            </div>
                                            

                                          
                                            
                                            <div class="form-group mb-3">
                                            <label>IS Sharable?</label>
                                                <select name="is_share" class="form-control">
                                                    <option value="1"> Yes</option>
                                                    <option value="0"> NO</option>

                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                            <label>Post Title</label>
                                               <div> <input type="file" name="post_photo">
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                            <label>sub_category</label>
                                               <select name="sub_category_id" class="form-control">
                                                @foreach($sub_categories as $item)
                                                <option value="{{$item->id}}">{{$item->sub_category_name}} 
                                                </option>
                                                    @endforeach
                                               </select>
                                            </div>

                                            <div class="form-group mb-3">
                                            <label>IS Comment?</label>
                                                <select name="is_comment" class="form-control">
                                                    <option value="1"> Yes</option>
                                                    <option value="0"> NO</option>

                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                            <label>Tags</label>
                                                <input type="text" class="form-control" 
                                                name="tags" value=" " >
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const postContainer = document.getElementById('post-container');
        const addButton = document.getElementById('add-post-button');
        let postIndex = 0;

        addButton.addEventListener('click', function () {
            const postHtml = `
                <div class="post">
                    <input type="text" name="posts[${postIndex}][post_title]" placeholder="Post Title">
                    <textarea name="posts[${postIndex}][post_detail]" placeholder="Post Detail"></textarea>
                    <input type="file" name="posts[${postIndex}][post_photo]">
                </div>
            `;
            postContainer.insertAdjacentHTML('beforeend', postHtml);
            postIndex++;
        });
    });
</script>

@endsection