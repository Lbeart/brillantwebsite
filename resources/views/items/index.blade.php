<!DOCTYPE html>
<html lang="sq">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>B-Brilliant</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="icon" type="image/png" href="{{ asset('images/llogo.png') }}">
  <style>
    body { margin: 0; padding: 0; }
    /* Wrapper to position navbar over slider */
    .carousel-wrapper { position: relative; }
    /* Slider image */
    .carousel-item img {
      height: 95vh;
      object-fit: cover;
    }
    /* Slider caption */
    .carousel-caption {
      bottom: 30%;
    }
    .carousel-caption h2 {
      font-size: 4rem;
      font-weight: bold;
      color: #dc3545;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      margin-bottom: 0.5rem;
    }
    .carousel-caption p {
      font-size: 1.5rem;
      color: #fff;
    }
   /* Bazat që kemi vendosur më sipër */
.navbar-custom {
  position: absolute;
  top: 20px;
  left: 50%;
  transform: translateX(-50%);
  width: 65%;
  padding: 0.75rem 2rem;
    background-color: rgba(255, 255, 255, 0.6); /* Transparente */
  backdrop-filter: blur(8px); 
  border-radius: 2rem;
  font-family: 'Poppins', sans-serif;
  z-index: 1000;
}

.navbar-custom .navbar-brand img {
  width: 250px;
  height: auto;
  margin-right: 1rem;
  filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
}

.navbar-custom .navbar-nav {
  display: flex;
  margin-left: auto;
  align-items: center;
}

.navbar-custom .nav-link {
  font-weight: 500;
  font-size: 0.9rem;
  text-transform: none;
  letter-spacing: 0.02em;
  color: #444 !important;
  margin-left: 1rem;
  padding: 0.75rem 1rem;
}

.navbar-custom .nav-link:hover,
.navbar-custom .nav-link:focus {
  color: #dc3545 !important;
}

/* Dropdown style (optional) */
.dropdown-menu {
  border-radius: 1rem;
  box-shadow: 0 10px 20px rgba(0,0,0,0.1);
  padding: 0.5rem 0;
}

/* Media Queries për pajisje mesatare (tablet) */
@media (max-width: 992px) {
  .navbar-custom {
    padding: 0.5rem 1.5rem;
  }

  .navbar-custom .navbar-brand img {
    width: 55px;
  }

  .navbar-custom .nav-link {
    font-size: 0.85rem;
    padding: 0.5rem 0.75rem;
    margin-left: 0.75rem;
  }
}

/* Media Queries për pajisje të vogla (smartphone) */
@media (max-width: 768px) {
  .navbar-custom {
    top: 10px;
    width: 95%;
    padding: 0.5rem 1rem;
  }

  .navbar-custom .navbar-brand img {
    width: 250px;
    margin-right: 0.5rem;
  }

  .navbar-custom .nav-link {
    font-size: 0.8rem;
    padding: 0.4rem 0.6rem;
    margin-left: 0.5rem;
  }

  .navbar-custom .navbar-nav {
    flex-direction: column;
    align-items: flex-start;
    width: 100%;
  }

  .dropdown-menu {
    position: static; /* për mobile që dropdown me u shfaq nën linkun */
    float: none;
    width: 100%;
    margin-top: 0.5rem;
  }

  .dropdown-menu .dropdown-item {
    padding-left: 1.5rem;
  }
}
 @media (max-width: 768px) {
  .carousel-caption h2 {
    font-size: 2rem;
  }

  .carousel-caption p {
    font-size: 1rem;
  }
}
.dropdown-submenu .submenu {
  display: none;
  position: absolute;
  top: 0;
  left: 100%;
  margin-left: 0.1rem;
  border-radius: 1rem;
  min-width: 180px;
}

.dropdown-submenu:hover .submenu {
  display: block;
}
  </style>
