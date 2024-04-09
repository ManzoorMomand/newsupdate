@extends('admin.layout.app')

@section('heading', ' Login')

@section('main_content')



<div class="section-body">
<form action="{{ route('admin_login_update', $login_policy->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label> Login</label>
                        <input type="text" class="form-control" name="login_title" value="{{ $login_policy->login_title }}">
                    </div>
                  
                    <div class="form-group mb-3">
                        <label>Show on Menu</label>
                        <select name="login_status" class="form-control">
                            <option value="Show" @if ($login_policy->login_status == 'Show') selected @endif>Show</option>
                            <option value="Hide" @if ($login_policy->login_status == 'Hide') selected @endif>Hide</option>
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