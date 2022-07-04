<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="./image/handshake.png" type="image/x-icon" />
  <title>Telehealth System</title>

  <!-- jquery link -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

  <!-- font awesome cdn link  -->
  <script src="https://kit.fontawesome.com/c48ab5a612.js" crossorigin="anonymous"></script>

  <!-- custom css file link  -->
  <link rel="stylesheet" href="css/home-style.css" />
</head>

<body>
  <!-- header section starts  -->

  <header class="header">
    <div class="text-center mt-5">
      <i class="fas fa-sun fa-3x theme_icon"></i>
    </div>
    <a href="#" class="logo">
      <i class="fas fa-heartbeat"></i> lebanese Health System
    </a>

    <nav class="navbar">
      <a href="#home">home</a>
      <a href="#services">services</a>
      <a href="#about">about</a>
      <a href="#doctors">Top-doctors</a>
      <a href="./index.php">log-in</a>
      <a href="http://localhost:3000">review</a>
      <a href="#blogs">blogs</a>
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>
  </header>

  <!-- header section ends -->

  <!-- home section starts  -->

  <section class="home" id="home">
    <div class="image">
      <img src="image/home-img.svg" alt="" />
    </div>

    <div class="content">
      <h3>stay safe, stay healthy</h3>
      <p>
        We provide custom telehealth solutions and software development
        services for healthcare providers.!
      </p>
      <a href="./contactus.php" class="btn" id="contactus">
        contact us <span class="fas fa-chevron-right"></span>
      </a>
    </div>
  </section>

  <!-- home section ends -->

  <!-- icons section starts  -->

  <section class="icons-container">
    <div class="icons">
      <i class="fas fa-user-md"></i>
      <h3>140+</h3>
      <p>doctors at work</p>
    </div>

    <div class="icons">
      <i class="fas fa-users"></i>
      <h3>1040+</h3>
      <p>satisfied patients</p>
    </div>

    <div class="icons">
      <i class="fas fa-procedures"></i>
      <h3>500+</h3>
      <p>bed facility</p>
    </div>

    <div class="icons">
      <i class="fas fa-hospital"></i>
      <h3>80+</h3>
      <p>available hospitals</p>
    </div>
  </section>

  <!-- icons section ends -->

  <!-- services section starts  -->

  <section class="services" id="services">
    <h1 class="heading">our <span>services</span></h1>

    <div class="box-container">
      <div class="box">
        <i class="fas fa-notes-medical"></i>
        <h3>free checkups</h3>
        <p>You Can Observe many thing for free and register for free !</p>
        <a href="#" class="btn">
          learn more <span class="fas fa-chevron-right"></span>
        </a>
      </div>

      <div class="box">
        <i class="fas fa-ambulance"></i>
        <h3>24/7 ambulance</h3>
        <p>Our Ambulance are for your service</p>
        <a href="#" class="btn">
          learn more <span class="fas fa-chevron-right"></span>
        </a>
      </div>

      <div class="box">
        <i class="fas fa-user-md"></i>
        <h3>expert doctors</h3>
        <p>our Doctors are Known and experts in thier job domain</p>
        <a href="#" class="btn">
          learn more <span class="fas fa-chevron-right"></span>
        </a>
      </div>

      <div class="box">
        <i class="fas fa-pills"></i>
        <h3>medicines</h3>
        <p>
          We are working on Integerated with another medicine systems to
          facilitate your service !
        </p>
        <a href="#" class="btn">
          learn more <span class="fas fa-chevron-right"></span>
        </a>
      </div>

      <div class="box">
        <i class="fas fa-procedures"></i>
        <h3>bed facility</h3>
        <p>You can book and find a room ant time you want !</p>
        <a href="#" class="btn">
          learn more <span class="fas fa-chevron-right"></span>
        </a>
      </div>

      <div class="box">
        <i class="fas fa-heartbeat"></i>
        <h3>total care</h3>
        <p>Feel free to register and book appointment !</p>
        <a href="#" class="btn">
          learn more <span class="fas fa-chevron-right"></span>
        </a>
      </div>
    </div>
  </section>

  <!-- services section ends -->

  <!-- about section starts  -->

  <section class="about" id="about">
    <h1 class="heading"><span>about</span> us</h1>

    <div class="row">
      <div class="image">
        <img src="image/about-img.svg" alt="" />
      </div>

      <div class="content">
        <h3>we take care of your healthy life</h3>
        <p>
          Plan your schedule Set suitable appointment slots for Video
          Consultations, to balance your clinic schedule with telehealth
          sessions.
        </p>
        <p>
          Manage your time Confirm, cancel or re-schedule telemedicine
          appointments to suit your availability so that your time is managed
          effectively.
        </p>
        <a href="#" class="btn">
          learn more <span class="fas fa-chevron-right"></span>
        </a>
      </div>
    </div>
  </section>

  <!-- about section ends -->

  <!-- doctors section starts  -->

  <section class="doctors" id="doctors">
    <h1 class="heading">Top <span>doctors</span></h1>

    <div class="box-container">
      <div class="box">
        <img src="image/doc-1.jpg" alt="" />
        <h3>john deo</h3>
        <span>expert doctor</span>
        <div class="share">
          <a href="#" class="fab fa-facebook-f"></a>
          <a href="#" class="fab fa-twitter"></a>
          <a href="#" class="fab fa-instagram"></a>
          <a href="#" class="fab fa-linkedin"></a>
        </div>
      </div>

      <div class="box">
        <img src="image/doc-2.jpg" alt="" />
        <h3>john deo</h3>
        <span>expert doctor</span>
        <div class="share">
          <a href="#" class="fab fa-facebook-f"></a>
          <a href="#" class="fab fa-twitter"></a>
          <a href="#" class="fab fa-instagram"></a>
          <a href="#" class="fab fa-linkedin"></a>
        </div>
      </div>

      <div class="box">
        <img src="image/doc-3.jpg" alt="" />
        <h3>john deo</h3>
        <span>expert doctor</span>
        <div class="share">
          <a href="#" class="fab fa-facebook-f"></a>
          <a href="#" class="fab fa-twitter"></a>
          <a href="#" class="fab fa-instagram"></a>
          <a href="#" class="fab fa-linkedin"></a>
        </div>
      </div>

      <div class="box">
        <img src="image/doc-4.jpg" alt="" />
        <h3>john deo</h3>
        <span>expert doctor</span>
        <div class="share">
          <a href="#" class="fab fa-facebook-f"></a>
          <a href="#" class="fab fa-twitter"></a>
          <a href="#" class="fab fa-instagram"></a>
          <a href="#" class="fab fa-linkedin"></a>
        </div>
      </div>

      <div class="box">
        <img src="image/doc-5.jpg" alt="" />
        <h3>john deo</h3>
        <span>expert doctor</span>
        <div class="share">
          <a href="#" class="fab fa-facebook-f"></a>
          <a href="#" class="fab fa-twitter"></a>
          <a href="#" class="fab fa-instagram"></a>
          <a href="#" class="fab fa-linkedin"></a>
        </div>
      </div>

      <div class="box">
        <img src="image/doc-6.jpg" alt="" />
        <h3>john deo</h3>
        <span>expert doctor</span>
        <div class="share">
          <a href="#" class="fab fa-facebook-f"></a>
          <a href="#" class="fab fa-twitter"></a>
          <a href="#" class="fab fa-instagram"></a>
          <a href="#" class="fab fa-linkedin"></a>
        </div>
      </div>
    </div>
  </section>

  <section class="review" id="review">
    <h1 class="heading">client's <span>review</span></h1>

    <div class="box-container">
      <div class="box">
        <img src="image/pic-1.png" alt="" />
        <h3>Ali moussawi</h3>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
        <p class="text">
          The use of telehealth steadily increases as it has become a viable
          modality to patient care. Early adopters attempt to use telehealth
          to deliver high-quality care !
        </p>
      </div>

      <div class="box">
        <img src="image/pic-2.png" alt="" />
        <h3>Aya Al Haj</h3>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
        <p class="text">
          Using what we have learned from the initial six months of
          telemedicine during the Covid pandemic, we have an opportunity to
          accelerate the strategic use and operational efficiency of this tool
          in ways that can greatly benefit patients, providers, and
          organizations!
        </p>
      </div>

      <div class="box">
        <img src="image/pic-3.png" alt="" />
        <h3>Mohamad zein</h3>
        <div class="stars">
          <i class="fas fa-star"> </i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
        <p class="text">
          Doing so in a strategic and comprehensive way might even accelerate
          efforts to transform patient experience in ways we have yet to do in
          our traditional in-person environments!
        </p>
      </div>
    </div>
  </section>

  <!-- review section ends -->

  <!-- blogs section starts  -->

  <section class="blogs" id="blogs">
    <h1 class="heading">our <span>blogs</span></h1>

    <div class="box-container">
      <div class="box">
        <div class="image">
          <img src="image/blog-1.jpg" alt="" />
        </div>
        <div class="content">
          <div class="icon">
            <a href="#"> <i class="fas fa-calendar"></i> 1st may, 2021 </a>
            <a href="#"> <i class="fas fa-user"></i> by admin </a>
          </div>
          <h3>Corona Virus</h3>
          <p>
            If you are interesting about history of corona virus you need to
            check this one !
          </p>
          <a href="https://www.karger.com/Article/FullText/508448" class="btn" target="_blank">
            Read more <span class="fas fa-chevron-right"></span>
          </a>
        </div>
      </div>

      <div class="box">
        <div class="image">
          <img src="image/blog-2.jpg" alt="" />
        </div>
        <div class="content">
          <div class="icon">
            <a href="#"> <i class="fas fa-calendar"></i> 1st may, 2021 </a>
            <a href="#"> <i class="fas fa-user"></i> by admin </a>
          </div>
          <h3>Telehealth system</h3>
          <p>
            In response to COVID-19,several telehealth mental health services
            implemented in China,
          </p>
          <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC7310172/" class="btn" target="_blank">
            Read more <span class="fas fa-chevron-right"></span>
          </a>
        </div>
      </div>

      <div class="box">
        <div class="image">
          <img src="image/blog-3.jpg" alt="" />
        </div>
        <div class="content">
          <div class="icon">
            <a href="#"> <i class="fas fa-calendar"></i> 1st may, 2021 </a>
            <a href="#"> <i class="fas fa-user"></i> by admin </a>
          </div>
          <h3>Important of sport</h3>
          <p>
            30 Moves to Make the Most of Your At-Home Workout ,sport is very
            Important...
          </p>
          <a href="https://www.healthline.com/health/fitness-exercise/at-home-workouts" class="btn" target="_blank">
            Read more <span class="fas fa-chevron-right"></span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- blogs section ends -->

  <!-- footer section starts  -->

  <section class="footer">
    <div class="box-container">
      <div class="box">
        <h3>quick links</h3>
        <a href="#"> <i class="fas fa-chevron-right"></i> home </a>
        <a href="#"> <i class="fas fa-chevron-right"></i> services </a>
        <a href="#"> <i class="fas fa-chevron-right"></i> about </a>
        <a href="#"> <i class="fas fa-chevron-right"></i> doctors </a>
        <a href="#"> <i class="fas fa-chevron-right"></i> book </a>
        <a href="#"> <i class="fas fa-chevron-right"></i> review </a>
        <a href="#"> <i class="fas fa-chevron-right"></i> blogs </a>
      </div>

      <div class="box">
        <h3>our services</h3>
        <a href="#"> <i class="fas fa-chevron-right"></i> dental care </a>
        <a href="#"> <i class="fas fa-chevron-right"></i> message therapy </a>
        <a href="#"> <i class="fas fa-chevron-right"></i> cardioloty </a>
        <a href="#"> <i class="fas fa-chevron-right"></i> diagnosis </a>
        <a href="#">
          <i class="fas fa-chevron-right"></i> ambulance service
        </a>
      </div>

      <div class="box">
        <h3>contact info</h3>
        <a href="#"> <i class="fas fa-phone"></i> +71548165 </a>
        <a href="#"> <i class="fas fa-phone"></i> +71548165</a>
        <a href="#"> <i class="fas fa-envelope"></i> aha057@usal.edu.com </a>
        <a href="#"> <i class="fas fa-envelope"></i> mah@usal.edu.com </a>
        <a href="#">
          <i class="fas fa-map-marker-alt"></i> lebanon, beirut,909090
        </a>
      </div>

      <div class="box">
        <h3>follow us</h3>
        <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
        <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
        <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
        <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
        <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
        <a href="#"> <i class="fab fa-pinterest"></i> pinterest </a>
      </div>
    </div>
  </section>

  <!-- footer section ends -->

  <script src="./js/script.js"></script>
</body>

</html>