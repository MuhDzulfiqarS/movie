<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>MOVIE</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <link href="{{ asset ('assets/img/logo1.png') }}" rel="icon">
  <link href="{{ asset ('assets/img/logo1.png') }}" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <link href="{{ asset ('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset ('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset ('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset ('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset ('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <link href="{{ asset ('assets/css/main.css') }}" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://kit.fontawesome.com/d51e822db9.js" crossorigin="anonymous"></script>
  <link rel="{{ asset ('fontawesome/css/all.css') }}" rel="stylesheet">

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">Movie</h1>
        <span>.</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
            <li><a href="/main1" class="active">{{ __('movie') }}</a></li>
            <li><a href="/favorites">{{ __('favorite_movie') }}</a></li>
             
          <form method="GET" action="/main1" class="search-form">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" name="search"  placeholder="{{ __('search_movie') }}">
          </form>

          <li class="dropdown"><a href="#"><span>{{ __('bahasa') }}</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ url('language/en') }}">English</a></li>
              <li><a href="{{ url('language/id') }}">Bahasa Indonesia</a></li>
            </ul>
          </li>
        </ul>

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    

      <a class="btn-getstarted"  href="{{ url('logout') }}">{{ __('log_out') }}</a>

    </div>
  </header>

  <main class="main">

    <section id="hero" class="hero section">

      <img src="{{ asset ('assets/img/bck.png') }}" alt="" data-aos="fade-in">

      <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 data-aos="fade-up" data-aos-delay="100">{{ __('text1') }}</h2>
                <p data-aos="fade-up" data-aos-delay="200">{{ __('text2') }}</p>
                <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
                    <a href="#movielist" class="btn-get-started">{{ __('mulai_jelajahi') }}</a>
                </div>
            </div>
        </div>
      </div>
    

    </section>

    <section id="movielist" class="movielist section">
      <div class="container">
          <div class="row gy-4 justify-content-center" id="movie-list">
              @foreach($movies as $movie)
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                        <div class="member-img">
                            <img src="{{ $movie['Poster'] }}" class="img-fluid" alt="Movie poster" loading="lazy">
                        </div>
                        <div class="card-body">
                            <h5>{{ $movie['Title'] }}</h5>
                            <div class="btn-group">
                                <a href="/main1/{{ $movie['imdbID'] }}" class="btn btn-primary">
                                    <i class="fas fa-info-circle"></i> {{ __('detail') }}
                                </a>
                                <form method="POST" action="/favorites" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="movie_id" value="{{ $movie['imdbID'] }}">
                                    <input type="hidden" name="title" value="{{ $movie['Title'] }}">
                                    <input type="hidden" name="poster" value="{{ $movie['Poster'] }}">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa-regular fa-heart"></i> {{ __('favorite') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
              @endforeach
          </div>
      </div>
  
      <div id="loading" style="display:none; text-align:center;">
          <p>Loading more movies...</p>
      </div>
  </section>

  </main>

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="{{ asset ('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset ('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{ asset ('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{ asset ('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{ asset ('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{ asset ('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{ asset ('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
  <script src="{{ asset ('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset ('assets/js/main.js')}}"></script>
  <script>
      var page = 1; 

      $(window).scroll(function() {
          if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
              page++; 
              loadMoreMovies(page);
          }
      });

      function loadMoreMovies(page) {
          $.ajax({
              url: '?page=' + page, 
              type: 'GET',
              beforeSend: function() {
                  $('#loading').show(); 
              },
              success: function(data) {
                  if (data.length === 0) {
                      $('#loading').html('<p>No more movies to load</p>');
                      return;
                  }

                  $.each(data, function(index, movie) {
                      $('#movie-list').append(
                          `<div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                              <div class="card">
                                  <div class="member-img">
                                      <img src="${movie.Poster}" class="img-fluid" alt="Movie poster" loading="lazy">
                                  </div>
                                  <div class="card-body">
                                      <h5>${movie.Title}</h5>
                                      <div class="btn-group">
                                          <a href="/main1/${movie.imdbID}" class="btn btn-primary">
                                              <i class="fas fa-info-circle"></i> Details
                                          </a>
                                          <form method="POST" action="/favorites" style="display: inline;">
                                              @csrf
                                              <input type="hidden" name="movie_id" value="${movie.imdbID}">
                                              <input type="hidden" name="title" value="${movie.Title}">
                                              <input type="hidden" name="poster" value="${movie.Poster}">
                                              <button type="submit" class="btn btn-success">
                                                  <i class="fa-regular fa-heart"></i> Add to Favorites
                                              </button>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>`
                      );
                  });

                  $('#loading').hide();
              },
              error: function() {
                  $('#loading').html('<p>Error loading movies</p>');
              }
          });
      }
  </script>

  <script>
    @if (session('success_tambah_data'))
        swal({
            icon: 'success',
            title: 'Berhasil',
            text: 'Berhasil Ditambahkan Ke Favorite Movie',
            showConfirmButton: false,
            timer: 2000
        });
    @endif
  </script>

</body>

</html>