</head>
<body>

  <!-- Slider with Navbar Overlay -->
  <div class="carousel-wrapper">
    <div id="catalogCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{ asset('slider/foto1.jpg') }}" class="d-block w-100" alt="Slide 1">
          <div class="carousel-caption d-block text-center">
            <h2>Elegance</h2>
            <p>Design your home with our exclusive collection.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{ asset('slider/foto2.jpg') }}" class="d-block w-100" alt="Slide 2">
             <div class="carousel-caption d-block text-center">
            <h2>Home</h2>
            <p>Elevate your space with premium textiles.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{ asset('slider/foto3.jpg') }}" class="d-block w-100" alt="Slide 3">
          <div class="carousel-caption d-block text-center">
            <h2>Design</h2>
            <p>Crafted elegance for every room.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#catalogCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="visually-hidden">Prev</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#catalogCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

 <!-- Navbar Overlay -->
<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
  <div class="container-fluid justify-content-center">
    <!-- Logo -->
    <a class="navbar-brand d-flex align-items-center" href="/">
      <img src="{{ asset('images/brillant.png') }}" alt="Logo" style="height: 50px;">
    </a>

    <!-- Hamburger button (le vetëm këtë) -->
    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarContent" aria-controls="navbarContent"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible menu -->
    <div class="collapse navbar-collapse justify-content-center" id="navbarContent">
      <ul class="navbar-nav align-items-center">
        <li class="nav-item me-3">
          <a class="nav-link" href="/home">Home</a>
        </li>

        <!-- Dropdown -->
        <li class="nav-item dropdown me-3">
          <a class="nav-link dropdown-toggle" href="#" id="catalogDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            Products
          </a>
          <ul class="dropdown-menu" aria-labelledby="catalogDropdown">
           
             <li><a class="dropdown-item" href="/tepiha">Tepiha</a></li>

<li class="dropdown-submenu position-relative">
  <a class="dropdown-item dropdown-toggle" href="#">Perde</a>
  <ul class="dropdown-menu submenu shadow">
    <li><a class="dropdown-item" href="/anesore">Perde Anësore</a></li>
    <li><a class="dropdown-item" href="/perde-ditore">Perde Ditore</a></li>
  </ul>
</li>

<li><a class="dropdown-item" href="/jastekdekorues">JastekDekorues</a></li>
<li><a class="dropdown-item" href="/postava">Postava</a></li>
<li><a class="dropdown-item" href="/mbulesa">Mbulesa</a></li>
<li><a class="dropdown-item" href="/batanije">Batanije</a></li>
<li><a class="dropdown-item" href="/tepihebanjo">Tepiha për Banjo</a></li>
<li><a class="dropdown-item" href="/posteqia">Posteqia</a></li>
          </ul>
        </li>

        <li class="nav-item me-3">
          <a class="nav-link" href="{{ route('about') }}">About Us</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ route('contact') }}">Contact us</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  <!-- Produktet e Fundit -->
  <section id="produkte" class="py-5">
    <div class="container">
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($items->take(3) as $item)
        <div class="col">
          <div class="card h-100 shadow-sm">
            @if($item->image_path)
            <img src="{{ asset('storage/'.$item->image_path) }}" class="card-img-top" alt="{{ $item->name }}">
            @else
            <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center" style="height:300px;"><span class="text-white">Pa foto</span></div>
            @endif
            <div class="card-body">
              <h5 class="card-title fw-bold text-danger">{{ $item->name }}</h5>
              <p class="card-text text-muted">{{ Str::limit($item->description, 100) }}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>


