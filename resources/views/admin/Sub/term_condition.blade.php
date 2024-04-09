@extends('admin.layout.app')

@section('heading', ' Page Terms')

@section('main_content')



<div class="section-body">
<form action="{{ route('admin_terms_update', $page_terms->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label> Term and Condition</label>
                        <input type="text" class="form-control" name="terms_title" value="{{ $page_terms->terms_title }}">
                    </div>
                    <div class="form-group mb-3">
                        <label></label>
                        <textarea name="terms_detail" class="form-control snote" cols="30" rows="10">
                            {{ $page_terms->faq_detail }}
                        </textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label>Show on Menu</label>
                        <select name="terms_status" class="form-control">
                            <option value="Show" @if ($page_terms->terms_status == 'Show') selected @endif>Show</option>
                            <option value="Hide" @if ($page_terms->terms_status == 'Hide') selected @endif>Hide</option>
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