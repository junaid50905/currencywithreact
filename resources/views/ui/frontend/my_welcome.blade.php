<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Video and Image Carousel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Make the carousel and its items take up 100% height and width */
        .carousel,
        .carousel-item,
        .carousel-item img,
        .carousel-item video {
            width: 100%;
            height: 100vh;
            /* Full viewport height */
        }

        .carousel-item img,
        .carousel-item video {
            object-fit: cover;
            /* Ensure video and image cover the entire slide */
        }
    </style>
</head>

<body>
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="1000">
                <img src="https://static.vecteezy.com/system/resources/previews/010/200/089/non_2x/bank-building-with-money-tree-tiny-people-holds-gold-coins-near-government-finance-department-or-tax-office-column-building-vector.jpg"
                    class="d-block w-100" alt="...">
            </div>

            @foreach ($images as $image)
                <div class="carousel-item" data-bs-interval="{{ $image->duration }}">
                    <img src="{{ asset('ui/uploads/image/' . $image->image) }}" alt="...">
                </div>
            @endforeach

            @foreach ($videos as $video)
                <div class="carousel-item" data-bs-interval="{{ $video->duration }}">
                    <video class="d-block w-100" autoplay muted playsinline>
                        <source src="{{ asset('ui/uploads/video/' . $video->video) }}" type="video/mp4">
                    </video>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