<!-- Modern Rugs Carousel Section (5 items per slide) -->
<section id="modern-rugs" class="py-5 bg-white">
  <div class="container">
    <!-- Header with Title & CTA Button -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
      <h2 class="fw-bold mb-3 mb-md-0">Modern Rugs</h2>
      <a href="/tepiha" class="btn btn-danger text-white px-4 py-2">VIEW ALL MODERN RUGS ON SALE!</a>
    </div>

    <!-- Carousel -->
    <div id="modernRugsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
      <div class="carousel-inner">
      @php
  $rugs = [
    ['side.bmp',  'Modern Rose 120x170 cm',  '€45.00'],
    ['hali4.jpg', 'Modern Hali 300x200 cm',  '€95.00'],
    ['gold.bmp',  'Modern Gold 300x200 cm',  '€55.00'],   // <-- added missing ' here
    ['gold1.bmp', 'Modern Gold 300x200 cm',  '€55.00'],
    ['gold2.bmp', 'Modern Gold 300x200 cm',  '€55.00'],
    ['rose1.jpg', 'rose 300x200 cm',          '€115.00'],
    ['rose2.bmp', 'rose 150x230 cm',          '€75.00'],
    ['rose3.bmp', 'rose 150x230 cm',          '€75.00'],   // <-- changed from '.75' to '€75'
    ['hali5.jpg', 'hali 150x230 cm',         '€65.00'],
    ['hali3.jpg', 'hali 150x230 cm',         '€65.00'],
  ];
  // Group into slides of 5 items each
  $chunks = collect($rugs)->chunk(5);
@endphp

        @foreach($chunks as $i => $group)
          <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
            <div class="row gx-3 justify-content-center">
              @foreach($group as $item)
                <div class="col-6 col-sm-4 col-md-2 text-center">
                  <div class="mb-2">
                    <span class="text-success fw-semibold">
                      <i class="bi bi-check-circle-fill"></i> In stock
                    </span>
                  </div>
                  <img 
                    src="{{ asset('slider/'.$item[0]) }}" 
                    alt="{{ $item[1] }}" 
                    class="img-fluid rounded shadow-sm mb-2"
                    style="height: 200px; width: auto; object-fit: contain;"/>
                  <p class="small mb-1">{{ $item[1] }}</p>
                  <h5 class="fw-bold">{{ $item[2] }}</h5>
                </div>
              @endforeach
            </div>
          </div>
        @endforeach
      </div>

      <!-- Controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#modernRugsCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#modernRugsCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</section>



 <!-- Products Section -->
<section id="produkte" class="py-5 bg-white">
  <div class="container">
    <!-- Title + Subtitle -->
    <div class="text-center mb-5">
      <h2 class="fw-bold">— PRODUCTS —</h2>
      <p class="text-muted">Browse our extensive range of textiles, thoughtfully curated for every home</p>
    </div>
    <!-- Three-image row with custom heights -->
    <div class="row g-4">
      <div class="col-md-4">
        <img src="{{ asset('slider/side.bmp') }}" 
             class="img-fluid rounded shadow-sm" 
             alt="Produkt 1"
             style="height:550px; object-fit:cover; width:100%;">
      </div>
      <div class="col-md-4">
        <img src="{{ asset('slider/bedshet.jpg') }}" 
             class="img-fluid rounded shadow-sm" 
             alt="Produkt 2"
             style="height:550px; object-fit:cover; width:100%;">
      </div>
      <div class="col-md-4">
        <img src="{{ asset('slider/paris.jpg') }}" 
             class="img-fluid rounded shadow-sm" 
             alt="Produkt 3"
             style="height:550px; object-fit:cover; width:100%;">
      </div>
    </div>
  </div>
</section>
<section id="production" class="py-5">
  <div class="container">
    <div class="text-center mb-4">
      
    </div>
   
   
   <!-- Why Choose Us Section -->
