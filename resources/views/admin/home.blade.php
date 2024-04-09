@extends('admin.layout.app')

@section('heading', 'Dashboard')

@section('main_content')
<style>
.card-icon.bg-black {
  background-color: black;
  color: white; /* Add white text color for visibility */
}
.card-icon.bg-red {
  background-color: red;
  color: white; /* Add white text color for visibility */
}

.card-statistic-1 {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.card-header h4 {
  margin: 0;
}

.card-body {
  font-size: 18px;
}
</style>
<div class="row">
<div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-black">
                <i class="fas fa-book-open"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total News</h4>
                </div>
                <div class="card-body">
                    {{$posts}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-red">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total News Categories</h4>
                </div>
                <div class="card-body">
                   {{$categories}}
                </div>
            </div>
        </div>
    </div>
   
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
    <div class="card-icon bg-success"> <!-- Changed class to "bg-green" -->
        <i class="fas fa-bullhorn"></i>
    </div>
    <div class="card-wrap">
        <div class="card-header">
            <h4>Total Sub Category</h4>
        </div>
        <div class="card-body">
            {{$sub_categorys}}
        </div>
    </div>
</div>
        </div>
        
    </div>
    <div class="row">
<div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-black">
                <i class="fas fa-book-open"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total video</h4>
                </div>
                <div class="card-body">
                    {{$videos}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-red">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Photo</h4>
                </div>
                <div class="card-body">
                   {{$photos}}
                </div>
            </div>
        </div>
    </div>
   
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
    <div class="card-icon bg-success"> <!-- Changed class to "bg-green" -->
        <i class="fas fa-bullhorn"></i>
    </div>
    <div class="card-wrap">
        <div class="card-header">
            <h4>Total poll</h4>
        </div>
        <div class="card-body">
            {{$online_poll}}
        </div>
    </div>
</div>
</div>

@endsection