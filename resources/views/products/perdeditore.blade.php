<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Perde Ditore</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
      padding-top: 100px;
    }

    .product-card {
      border: none;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      transition: transform 0.2s ease;
      height: 100%;
      overflow: hidden;
    }

    .product-card:hover {
      transform: translateY(-4px);
    }

    .product-card img {
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
      height: 300px;
      width: 100%;
      object-fit: cover;
      cursor: pointer;
    }

    .card-body {
      text-align: center;
      padding: 1rem;
    }

    .dimensions {
      font-size: 0.95rem;
      font-weight: 500;
      color: #333;
    }
    .navbar-custom {
  position: absolute;
  top: 20px;
  left: 50%;
  transform: translateX(-50%);
  width: 65%;
  padding: 0.75rem 2rem;
       background-color: #f0f0f5;/* Transparente */
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

<div class="contact-box mt-5 text-center"> 
  <h4 class="fw-bold text-danger mb-3">Porosit tani me lehtësi</h4>
  <p class="mb-2">📞 <strong>044 960661 or 044 996926</strong></p>

  <div class="d-flex justify-content-center gap-4 mt-3">
    <a href="https://www.instagram.com" target="_blank" class="text-danger fs-4" style="text-decoration: none;">
      <i class="bi bi-instagram"></i> Instagram
    </a>
    <a href="https://www.facebook.com/BRILLANT044996926" target="_blank" class="text-primary fs-4" style="text-decoration: none;">
      <i class="bi bi-facebook"></i> Facebook
    </a>
  </div>
</div>
<!-- Navbar -->
  
<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
  <div class="container-fluid justify-content-center">
    <a class="navbar-brand d-flex align-items-center" href="/">
      <img src="{{ asset('images/brillant.png') }}" alt="Logo">
    </a>
    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarContent" aria-controls="navbarContent"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarContent">
      <ul class="navbar-nav align-items-center">
        <li class="nav-item me-3"><a class="nav-link" href="/">Home</a></li>
        <li class="nav-item dropdown me-3">
          <a class="nav-link dropdown-toggle" href="#" id="catalogDropdown" data-bs-toggle="dropdown">Products</a>
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
        <li class="nav-item me-3"><a class="nav-link" href="{{ route('about') }}">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact us</a></li>
      </ul>
    </div>
  </div>
</nav>
<br>

<Br>
<br>
<br>
<div class="container py-4">
  <div class="row g-4 justify-content-center">
  @php
  $images = [
    ['file' => 'image00001.jpeg', 'desc' => 'Perde - Model Elegant'],
    ['file' => 'perde2.jpg', 'desc' => 'Perde - E thjeshtë me teksturë'],
    ['file' => 'image00003.jpeg', 'desc' => 'Perde - Stil Klasik'],
    ['file' => 'image00004.jpeg', 'desc' => 'Perde - Me dantellë tradicionale'],
    ['file' => 'image00005.jpeg', 'desc' => 'Perde - Me dizajn lulesh'],
    ['file' => 'image00006.jpeg', 'desc' => 'Perde - Ngjyrë pastel vjollcë'],
    ['file' => 'image00007.jpeg', 'desc' => 'Perde - Ngjyrë bezhë e ngrohtë'],
    ['file' => 'image00008.jpeg', 'desc' => 'Perde - Me rrathë dekorativë'],
    ['file' => 'image00009.jpeg', 'desc' => 'Perde - E bardhë me lule'],
    ['file' => 'image00010.jpeg', 'desc' => 'Perde - E varur me palosje'],
    ['file' => 'image00011.jpeg', 'desc' => 'Perde - Ngjyrë kafe dhe bezhë'],
    ['file' => 'image00012.jpeg', 'desc' => 'Perde - Stil i valëzuar'],
    ['file' => 'image00013.jpeg', 'desc' => 'Perde - Me motive gjeometrike'],
    ['file' => 'image00014.jpeg', 'desc' => 'Perde - E bardhë klasike'],
    ['file' => 'image00015.jpeg', 'desc' => 'Perde - Me pika të bardha'],
    ['file' => 'image00016.jpeg', 'desc' => 'Perde - Me dantellë të errët poshtë'],
    ['file' => 'image00017.jpeg', 'desc' => 'Perde - Me degë të zeza'],
    ['file' => 'image00018.jpeg', 'desc' => 'Perde - E errët dhe elegante'],
    ['file' => 'image00019.jpeg', 'desc' => 'Perde - E bardhë e dendur'],
    ['file' => 'image00020.jpeg', 'desc' => 'Perde - E bardhë e lehtë'],
    ['file' => 'image00021.jpeg', 'desc' => 'Perde - Me valëzime të dendur'],
    ['file' => 'image00022.jpeg', 'desc' => 'Perde - Me detaje delikate'],
    ['file' => 'image00023.jpeg', 'desc' => 'Perde - E bardhë minimaliste'],
    ['file' => 'image00024.jpeg', 'desc' => 'Perde - Me linja horizontale'],
    ['file' => 'image00025.jpeg', 'desc' => 'Perde - Transparente dhe klasike'],
    ['file' => 'perde.jpg',     'desc' => 'Perde Ditore - Dizajn Modern'],
    ['file' => 'image00002.jpeg',    'desc' => 'Perde Ditore - Ngjyrë E Bardhë'],
  ];
@endphp


    @foreach ($images as $img)
      <div class="col-6 col-md-4 col-lg-3">
        <div class="card product-card">
          <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal"
             data-image="{{ asset('perdeditoree/' . $img['file']) }}"
             data-desc="{{ $img['desc'] }}">
            <img src="{{ asset('perdeditoree/' . $img['file']) }}" alt="{{ $img['desc'] }}">
          </a>
          <div class="card-body">
            <p class="dimensions">{{ $img['desc'] }}</p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

<!-- Modal for image preview -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content bg-transparent border-0 position-relative">
      <!-- Close button -->
      <div class="position-absolute top-0 end-0 p-3 z-3">
        <button type="button" class="btn btn-danger rounded-circle" data-bs-dismiss="modal" aria-label="Close" style="width: 40px; height: 40px;">&times;</button>
      </div>

      <div class="modal-body p-0 text-center">
        <img id="modalImage" src="" class="img-fluid rounded" style="max-height: 90vh;" alt="">
        <p id="modalCaption" class="mt-3 fw-semibold text-white bg-dark bg-opacity-75 px-3 py-2 rounded d-inline-block"></p>
      </div>
    </div>
  </div>
</div>

<script>
  const imageModal = document.getElementById('imageModal');
  imageModal.addEventListener('show.bs.modal', function (event) {
    const trigger = event.relatedTarget;
    const imageSrc = trigger.getAttribute('data-image');
    const imageDesc = trigger.getAttribute('data-desc');

    const modalImage = imageModal.querySelector('#modalImage');
    const modalCaption = imageModal.querySelector('#modalCaption');

    modalImage.src = imageSrc;
    modalCaption.textContent = imageDesc;
  });
</script>

</body>
</html>