<section id="why-us" class="py-5 bg-light"> 
  <div class="container">
    <div class="text-center mb-4">
      <h2 class="fw-bold">— WHY CHOOSE US —</h2>
    </div>
    <div class="row align-items-center gy-4">
      <div class="col-md-6">
        <img src="{{ asset('slider/raffaello.jpg') }}" class="img-fluid rounded shadow-sm" alt="Why Choose Us">
      </div>
      <div class="col-md-6">
        <ul class="list-unstyled">
          <li class="mb-4">
            <h5 class="fw-bold">American System Curtains</h5>
            <p>We offer modern curtains with an American-style mounting system, easy to use and exceptionally elegant.</p>
          </li>
          <li class="mb-4">
            <h5 class="fw-bold">Antibacterial Acrylic Rugs</h5>
            <p>Our acrylic rugs are treated with antibacterial protection and are highly durable, ensuring a clean and healthy environment.</p>
          </li>
          <li class="mb-4">
            <h5 class="fw-bold">Fashionable Curtains</h5>
            <p>We follow the latest trends, including bamboo curtains, sugar voile, and unique styles that match any modern décor.</p>
          </li>
          <li class="mb-4">
            <h5 class="fw-bold">Commitment to Quality</h5>
            <p>Every product that leaves our company undergoes strict quality controls, ensuring high standards and maximum customer satisfaction.</p>
          </li>
          <li class="mb-4">
            <h5 class="fw-bold">Plush Bed Covers</h5>
            <p>Our plush bed covers combine maximum comfort with environmental sustainability. Made from premium recyclable materials, they offer effective protection and year-round comfort while minimizing carbon footprint at every production stage. With innovative design and rigorous quality checks, we ensure every piece meets the highest ecological standards without sacrificing performance or aesthetics.</p>
          </li>
          <li class="mb-4">
            <h5 class="fw-bold">Water-Resistant Terry Plush Sheets</h5>
            <p>Our plush sheets combine the strength of terry fabric with an advanced waterproof layer. Featuring a refined and functional design, they offer maximum protection, continuous comfort, and timeless elegance in every room of your home.</p>
          </li>
          <li>
            <h5 class="fw-bold">Modern Accessories</h5>
            <p>Your satisfaction is our priority. We work closely with our clients to meet their unique needs, offering personalized solutions and exceptional service.</p>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>


 



  <!-- Footer -->
<footer class="bg-light text-dark pt-5 pb-3">
  <div class="container">
    <div class="row">
      <!-- Logo Column -->
      <div class="col-md-3 text-center text-md-start mb-4 mb-md-0">
        <img src="{{ asset('images/llogo.png') }}" alt="brillant" width="150" class="mb-2">
      </div>
      <!-- Products Column -->
      <div class="col-md-3 mb-4 mb-md-0">
        <h6 class="text-uppercase fw-bold mb-3">Products</h6>
        <ul class="list-unstyled">
          <li><a href="#" class="text-dark text-decoration-none">Carpet & Rugs</a></li>
          <li><a href="#" class="text-dark text-decoration-none">Decorative Carpets</a></li>
          <li><a href="#" class="text-dark text-decoration-none">Bath Mats & Rugs</a></li>
          <li><a href="#" class="text-dark text-decoration-none">Sofa Covers</a></li>
          <li><a href="#" class="text-dark text-decoration-none">Bed Sheets</a></li>
          <li><a href="#" class="text-dark text-decoration-none">Blankets</a></li>
     
        </ul>
      </div>
      <!-- Information Column -->
      <div class="col-md-3 mb-4 mb-md-0">
        <h6 class="text-uppercase fw-bold mb-3">Information</h6>
        <ul class="list-unstyled">
          <li><a href="#" class="text-dark text-decoration-none">Products</a></li>
          <li><a href="#" class="text-dark text-decoration-none">Catalogues</a></li>
          <li><a href="#" class="text-dark text-decoration-none">Manufacturing</a></li>
          <li><a href="#" class="text-dark text-decoration-none">About Us</a></li>
        </ul>
      </div>
      <!-- Find Us Column -->
      <div class="col-md-3 text-center text-md-start">
        <h6 class="text-uppercase fw-bold mb-3">Find Us</h6>
        <ul class="list-unstyled">
          <li><a href="#" class="text-dark text-decoration-none">Contact</a></li>
        </ul>
      </div>
    </div>
    <!-- Social & Copyright Row -->
    <div class="row mt-4">
      <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
        <a href="#" class="text-dark me-3 fs-4"><i class="bi bi-instagram"></i></a>
        <a href="#" class="text-dark fs-4"><i class="bi bi-whatsapp"></i></a>
      </div>
      <div class="col-md-6 text-center text-md-end">
        <small class="text-muted">Copyright © {{ date('Y') }} Brillant</small>
      </div>
    </div>
    <div class="row mt-2">
      <div class="col text-center">
        <small class="text-muted">crafted by RDR Digital L.L.C</small>
      </div>
    </div>
  </div>
</footer>



</body>
</html>