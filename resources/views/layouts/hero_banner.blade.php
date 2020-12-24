<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Loại sản phẩm</span>

                    </div>
                    <ul>
                        @foreach($typeProduct as $typeProduct)
                            <li><a href="{{ route('category', $typeProduct->id) }}">{{ $typeProduct->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
{{--                        <form action="{{route('search') }}" method="post">--}}
{{--                            @csrf--}}

{{--                            <div class="hero__search__categories">--}}
{{--                                Bạn cần gì ?--}}
{{--                            </div>--}}
{{--                            <input type="text" placeholder="What do yo u need?" name="contentSearch">--}}
{{--                            <button type="submit" class="site-btn">SEARCH</button>  --}}
{{--                        </form>--}}
                        <style>
                            @import url('https://fonts.googleapis.com/css?family=Montserrat');

                            #search-form {
                                width: 100%;
                                margin: 0 auto;
                                position: relative;
                            }
                            #search-form input {
                                width: 100%;
                                font-size: 1.5rem;
                                padding: 10px 15px;
                                border: 2px solid #ccc;
                                border-radius: 2px;
                            }
                            #search-form button {
                                position: absolute;
                                top: 0;
                                right: 0;
                                bottom: 0;
                                background-color: transparent;
                                outline: none;
                                border: none;
                                width: 3rem;
                                text-align: center;
                                font-size: 1.75rem;
                                cursor: pointer;
                                color: #333;
                            }
                        </style>
                        <form action="https://www.google.com/search" method="get" target="_blank" id="search-form">
                            <input name="q" type="text" placeholder="Bạn cần gì ?" autocomplete="off" autofocus>
                            <!-- <button type="button"><i class="fas fa-microphone"></i></button> -->
                            {{--<i class="fa fa-microphone" aria-hidden="true"></i>--}}
                        </form>
                    </div>
                    <style>
                        .hero__search__phone a:hover{
                            color: #007bff;
                        }
                    </style>
                    @if(Auth::check())
                        <div class="hero__search__phone">
                            <style>
                                .tu_chinh{
                                    font-size: 18px;
                                    text-align: center;
                                    float: left;
                                    margin-right: 20px;
                                    margin-top: 10px;
                                }
                            </style>
                            <div class="tu_chinh">
                                <strong>{{ Auth::user()->name }}</strong>
                            </div>
                            <div class="hero__search__phone__icon">
                                <a href="{{ route('logout') }}">
                                    <i class="fa fa-sign-out" aria-hidden="true" title="Đăng xuất"></i>
                                </a>
                            </div>

{{--                            <div class="btn-group">--}}
{{--                                <style>--}}
{{--                                    .dropdown{--}}
{{--                                        left: 100px;--}}
{{--                                        bottom: 510px;--}}
{{--                                        position: relative;--}}
{{--                                    }--}}
{{--                                    .dropdown:hover>.dropdown-menu {--}}
{{--                                        display: block;--}}
{{--                                        padding-bottom: 10px;--}}
{{--                                    }--}}

{{--                                    .sticky {--}}
{{--                                        position: relative;--}}
{{--                                    }--}}
{{--                                </style>--}}
{{--                                <div class="dropdown" id="myButton">--}}
{{--                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                        --}}
{{--                                    </button>--}}
{{--                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                                        <a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}
                        </div>

                    @else
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <a href="{{ url('/login') }}"><i class="fa fa-user" aria-hidden="true"
                                                                 title="Đăng nhập"></i></a>
                            </div>
                            <div class="hero__search__phone__icon">
                                <a href="{{url('/register')}}"><i class="fa fa-arrow-circle-o-right" aria-hidden="true" title="Đăng ký"></i></a>
                            </div>
                        </div>
                    @endif

                </div>
                <div id="carouselId" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselId" data-slide-to="1"></li>
                        <li data-target="#carouselId" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img src="{{ asset('public/img/banner6.png') }}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('public/img/banner3.png') }}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('public/img/banner7.png') }}" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<script>
    window.onscroll = function() {myFunction()};

    var header = document.getElementById("myButton");
    var sticky = header.offsetTop;

    function myFunction() {
        if (window.pageYOffset > sticky && window.pageYOffset > cauhoiSticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
</script>

<script>
    const searchForm = document.querySelector("#search-form");
    const searchFormInput = searchForm.querySelector("input"); // <=> document.querySelector("#search-form input");
    const info = document.querySelector(".info");

    // The speech recognition interface lives on the browser’s window object
    const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition; // if none exists -> undefined

    if(SpeechRecognition) {
        console.log("Your Browser supports speech Recognition");

        const recognition = new SpeechRecognition();
        recognition.continuous = true;
        // recognition.lang = "en-US";

        searchForm.insertAdjacentHTML("beforeend", '<button type="button"><i class="fa fa-microphone" aria-hidden="true"></i></button>');
        searchFormInput.style.paddingRight = "50px";

        const micBtn = searchForm.querySelector("button");
        const micIcon = micBtn.firstElementChild;

        micBtn.addEventListener("click", micBtnClick);
        function micBtnClick() {
            if(micIcon.classList.contains("fa-microphone")) { // Start Voice Recognition
                recognition.start(); // First time you have to allow access to mic!
            }
            else {
                recognition.stop();
            }
        }

        recognition.addEventListener("start", startSpeechRecognition); // <=> recognition.onstart = function() {...}
        function startSpeechRecognition() {
            micIcon.classList.remove("fa-microphone");
            micIcon.classList.add("fa-microphone-slash");
            searchFormInput.focus();
            console.log("Voice activated, SPEAK");
        }

        recognition.addEventListener("end", endSpeechRecognition); // <=> recognition.onend = function() {...}
        function endSpeechRecognition() {
            micIcon.classList.remove("fa-microphone-slash");
            micIcon.classList.add("fa-microphone");
            searchFormInput.focus();
            console.log("Speech recognition service disconnected");
        }

        recognition.addEventListener("result", resultOfSpeechRecognition); // <=> recognition.onresult = function(event) {...} - Fires when you stop talking
        function resultOfSpeechRecognition(event) {
            const current = event.resultIndex;
            const transcript = event.results[current][0].transcript;

            if(transcript.toLowerCase().trim()==="stop recording") {
                recognition.stop();
            }
            else if(!searchFormInput.value) {
                searchFormInput.value = transcript;
            }
            else {
                if(transcript.toLowerCase().trim()==="go") {
                    searchForm.submit();
                }
                else if(transcript.toLowerCase().trim()==="reset input") {
                    searchFormInput.value = "";
                }
                else {
                    searchFormInput.value = transcript;
                }
            }
            // searchFormInput.value = transcript;
            // searchFormInput.focus();
            // setTimeout(() => {
            //   searchForm.submit();
            // }, 500);
        }

        info.textContent = 'Voice Commands: "stop recording", "reset input", "go"';

    }
    else {
        console.log("Your Browser does not support speech Recognition");
        info.textContent = "Your Browser does not support Speech Recognition";
    }
</script>
