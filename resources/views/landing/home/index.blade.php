<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ruang Teh</title>

  <!--
      - favicon
    -->
  <link rel="shortcut icon" href="./assets/favicon.png">

  <!--
      - custom css link
    -->
  <link rel="stylesheet" href="{{ asset('landing/style.css') }}">

  <!--
      - google font link
    -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap"
    rel="stylesheet">

  <style>
  .btn-login {
    background-color: transparent;
    color: brown; /* Warna teks coklat */
    border: 1px solid brown; /* Warna border coklat */
  }

  .btn-login:hover {
    background-color: brown; /* Warna latar belakang coklat saat hover */
    color: white; 
    transition: 0.3s;
  }


    @media screen and (min-width: 768px) {
      .hero-text {
        width: 40%;
        color: rgb(0, 0, 0);
      }
    }
  </style>
</head>

<body>

  <!--
      - #HEADER
    -->

  <header class="header" data-header>
    <div class="container">

      <div class="overlay" data-overlay></div>

      <a href="#" class="logo" style="text-decoration: none; color: brown; font-weight: bold; font-size: 20px;">
        Ruang Teh
      </a>

      <nav class="navbar" data-navbar>
        <ul class="navbar-list">
          <li>
            <a href="#home" class="navbar-link" data-nav-link>Beranda</a>
          </li>
          <li>
            <a href="#featured-product" class="navbar-link" data-nav-link>Produk</a>
          </li>
          <li>
            <a href="#latest-articles" class="navbar-link" data-nav-link>Artikel</a>
          </li>
        </ul>
      </nav>

      <div class="header-actions">
        <a href="https://wa.me/6283879443927" class="btn btn-login" target="_blank">
          <span>Contact</span>
        </a>
         <a href="{{ route('auth.index') }}" class="btn btn-login" target="_blank">
          <span>Login Admin</span>
        </a>
        

      </div>

    </div>
  </header>


  <main>
    <article>

      <!--
          - #HERO
        -->

      <section class="section hero" id="home">
        <div class="container">

          <div class="hero-content">
            <h2 class="h1 hero-title" style="font-weight: 900;">
              Ruang Teh
            </h2>

            <p class="hero-text">
              Teh adalah minuman yang terbuat dari daun teh yang telah diolah dengan cara diseduh dengan air panas. indonesia menjadi salah satu negara penghasil teh terbesar di dunia. Teh memiliki banyak manfaat bagi kesehatan tubuh, salah satunya adalah sebagai antioksidan.
            </p>

             <a href="https://wa.me/6283846588978" class="btn btn-login" target="_blank" style="width: 40%;">Contact Kami</a>
          </div>

          <div class="hero-banner"></div>
        </div>
      </section>





      <!--
          - #FEATURED CAR
        -->

      <section class="section featured-car" id="featured-product">
        <div class="container">

          <div class="title-wrapper">
            <h2 class="h2 section-title">Teh terbaru</h2>
          </div>

          <ul class="featured-car-list">
            @foreach ($products as $product)
              <li>
                <div class="featured-car-card">
                  <figure class="card-banner">
                    <img src="{{ $product->image ?? asset('img/placeholder.jpeg') }}" alt="mobil" loading="lazy" width="440"
                      height="300" class="w-100">
                  </figure>

                  <div class="card-content">
                    <div class="card-title-wrapper">
                      <h3 class="h3 card-title">
                        {{ $product->name }}
                      </h3>
                    </div>

                    <div class="">
                      <p class="card-text" style="font-size: 14px; color: #6c757d; margin-bottom: 10px;">
                        {{ $product->description }}
                      </p>
                    </div>

                    <div class="card-list">
                    </div>

                    <div class="card-price-wrapper">
                      <p class="card-price">
                        <strong>{{ formatRupiah($product->price) }}</strong>
                      </p>
                      <a href="{{ route('products.handleClick', $product) }}" class="btn btn-login" target="_blank">Beli</a>
                    </div>
                  </div>
                </div>
              </li>
            @endforeach
          </ul>

        @if ($products->isEmpty())
        <div style="margin-top: 50px; margin-bottom: 50px;">
            <p style="text-align: center; font-size: 20px; color: #6c757d;">
                Tidak ada Teh
            </p>
        </div>
    @endif

 <div class="text-center mt-4">
    <a href="{{ route('products.search') }}" class="btn btn-login">Cari Produk di Kota Anda</a>
</div>

    <section class="section latest-articles" id="latest-articles">
        <div class="container">
            <h2 class="h2 section-title">Artikel Terbaru</h2>
            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h4 class="card-title" style="font-size: 1.5rem; font-weight: bold;">{{ $article->title }}</h4>
                                <p class="card-text">{{ Str::limit($article->description, 1000) }}</p>
                                <a href="{{ route('articles.handleClick', $article) }}"  target="_blank">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

@if ($articles->isEmpty())
    <div style="margin-top: 50px; margin-bottom: 50px;">
        <p style="text-align: center; font-size: 20px; color: #6c757d;">
            Tidak ada artikel
        </p>
    </div>
@endif
        </div>
      </section>
    </article>
  </main>





  <!--
      - #FOOTER
    -->

  <footer class="footer">
    <div class="container">

      <div class="footer-top">

        <div class="footer-brand">
          <a href="#" class="logo">
            <img src="{{ asset('img/logo.png') }}" alt="logo" style="width: 50%;">
          </a>

          <p class="footer-text">
           Ruang Teh adalah platform yang menyediakan berbagai macam produk terbaru dengan harga terjangkau.
          </p>
        </div>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Company</p>
          </li>

          <li>
            <a href="#" class="footer-link">About us</a>
          </li>

          <li>
            <a href="#" class="footer-link">Pricing plans</a>
          </li>

          <li>
            <a href="#" class="footer-link">Contacts</a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Support</p>
          </li>

          <li>
            <a href="#" class="footer-link">Help center</a>
          </li>

          <li>
            <a href="#" class="footer-link">Ask a question</a>
          </li>

          <li>
            <a href="#" class="footer-link">Privacy policy</a>
          </li>

          <li>
            <a href="#" class="footer-link">Terms & conditions</a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Neighborhoods in New York</p>
          </li>

          <li>
            <a href="#" class="footer-link">Manhattan</a>
          </li>

          <li>
            <a href="#" class="footer-link">Central New York City</a>
          </li>

          <li>
            <a href="#" class="footer-link">Upper East Side</a>
          </li>

          <li>
            <a href="#" class="footer-link">Queens</a>
          </li>

          <li>
            <a href="#" class="footer-link">Theater District</a>
          </li>

          <li>
            <a href="#" class="footer-link">Midtown</a>
          </li>

          <li>
            <a href="#" class="footer-link">SoHo</a>
          </li>

          <li>
            <a href="#" class="footer-link">Chelsea</a>
          </li>

        </ul>

      </div>

      <div class="footer-bottom">

        <ul class="social-list">

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-linkedin"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-skype"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="mail-outline"></ion-icon>
            </a>
          </li>

        </ul>

        <p class="copyright">
          &copy; 2024 <a href="#">Ruang Teh</a>. All Rights Reserved
        </p>

      </div>

    </div>
  </footer>

  <!--
      - custom js link
    -->
  <script src="{{ asset('landing/script.js') }}"></script>

  <!--
      - ionicon link
    -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
