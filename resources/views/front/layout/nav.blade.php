<style>
    /* Style for Arabic text in the website menu */
    .navbar-nav .nav-item .nav-link {
        font-size: 22px; /* Default font size */
    }
</style>

<div class="website-menu">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mb-2 mb-lg-0"> <!-- Use ml-auto to align menu items to the right -->

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    عکسونه/ویډیوګانی
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('photo') }}">عکسونه</a></li>
                                    <li><a class="dropdown-item" href="{{ route('video') }}">ویډیوګانی</a></li>
                                </ul>
                            </li>
                            @foreach($global_categories as $item)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ $item->category_name }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach ($item->rSubCategory as $row)
                                            <li><a class="dropdown-item" href="{{ route('category', $row->id) }}">{{ $row->sub_category_name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">کورپاڼه</a>
                            </li>
                        </ul>
                        
                        <!-- Buttons for changing font size -->
                        <div class="font-size-controls">
                            <button id="increaseFontSize" class="btn btn-sm btn-primary">+</button>
                            <button id="decreaseFontSize" class="btn btn-sm btn-primary">-</button>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('increaseFontSize').addEventListener('click', function() {
        changeFontSize(2); // Increase font size by 2 pixels
    });

    document.getElementById('decreaseFontSize').addEventListener('click', function() {
        changeFontSize(-2); // Decrease font size by 2 pixels
    });

    function changeFontSize(change) {
        var navLinks = document.querySelectorAll('.navbar-nav .nav-item .nav-link');
        for (var i = 0; i < navLinks.length; i++) {
            var currentSize = parseInt(window.getComputedStyle(navLinks[i]).fontSize, 10);
            var newSize = currentSize + change;
            navLinks[i].style.fontSize = newSize + 'px';
        }
    }
</script>
