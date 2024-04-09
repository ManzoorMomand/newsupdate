@extends('admin.layout.app')

@section('heading', ' Contact ')

@section('main_content')



<div class="section-body">
<form action="{{ route('admin_contact_update', $contact_page->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label>Contact Title</label>
                        <input type="text" class="form-control" name="contact_title" value="{{ $contact_page->contact_title }}">
                    </div>
                    <div class="form-group mb-3">
                        <label>Contact Details</label>
                        <textarea name="contact_detail" class="form-control snote" cols="30" rows="10">
                            {{ $contact_page->contact_detail }}
                        </textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label>Map (iFram Code)</label>
                        <textarea name="contact_map" class="form-control snote"
                         cols="30" rows="10" style ="Height:120px;">
                            {{ $contact_page->contact_map }}
                        </textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label>Show on Menu</label>
                        <select name="contact_status" class="form-control">
                            <option value="Show" @if ($contact_page->contact_status == 'Show') selected @endif>Show</option>
                            <option value="Hide" @if ($contact_page->contact_status == 'Hide') selected @endif>Hide</option>
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