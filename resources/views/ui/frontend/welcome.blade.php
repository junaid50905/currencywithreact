<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('ui/frontend') }}/assets/css/style.css">
    <title>Slides show</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    {{-- <div id="header" class="w-100">
      <div class="container">
        <div class="row mt-3">
          <nav class="navbar navbar-expand-lg navbar-dark w-100">
            <a class="navbar-brand" href="#"><img id="mainLogo"
                src="{{ asset('ui/frontend/assets/images/Shahjalal-Islami-Bank-PLC.png') }}"
                alt="HerediaEstudio"></a>
          </nav>
        </div>
      </div>
    </div> --}}

    <!-- Example Code -->
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            {{-- currency exchange rate --}}
            <div class="carousel-item bg-primary active" data-bs-interval="{{ $exchange_rate_duration }}">
                <h1 class="text-danger text-center"
                    style="margin-top: 5vh; font-size: calc(20px + 3vw); margin-bottom: 5vh;">Foreign Currency
                    Exchange Rate
                </h1>
                <div class="table-responsive" style="margin: 0 10vw;">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Currency</th>
                                <th>Code</th>
                                <th>Buying (BDT)</th>
                                <th>Selling (BDT)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($exchange_rates as $exchange_rate)
                                @php
                                    $currency = DB::table('currencies')->find($exchange_rate->currency_id);
                                @endphp
                                <tr>
                                    <td>{{ $currency->symbol }} {{ $currency->name }} <img class="currency_logo"
                                            src="{{ $currency->flag }}" alt=""></td>
                                    <td>{{ $currency->code }}</td>
                                    <td>{{ $exchange_rate->buying_rate }}</td>
                                    <td>{{ $exchange_rate->selling_rate }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- profit --}}
            @foreach ($profits as $profit)
                <div class="carousel-item bg-primary" data-bs-interval="{{ $profit_duration }}">
                    <h1 class="text-danger text-center"
                        style="margin-top: 5vh; font-size: calc(20px + 3vw); margin-bottom: 5vh;">
                        {{ $profit->title }}
                    </h1>
                    <div class="table-responsive" style="margin: 0 10vw;">
                        <table class="table table-bordered table-striped">
                            @php
                                $profit_rates = DB::table('profit_rates')
                                    ->where('profit_id', $profit->id)
                                    ->orderBy('id', 'asc')
                                    ->get();
                            @endphp
                            <tbody>
                                @foreach ($profit_rates as $profit_rate)
                                    <tr>
                                        <td>{{ $profit_rate->title ?? '' }}</td>
                                        <td>{{ $profit_rate->rate ?? '' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
            {{-- image --}}
            @foreach ($images as $image)
                <div class="carousel-item" data-bs-interval="{{ $image->duration }}">
                    <img src="{{ asset('ui/uploads/image') }}/{{ $image->image }}" class="d-block w-100">
                </div>
            @endforeach
            {{-- video --}}
            @foreach ($videos as $video)
                <div class="carousel-item" data-bs-interval="{{ $video->duration }}">
                    <video class=" video-player" autoplay muted playsinline>
                        <source src="{{ asset('ui/uploads/video') }}/{{ $video->video }}" type="video/mp4">
                    </video>
                </div>
            @endforeach
        </div>
        {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button> --}}
    </div>

    <!-- JavaScript to reset video to the start when it becomes active -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var carousel = document.getElementById('carouselExampleInterval');
            carousel.addEventListener('slid.bs.carousel', function(event) {
                var activeItem = event.relatedTarget; // Get the new active carousel item
                var video = activeItem.querySelector('video');

                if (video) {
                    // Pause and reset the video, then play it from the start
                    video.pause();
                    video.currentTime = 0;
                    video.play();
                }
            });
        });
    </script>

    {{-- script for refresh the page after completing slider --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var carousel = document.getElementById('carouselExampleInterval');
            var totalItems = document.querySelectorAll('.carousel-item').length;

            carousel.addEventListener('slid.bs.carousel', function(event) {
                var activeIndex = event.to; // Get the index of the new active carousel item
                var video = event.relatedTarget.querySelector('video');

                // If it's a video, pause and reset it to play from the start
                if (video) {
                    video.pause();
                    video.currentTime = 0;
                    video.play();
                }

                // If the last item is reached, refresh the page
                if (activeIndex === totalItems - 1) {
                    setTimeout(function() {
                        location.reload();
                    }, event.relatedTarget.dataset.bsInterval); // Refresh after the slide interval
                }
            });
        });
    </script>


</body>

</html>
