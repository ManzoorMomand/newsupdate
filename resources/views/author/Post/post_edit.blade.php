@extends('author.layout.app')

@section('heading', ' Author ')

@section('main_content')

@section('button')
<a href="{{ route('author_post_show')}}" class="btn btn-primary"><i class="fas fa-eye"></i> view</a>
@endsection

<div class="section-body">
<form action="{{ route('author_post_update',$posts_EDIT->id)}}" method="post" enctype="multipart/form-data">
    @csrf

                    <div class="row">

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                         <div class="form-group mb-3">
                                            <label>Post Title</label>
                                                <input type="text" class="form-control" 
                                                name="post_title" value="{{$posts_EDIT->post_title }}" >
                                            </div>
                                            <div class="form-group mb-3">
                                            <label>Post Details</label>
                                            <textarea name="post_detail" class="form-control snote" cols="30" 
                                            rows="10" >{{$posts_EDIT->post_detail }}
                                            </textarea>
                                            </div>
                             
                                            <div class="form-group mb-3">
                                            <label>Existing Photo</label>
                                            <div>
                                                <img src="{{asset('uploads/' .$posts_EDIT->post_photo) }}" alt="" style="width: 100px;">
                                            </div>
                                     </div>
                                            <div class="form-group mb-3">
                                            <label>Post Photo</label>
                                        
                                               <div> <input type="file" name="post_photo">
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                            <label>sub_category</label>
                                               <select name="sub_category_id" class="form-control">
                                                @foreach($sub_categories as $item)
                                                <option value="{{$item->id}}" @if($item->id == $posts_EDIT->sub_category_id) selected @endif>
                                                    {{$item->sub_category_name}} ({{$item->rCategory->category_name}})
                                                </option>
                                                    @endforeach
                                               </select>
                                            </div>
                                            <div class="form-group mb-3">
                                            <label>IS Sharable?</label>
                                                <select name="is_share" class="form-control">
                                                <option value="1" @if($posts_EDIT->is_share == 1 )selected @endif> Yes</option>
                                                    <option value="0" @if($posts_EDIT->is_share == 0 )selected @endif> NO</option>

                                                </select>
                                            </div>

                                            <div class="form-group mb-3">
                                            <label>IS Comment?</label>
                                                <select name="is_comment" class="form-control">
                                                    <option value="1" @if($posts_EDIT->is_comment == 1 )selected @endif> Yes</option>
                                                    <option value="0" @if($posts_EDIT->is_comment == 0 )selected @endif> NO</option>

                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                            <label>Existing Tags</label>
                                                <table class ="table table-borderd">

                                                @foreach($existing_tags as $item)
                                                    <tr>
                                                        <td>
                                                        {{$item->tag_name}}
                                                        </td>
                                                        <td>
                                                        <a href="{{ route('author_post_delete_tag',[$item->id,$posts_EDIT->id]) }}" 
                                                        class="fa fa-trash" onClick="return confirm('Are you sure?');"></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </table>
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
                                            <button type="submit" class="btn btn-primary">update</button>
                                        </div>
                                    </form>
                </div>
@endsection