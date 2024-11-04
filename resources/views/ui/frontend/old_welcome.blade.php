<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel='stylesheet' href='{{ asset('ui/frontend') }}/assets/css/bootstrap.min.css'>
    <link rel="stylesheet" href="{{ asset('ui/frontend') }}/assets/css/style.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <!-- <div id="header" class="w-100">
      <div class="container">
        <div class="row mt-3">
          <nav class="navbar navbar-expand-lg navbar-dark w-100">
            <a class="navbar-brand" href="#"><img id="mainLogo"
                src="https://www.herediaestudio.com.ar/wp-content/uploads/2020/02/ParaWeb2020.png"
                alt="HerediaEstudio"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
              data-target="#navbarText" aria-controls="navbarText"
              aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#services">Services</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Process</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Team</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" target="_BLANK" href>Blog</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link MyButton buttonYellow" href="#">Let's
                    Talk!</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>

    </div> -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <!-- <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="1"
          class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"
          class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"
          class="active"></li>
      </ol> -->
        <div id="carrousel" class="carousel-inner">
            <!-- Carousel item  1 -->
            @foreach ($videos as $video)
                <div data-pause="true" data-interval="{{ $video->duration }}" class="carousel-item">
                    <div class="video-background">
                        <div class="video-foreground">
                            <video class="w-100 h-100 video-player" autoplay muted playsinline>
                                <source src="{{ asset('ui/uploads/video') }}/{{ $video->video }}" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- <div data-pause="true" data-interval="20000" class="carousel-item">
                <div class="video-background">
                    <div class="video-foreground">
                        <iframe src="https://www.youtube.com/embed/cNOKQIw81SE?si=xXUlCF-7rDAQ6IS3" frameborder="0"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div> --}}
            <!-- end of carousel item 1-->
            <!-- Carousel item  2 -->
            @foreach ($images as $image)
                <div data-pause="true" data-interval="{{ $image->duration }}" class="carousel-item">
                    <div class="videoSlider">
                        <img src="{{ asset('ui/uploads/image') }}/{{ $image->image }}" class="d-block w-100">
                    </div>
                </div>
            @endforeach

            <!-- end of carousel item 2-->
            <!-- Carousel item  3 -->
            <div data-pause="true" data-interval="{{ $duration }}" class="carousel-item bb_g active">
                <div class="currency_deta">
                    <h1 class="text-danger">Cash Foreign Currency</h1>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Currency</th>
                                    <th>Code</th>
                                    <th>Buying Rate (TK)</th>
                                    <th>Selling Rate (TK)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($exchange_rates as $exchange_rate)
                                    @php
                                        $currency = DB::table('currencies')->find($exchange_rate->currency_id);
                                    @endphp
                                    <tr>
                                        <td>{{ $currency->name }} ({{ $currency->symbol }})</td>
                                        <td>{{ $currency->code }}</td>
                                        <td>{{ $exchange_rate->buying_rate }}</td>
                                        <td>{{ $exchange_rate->selling_rate }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
            <!-- end of carousel item 3-->

        </div>
        {{-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a> --}}

    </div>
    <!-- partial -->
    <script src='{{ asset('ui/frontend') }}/assets/js/jquery.min.js'></script>
    <script src='{{ asset('ui/frontend') }}/assets/js/bootstrap.min.js'></script>
    <script>
        $(document).ready(function () {
            // Get the total number of slides
            var totalItems = $('.carousel-item').length;
            var currentIndex = 0;

            // Listen to the 'slid.bs.carousel' event to detect when the last slide has been shown
            $('#carouselExampleIndicators').on('slid.bs.carousel', function () {
                currentIndex = $('.carousel-item.active').index() + 1; // Get current slide index

                // If the last slide is reached, refresh the page
                if (currentIndex === totalItems) {
                    setTimeout(function () {
                        location.reload(); // Refresh the page after a short delay
                    }, 2000); // 2-second delay before refresh
                }
            });
        });
    </script>



</body>

</html>
