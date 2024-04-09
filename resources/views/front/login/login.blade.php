@extends('front.layout.app')

@section('main_content')
    <div class="page-top">
        <!-- ... Your page top content ... -->
    </div>
    <div class="page-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Login</h2>
                        <nav class="breadcrumb-container">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Login</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    <div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('author_login_submit') }}" method="post">
                    @csrf <!-- Add this line for CSRF protection -->

                    <div class="login-form">
                        <div class="mb-4">
                            <label for="" class="form-label">Email Address</label>
                            <input type="text" class="form-control" name="email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary bg-website">Login</button>
                            <span><a href="{{route('author_forget_password')}}">forget_password</a></span>
                        </div>
                        
                    </div>
                </form>

                @if(session()->has('error'))
                    <script>
                        iziToast.error({
                            title: '',
                            position: 'topRight',
                            message: '{{ session('error') }}',
                        });
                    </script>
                @endif

                @if(session()->has('success'))
                    <script>
                        iziToast.success({
                            title: '',
                            position: 'topRight',
                            message: '{{ session('success') }}',
                        });
                    </script>
                @endif
            </div>
        </div>
    </div>
</div>


                    </div>
                </div>
            </div>
        </div>
@endsection
