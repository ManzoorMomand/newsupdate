@extends('admin.layout.app')

@section('heading', ' Pages')

@section('main_content')



<div class="section-body">
<form action="{{ route('admin_page_update', $page->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label> About Title</label>
                        <input type="text" class="form-control" name="about_title" value="{{ $page->about_title }}">
                    </div>
                    <div class="form-group mb-3">
                        <label></label>
                        <textarea name="about_detail" class="form-control snote" cols="30" rows="10">
                            {{ $page->about_detail }}
                        </textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label>Show on Menu</label>
                        <select name="about_status" class="form-control">
                            <option value="Show" @if ($page->about_status == 'Show') selected @endif>Show</option>
                            <option value="Hide" @if ($page->about_status == 'Hide') selected @endif>Hide</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-check"></i> Update
    </button>
</div>
</form>
                  
@endsection