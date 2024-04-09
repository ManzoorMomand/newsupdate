@extends('admin.layout.app')

@section('heading', ' Disclaimer')

@section('main_content')



<div class="section-body">
<form action="{{ route('admin_disclaimer_update', $disclaimer_policy->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label> Disclaimer Title</label>
                        <input type="text" class="form-control" name="disclaimer_title" value="{{ $disclaimer_policy->disclaimer_title }}">
                    </div>
                    <div class="form-group mb-3">
                        <label></label>
                        <textarea name="disclaimer_detail" class="form-control snote" cols="30" rows="10">
                            {{ $disclaimer_policy->disclaimer_detail }}
                        </textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label>Show on Menu</label>
                        <select name="disclaimer_status" class="form-control">
                            <option value="Show" @if ($disclaimer_policy->disclaimer_status == 'Show') selected @endif>Show</option>
                            <option value="Hide" @if ($disclaimer_policy->disclaimer_status == 'Hide') selected @endif>Hide</option>
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