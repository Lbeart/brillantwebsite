<!DOCTYPE html>
<html lang="sq">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Brillant - About Us</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body { font-family: 'Poppins', sans-serif;
            background-color: #f7f9fc;
    }

  .navbar-custom {
  position: absolute;
  top: 20px;
  left: 50%;
  transform: translateX(-50%);
  width: 65%;
  padding: 0.75rem 2rem;
    background-color: #f0f0f5; 
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

    footer {
      background-color: #f8f9fa;
    }
      .image-card {
    overflow: hidden;
    border-radius: 20px;
    transition: transform 0.4s ease, box-shadow 0.3s ease;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    height: 420px;
  }

  .image-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
  }

  .image-card:hover img {
    transform: scale(1.05);
  }

  .image-card.tall {
    height: 500px; /* Fotoja e mesit më e gjatë */
  }

  .our-story-text {
    font-size: 1.125rem;
    font-weight: 500;
    color: #333;
    max-width: 900px;
    margin: 0 auto 2rem auto;
    text-align: center;
  }
  
  </style>
</head>
<body>
<br>
<br>
<br>
<br>
<br>

<section class="py-5" style="background-color: #f7f9fc;">
  <div class="container">
    <h2 class="text-center fw-bold mb-4">Our Story</h2>
    <p class="our-story-text">
      For over 16 years, we've proudly served customers with quality textiles. 
      Although we experienced a one-year closure, our passion never faded. 
      We came back stronger—combining tradition, innovation, and dedication to excellence. 
      Today, we continue our journey with premium craftsmanship and reliable service.
    </p>

    <div class="row g-4">
      <div class="col-md-4">
        <div class="image-card">
          <img src="{{ asset('slider/hali4.jpg') }}" alt="Elegant Carpet">
        </div>
      </div>
      <div class="col-md-4">
        <div class="image-card tall">
          <img src="{{ asset('slider/machine.png') }}" alt="Production Machine">
        </div>
      </div>
      <div class="col-md-4">
        <div class="image-card">
          <img src="{{ asset('slider/carpetmachine.jpg') }}" alt="Textile Sewing">
        </div>
      </div>
    </div>
  </div>
</section>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light navbar-custom shadow-sm">
    <div class="container-fluid justify-content-center">
      <a class="navbar-brand d-flex align-items-center" href="/">
        <img src="{{ asset('images/brillant.png') }}" alt="Logo" style="height: 50px;">
      </a>
      <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-center" id="navbarContent">
        <ul class="navbar-nav">
          <li class="nav-item me-3"><a class="nav-link" href="/">Home</a></li>
          <li class="nav-item me-3 dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Products</a>
            <ul class="dropdown-menu">
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
          <li class="nav-item me-3"><a class="nav-link active" href="#">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact Us</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- About Section -->
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
  <footer class="pt-5 pb-3 mt-5">
    <div class="container text-center">
      <img src="{{ asset('images/llogo.png') }}" alt="Brillant Logo" width="150" class="mb-3">
      <p class="text-muted mb-1">© {{ date('Y') }} Brillant. All rights reserved.</p>
      <small class="text-muted">Crafted by RDR Digital L.L.C</small>
    </div>
  </footer>

</body>
</html>