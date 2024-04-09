@extends('admin.layout.app')

@section('heading', ' Page privacy')

@section('main_content')



<div class="section-body">
<form action="{{ route('admin_policy_update', $pages_policy->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label> Privacy Title</label>
                        <input type="text" class="form-control" name="privacy_title" value="{{ $pages_policy->privacy_title }}">
                    </div>
                    <div class="form-group mb-3">
                        <label>Details policy</label>
                        <textarea name="privacy_detail" class="form-control snote" cols="30" rows="10">
                            {{ $pages_policy->privacy_detail }}
                        </textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label>Show on Menu</label>
                        <select name="privacy_status" class="form-control">
                            <option value="Show" @if ($pages_policy->privacy_status == 'Show') selected @endif>Show</option>
                            <option value="Hide" @if ($pages_policy->privacy_status == 'Hide') selected @endif>Hide</option>
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