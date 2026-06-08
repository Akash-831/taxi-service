<?php
session_start();
if(isset($_SESSION['contact']))
{
    echo "<script>alert('" . $_SESSION['contact'] . "');</script>";
    unset($_SESSION['contact']);
}
include("config/connection.php");
if(isset($_POST['submit'])){
$name = $_POST['name'];
$phone = $_POST['phone'];
$pickup_location = $_POST['pickup_location'];
$drop_location = $_POST['drop_location'];
$travel_date = $_POST['travel_date'];
$pickup_time = $_POST['pickup_time'];
$insert = "insert into booking_table(name, phone, pickup_location, drop_location, travel_date, pickup_time)
values('$name','$phone','$pickup_location','$drop_location','$travel_date','$pickup_time')";
$run = mysqli_query($connection, $insert);
if($run==true){
  $message = "New Booking Details:\n";
    $message .= "Name: $name\n";
    $message .= "Phone: $phone\n";
    $message .= "Pickup Location: $pickup_location\n";
    $message .= "Drop Location: $drop_location\n";
    $message .= "Travel Date: $travel_date\n";
    $message .= "Pickup Time: $pickup_time";

    $whatsapp_url = "https://wa.me/917017652679?text=" . urlencode($message);
    echo "<script>
            alert('Your Booking has been successfuy');
            window.location.href='$whatsapp_url';
          </script>";
}
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="index.css">
  <title>Document</title>
</head>
<body>
  <?php
  include("include/header.php");
  ?>
  <!--------------------------------- sidebar start ---------------------------->


  <!-- ------------------------------ sidebar end =-----------------------------========================================= -->
  <main id="slider" class="index">
    <div class="whatsapp-now-icon">
      <a href="https://wa.me/917017652679">
        <i class="fa-brands fa-whatsapp" style="color: rgb(255, 255, 255);"></i>
        <p>WhatsApp Now!</p>
      </a>
    </div>
    <div class="call-now-icon">
      <a href="tel:+917017652679">
        <img src="images/phone-call.webp">
        <p>Call Now!</p>
      </a>
    </div>
    <div class="slide"></div>
    <button class="prev" onclick="prevSlide()">&#10094;</button>
    <button class="next" onclick="nextSlide()">&#10095;</button>
    <div class="container">
      <div class="main-top-content">
        <div class="main-headline-container">
          <img src="images/pin-1.png" />
          <p class="main-headline">GOPALGANJ, BIHAR</p>
        </div>
        <p class="main-top-content-p">Golden Cab Service</p>
        <p class="main-top-content-p">in <span>Gopalganj</span></p>
        <p class="main-top-content-p" id="accross-india">& Across India</p>
        <p class="main-top-desc" id="main-top-des">
          Trusted Cab Service Across Bihar & Beyond. One-way, Round-trip &
        </p>
        <p class="main-top-desc">
          Outstation cabs available 24/7. Starting at just
          <span> ₹12/km.</span>
        </p>
        <div class="customer-data">
          <div>
            <p class="customer-data-title">5000+</p>
            <p class="customer-summary">HAPPY CUSTOMER</p>
          </div>
          <div>
            <p class="customer-data-title">50+</p>
            <p class="customer-summary">ROUTE COVER</p>
          </div>
          <div>
            <p class="customer-data-title">24/7</p>
            <p class="customer-summary">SERVICE AVAILABLE</p>
          </div>
        </div>
        <div class="button-container">
          <a href="https://wa.me/917017652679" class="whatsapp-button">
            <img src="images/whatsapp-1.png" />
            <p>Whatsapp us</p>
</a>
          <a href="tel:+917017652679" class="button-sub-container">
            <img src="images/phone-receiver-silhouette.png" />
            <p>Call now</p>
</a>
          <a href="#" class="button-sub-container openForm">
    <img src="images/calendar.png" />
    <p>Book Now</p>
</a>
        </div>
      </div>
      <!-- user form ------------->
     <div class="form-main-container">
    <form method="post" action="index.php" class="form" id="bookingform">
      <div class="form-heading">
        <img src="images/car.png" />
        <p class="form-headline">BooK Your Ride</p>
      </div>
      <p class="form-title">Instant confirmation, no hidden charges</p>
      <div class="form-container">
        <div class="left-input-container">
          <div class="name-input">
            <p>FULL NAME<span>•</span></p>
            <div class="user-icon">
              <img src="images/user-1.png" />
              <input type="text" placeholder="enter your fullname" name="name" required/>
            </div>
          </div>
           <div class="name-input">
            <p>PHONE NUMBER<span>•</span></p>
            <div class="user-icon">
              <span class="contact-placeholder">+91</span>
              <input type="tel" placeholder="10-digit phone number" name="phone" required/>
            </div>
          </div>
          <div class="name-input">
            <p>PICKUP LOCATION<span>•</span></p>
            <div class="user-icon">
              <img src="images/location-pin.png" />
              <input type="text" placeholder="Pickup city/ address" name="pickup_location" required/>
            </div>
          </div>
        </div>
        <div class="left-input-container">
         
          <div class="name-input">
            <p>DROP LOCATION <span>•</span></p>
            <div class="user-icon">
              <img src="images/location-pin-1.png" />
              <input type="text" placeholder="Destination city/ address" name="drop_location" required/>
            </div>
          </div>
           <div class="name-input">
            <p>TRAVEL DATE<span>•</span></p>
            <div class="user-icon date">
              <img src="images/calendar-1.png" />
              <input type="date" class="time" placeholder="mm/dd/yyyy" name="travel_date" required/>
            </div>
          </div>
          <div class="name-input date">
            <p>PICKUP TIME <span>•</span></p>
            <div class="user-icon">
              <img src="images/time.png" />
              <input  class="time" type="time" placeholder="--:-- --" name="pickup_time" required/>
            </div>
          </div>
        </div>
      </div>
      <button type="submit" name="submit">Book Now</button>
      <div class="form-footer">
        <img src="images/shield-1.png" />
        <p>Your details are safe with us. No spam</p>
      </div>
    </form>
  </div>
</div>




    
  </main>
  <!-- ========================================================================================================================== -->
  <div class="form-main-container1">
    <form method="post" class="form" id="bookingform">
      <div class="form-heading">
        <img src="images/car.png" />
        <p class="form-headline">BooK Your Ride</p>
      </div>
      <p class="form-title">Instant confirmation, no hidden charges</p>
      <div class="form-container">
        <div class="left-input-container">
          <div class="name-input">
            <p>FULL NAME<span>•</span></p>
            <div class="user-icon">
              <img src="images/user-1.png" />
              <input type="text" placeholder="enter your full name" name="name" required/>
            </div>
          </div>
           <div class="name-input">
            <p>PHONE NUMBER<span>•</span></p>
            <div class="user-icon">
              <span class="contact-placeholder">+91</span>
              <input type="tel" placeholder="enter 10-digit phone number" name="phone" required/>
            </div>
          </div>
          <div class="name-input">
            <p>PICKUP LOCATION<span>•</span></p>
            <div class="user-icon">
              <img src="images/location-pin.png" />
              <input type="text" placeholder="Pickup city/ address" name="pickup_location" required/>
            </div>
          </div>
         
        </div>
        <div class="left-input-container">
         
          <div class="name-input">
            <p>DROP LOCATION <span>•</span></p>
            <div class="user-icon">
              <img src="images/location-pin-1.png" />
              <input type="text" placeholder="Destination city/ address" name="drop_location" required/>
            </div>
          </div>
           <div class="name-input">
            <p>TRAVEL DATE<span>•</span></p>
            <div class="user-icon">
              <img src="images/calendar-1.png" />
              <input type="date" placeholder="mm/dd/yyyy" name="travel_date" required/>
            </div>
          </div>
          <div class="name-input">
            <p>PICKUP TIME <span>•</span></p>
            <div class="user-icon">
              <img src="images/time.png" />
              <input type="time" placeholder="--:-- --" name="pickup_time" required/>
            </div>
          </div>
        </div>
      </div>
      <button type="submit" name="submit">Book Now</button>
      <div class="form-footer">
        <img src="images/shield-1.png" />
        <p>Your details are safe with us. No spam</p>
      </div>
    </form>
  </div>
  <div class="main-footer">
    <div class="">
      <img src="images/shield.png" />
      <p>100% Safe Travel</p>
    </div>
    <hr />
    <div class="">
      <img src="images/clock-1.png" />
      <p>24/7 Available</p>
    </div>
    <hr />

    <div class="">
      <img src="images/rupee.png" />
      <p>Transperent Pricing</p>
    </div>
    <hr class="footer-link2" />

    <div class="footer-link2">
      <img src="images/map.png" />
      <p>Pan india services</p>
    </div>
    <hr class="footer-link" />

    <div class="footer-link">
      <img src="images/whatsapp-1.png" />
      <p>Instant whatsapp booking</p>
    </div>
    <hr class="footer-link" />

    <div class="footer-link">
      <img src="images/star-1.png" />
      <p>Varified Drivers</p>
    </div>
  </div>
  <!-- <div class="overlay" id="overlay"></div> -->
  <!------------------------------ About section start--------------------------------------------->

  <section class="about-section">
    <div class="about-left-container">
      <div class="about-left-content">
        <div class="about-heading">
          <span class="red-dot"></span>
          <p>ABOUT GOLDEN CAB SERVICE</p>
        </div>
        <p class="about-headline">
          Your Most Trusted Cab Partner in <span>Gopalganj</span>
        </p>
        <p class="about-desc">
          Gopalganj is a growing, well-connected district of Bihar — a hub of
          culture, commerce, and daily movement. With increasing travel needs
          and limited public transport, finding a reliable cab in Gopalganj
          has never been more important.
        </p>
        <p class="about-desc">
          At <span>Golden Cab Service</span>, we bridge that gap. Our fleet of
          well-maintained, GPS-enabled, air-conditioned vehicles is ready
          around the clock — whether you're heading to Patna for work,
          Gorakhpur for family, or Delhi for business. We specialize in
          one-way cabs, round trips, outstation bookings, and local rentals —
          all at transparent, competitive rates.
        </p>
        <p class="about-desc">
          We also provide <span>Pan India one-way cab services</span> — travel
          anywhere in the country with comfort and confidence. From solo
          travelers to large families, corporate clients to wedding parties,
          Golden Cab Service tailors every ride to your need.
        </p>
      </div>
      <div class="about-services-container">
        <div class="about-services">
          <div class="check-image">
            <img src="images/checked.png" />
            <p>Zero Hidden Charges</p>
          </div>
          <div class="check-image">
            <img src="images/checked.png" />
            <p>AC & Sanitized Vehicles</p>
          </div>
          <div class="check-image">
            <img src="images/checked.png" />
            <p>24/7 Customer Support</p>
          </div>
        </div>
        <div class="about-services">
          <div class="check-image">
            <img src="images/checked.png" />
            <p>Background-Verified Drivers</p>
          </div>
          <div class="check-image">
            <img src="images/checked.png" />
            <p>One-Way & Outstation Specialist</p>
          </div>
          <div class="check-image">
            <img src="images/checked.png" />
            <p>Instant WhatsApp Booking</p>
          </div>
        </div>
      </div>
      <div class="about-footer-link">
        <a href="about.php"class="button-shine">
          <p class="footer-para">Know More About Us</p>
</a>
        <a href="https://wa.me/917017652679" class="about-whatsapp-button">
          <img src="images/whatsapp-2.png" />
          <p>Chat With Us</p>
</a>
      </div>
    </div>
    <div class="about-right-container">
      <img src="https://taxicabtaxiservice.in/goldencabservice/assets/images/about/about.jpg" />
      <div class="about-image-tag">
        <p class="about-image-year">10+</p>
        <p class="experience-year">YEARS EXPERIENCE</p>
      </div>
      <div class="about-rating">
        <img src="images/star-3.png" />
        <div>
          <p class="about-rating-num">4.9 / 5</p>
          <p class="customer-rating">CUSTOMER RATING</p>
        </div>
      </div>
    </div>
  </section>
  <!-- -----------------------------------------------------card section start--------------------- -->
  <section class="card-section">
    <div class="card-section-top-content">
      <div class="about-heading">
        <span class="red-dot"></span>
        <p>WHAT WE OFFER</p>
      </div>
      <p class="about-headline card-about-headline">
        Taxi Services in <span>Gopalganj</span> — For Every Journey
      </p>
      <p class="card-para">
        From short local errands to long cross-state travel, Golden Cab
        Service has a cab solution for every occasion
      </p>
    </div>
    <div class="card-container">
      <div class="card">
        <span class="card-border"></span>
        <div class="card-icon">
          <img src="images/driver.webp" />
        </div>
        <p class="card-heading">Local City Rides</p>
        <p class="card-desc">
          Need a quick cab within Gopalganj? Reach markets, hospitals, railway
          stations, or offices fast with our on-demand local taxis. Hourly and
          full-day packages available.
        </p>
        <a href="" class="openForm">Book Local Ride <i class="fa-solid fa-arrow-right-long"></i></a>
      </div>
      <div class="card">
        <span class="card-border"></span>
        <div class="card-icon">
          <img src="images/convenience.webp" />
        </div>
        <p class="card-heading">Outstation Cabs</p>
        <p class="card-desc">
          Travel beyond Gopalganj to Patna, Gorakhpur, Varanasi, Delhi,
          Lucknow, Ranchi & more. Spacious vehicles, experienced intercity
          drivers, and worry-free journeys.
        </p>
        <a href="" class="openForm">Book Outstation<i class="fa-solid fa-arrow-right-long"></i></a>
      </div>
      <div class="card">
        <span class="card-border"></span>
        <div class="card-icon">
          <img src="images/affordable.webp" />
        </div>
        <p class="card-heading">One-Way Cab Service</p>
        <p class="card-desc">
          Pay only for the distance you travel. Our one-way cab service covers
          all major routes from Gopalganj — no round-trip charges, completely
          fair pricing.
        </p>
        <a href="" class="openForm">Book One-Way <i class="fa-solid fa-arrow-right-long"></i></a>
      </div>
      <div class="card">
        <span class="card-border"></span>
        <div class="card-icon">
          <img src="images/virtualization.webp" />
        </div>
        <p class="card-heading">Airport Pickup & Drop</p>
        <p class="card-desc">
          Catch your flight without stress. We provide timely airport
          transfers to Patna (JAY Prakash Narayan Airport), Gorakhpur, and
          nearby airports — any time, day or night.
        </p>
        <a href="" class="openForm">Book Airport Cab <i class="fa-solid fa-arrow-right-long"></i></a>
      </div>
      <div class="card">
        <span class="card-border"></span>
        <div class="card-icon">
          <img src="images/flexible.webp" />
        </div>
        <p class="card-heading">Round Trip Rides</p>
        <p class="card-desc">
          Plan a day trip and come back in the same cab. Our trip service
          gives you flexibility of keeping vehicle all day — ideal for
          pilgrimages, family visits, and business tours.
        </p>
        <a href="" class="openForm">Book Round Trip<i class="fa-solid fa-arrow-right-long"></i></a>
      </div>
      <div class="card pan-india-card">
        <span class="last-card-border"></span>
        <div class="card-icon" id="card-icon">
          <img src="images/taxi.webp" />
        </div>
        <p class="card-heading pan-card-para">Pan India One-Way Cab</p>
        <p class="card-desc" id="card-desc">
          We provide one-way cab service across all of India. Travel anywhere
          in the country — from Gopalganj to any destination — with reliable,
          comfortable service at the best rates.
        </p>
        <a href="" class="pan-card-para openForm">Book Pan India Cab<i class="fa-solid fa-arrow-right-long"></i></a>
      </div>
    </div>
  </section>

  <!---------------------------------------- booking card section -------------------------------------->

  <section class="booking-card-section">
    <div class="card-section-top-content">
      <div class="about-heading">
        <span class="red-dot"></span>
        <p>TOP ROUTES</p>
      </div>
      <p class="about-headline card-about-headline">
        Popular Taxi Routes from <span>Gopalganj</span>, Siwan & Patna
      </p>
      <p class="card-para">
        Explore our most-booked intercity cab routes. Reliable, affordable,
        and comfortable rides — available 24/7.
      </p>
      <div class="booking-card-header-button">
        <div class="booking-card-location-button active" data-city="gopalganj">
          <i class="fa-solid fa-location-dot fa-sm location" style="color: #e8a020"></i>
          <p>From Gopalganj</p>
        </div>
        <div class="booking-card-location-button" data-city="siwan">
          <i class="fa-solid fa-location-dot fa-sm location" style="color: #e8a020"></i>
          <p>From Siwan</p>
        </div>
        <div class="booking-card-location-button" data-city="patna">
          <i class="fa-solid fa-location-dot fa-sm location" style="color: #e8a020"></i>
          <p>From Patna</p>
        </div>
      </div>
      <div class="booking-card-container">
      </div>
    </div>
  </section>

  <!-- ==============================CARD FLEET SECTION============================== -->

  <section class="card-fleet-section">
    <div class="card-fleet-container">
      <div class="card-section-top-content">
        <div class="about-heading">
          <span class="red-dot"></span>
          <p>Our Fleet</p>
        </div>
        <p class="about-headline card-about-headline">
          Choose Your<span> Perfect Cab</span>
        </p>
        <p class="card-para">
          From compact hatchbacks to luxury SUVs — every vehicle AC-equipped,
          sanitized & GPS-tracked.
        </p>
        <div class="booking-card-header-button">
          <button class="booking-card-location-button1 active" data-type="hatchback">
            <i class="fa-solid fa-car" style="color: #c5a67d"></i>
            <p>Hatchback</p>
</button>
          <button class="booking-card-location-button1" data-type="sedan">
            <i class="fa-solid fa-car-side" style="color: #c5a67d"></i>
            <p>Seedan</p>
</button>
          <button class="booking-card-location-button1" data-type="suv">
            <i class="fa-solid fa-truck" style="color: #c5a67d"></i>
            <p>SUV</p>
</button>
          <button class="booking-card-location-button1" data-type="premium">
            <i class="fa-solid fa-gem" style="color: #c5a67d"></i>
            <p>SUV Luxury</p>
</button>
        </div>
      </div>
      <div class="fleet-card">
        <span class="fleet-card-top-border"></span>
        <div class="car-image">
          <img id="car-image" src="images/hatchback.webp" />
        </div>
        <div class="fleet-card-right-content">
          <p id="fleet-card-heading">Hatchback</p>
          <p id="first-para">Budget Friendly • City Travel • Quick Trips</p>
          <p class="fleet-right-para" id="main-description">
            Ideal for solo travelers and couples. Perfect for short city rides
            within Gopalganj or nearby areas. Fuel-efficient and easy to
            navigate through busy streets.
          </p>
          <div class="car-feature" id="features">
            <p><i class="fa-solid fa-users"></i> 4 + 1 Seater</p>
            <p><i class="fa-solid fa-suitcase"></i> Small Laggage</p>
            <p><i class="fa-solid fa-snowflake"> </i> Full AC</p>
            <p><i class="fa-solid fa-wifi"></i> GPS Tracked</p>
          </div>
          <p>
            <span id="avai-models">Available Models:</span> <label id="model-list">Maruti Wagon R,
            Hyundai i10, Tata Tiago & similar.</label>
          </p>

          <p class="start-at">Starting at <span id="per-km">₹12/km</span></p>
          <div class="fleet-card-shine">
            <a href="" class="button-shine openForm" id="book-btn">
              <i class="fa-solid fa-car"></i> Book Hatchback</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--===================== CAR SERVICES SECTION START================================== -->

  <section class="card-section car-services-section">
    <div class="card-section-top-content">
      <div class="about-heading">
        <span class="red-dot"></span>
        <p>WHY GOLDEN CAB SERVICE?</p>
      </div>
      <p class="about-headline card-about-headline">
        Reasons Thousands Trust Us for <span>Cab Booking in Gopalganj</span>
      </p>
    </div>
    <div class="card-container car-services-container">
      <div class="card car-services-card">
        <span class="car-service-border"></span>
        <div class="card-icon" id="car-card-icon">
          <img src="images/driver.webp" />
        </div>
        <p class="card-heading" id="card-heading">
          Background-Verified Drivers
        </p>
        <p class="card-desc">
          All our drivers undergo thorough police verification and training.
          Courteous, punctual, and familiar with local and intercity routes.
        </p>
      </div>
      <div class="card car-services-card">
        <span class="car-service-border"></span>
        <div class="card-icon" id="car-card-icon">
          <img src="images/convenience.webp" />
        </div>
        <p class="card-heading" id="card-heading">
          24/7 Round-the-Clock Service
        </p>
        <p class="card-desc">
          Early morning flight or late-night return? We're always available.
          Book anytime by phone or WhatsApp — no waiting, no uncertainty.
        </p>
      </div>
      <div class="card car-services-card">
        <span class="car-service-border"></span>
        <div class="card-icon" id="car-card-icon">
          <img src="images/affordable.webp" />
        </div>
        <p class="card-heading" id="card-heading">
          Affordable & Transparent Fare
        </p>
        <p class="card-desc">
          What you see is what you pay. No surge pricing, no hidden tolls in
          the quote — just honest, competitive rates starting at ₹12/km.
        </p>
      </div>
      <div class="card car-services-card">
        <span class="car-service-border"></span>
        <div class="card-icon" id="car-card-icon">
          <img src="images/virtualization.webp" />
        </div>
        <p class="card-heading" id="card-heading">Instant WhatsApp Booking</p>
        <p class="card-desc">
          No app download required. Simply WhatsApp or call us and get instant
          confirmation. Booking a cab has never been this simple.
        </p>
      </div>
      <div class="card car-services-card">
        <span class="car-service-border"></span>
        <div class="card-icon" id="car-card-icon">
          <img src="images/flexible.webp" />
        </div>
        <p class="card-heading" id="card-heading">Flexible Trip Options</p>
        <p class="card-desc">
          One-way, round-trip, local hourly, outstation multi-day — we tailor
          every journey to your schedule, group size, and budget.
        </p>
      </div>
      <div class="card car-services-card">
        <span class="car-service-border"></span>
        <div class="card-icon" id="car-card-icon">
          <img src="images/pantone.webp" />
        </div>
        <p class="card-heading" id="card-heading">Wide Range of Vehicles</p>
        <p class="card-desc">
          Hatchbacks, sedans, SUVs, luxury SUVs, and Tempo Travellers — pick
          the right vehicle for your group size and travel purpose.
        </p>
      </div>
      <div class="card car-services-card">
        <span class="car-service-border"></span>
        <div class="card-icon" id="car-card-icon">
          <img src="images/quality.webp" />
        </div>
        <p class="card-heading" id="card-heading">
          Clean & Sanitized Vehicles
        </p>
        <p class="card-desc">
          Every cab is deep-cleaned and sanitized before and after each trip.
          Your health and hygiene is our non-negotiable priority.
        </p>
      </div>
      <div class="card car-services-card">
        <span class="car-service-border"></span>
        <div class="card-icon" id="car-card-icon">
          <img src="images/taxi.webp" />
        </div>
        <p class="card-heading" id="card-heading">Pan India Coverage</p>
        <p class="card-desc">
          We provide one-way cab service across all of India. Travel anywhere
          in the country — from Gopalganj to any destination — with comfort
          and ease.
        </p>
      </div>
    </div>
  </section>

  <!--================================== Guide section=========================================-->

  <section class="guide-section">
    <div class="guide-container">
      <div class="left-guide">
        <div class="left-guide-top-heading">
          <p>Taxi Service in Gopalganj — Complete Travel</p>
          <p>Guide</p>
        </div>
        <div class="local-ride-para">
          <p class="local-ride-heading">Reliable Local Rides in Gopalganj</p>
          <p class="local-ride-desc">
            Getting around Gopalganj can be challenging with irregular public
            transport. Golden Cab Service fills that gap with GPS-enabled,
            air-conditioned cabs that are always on time. Whether it's a
            morning commute to the office, a hospital visit, or a shopping
            trip to the local market — our drivers know Gopalganj inside out
            and ensure smooth, stress-free local rides.
          </p>
        </div>
        <div class="local-ride-para">
          <p class="local-ride-heading">Outstation Cabs from Gopalganj</p>
          <p class="local-ride-desc">
            Planning a trip outside Gopalganj? Our outstation cab service
            covers popular routes to Patna, Gorakhpur, Bettiah, Motihari,
            Varanasi, Delhi, and beyond. With intercity-experienced drivers,
            well-maintained vehicles, and 24/7 availability, we make
            long-distance travel comfortable and safe — whether it's a
            pilgrimage, business trip, or family visit.
          </p>
        </div>
        <div class="local-ride-para">
          <p class="local-ride-heading">
            One-Way Cab — Pay Only for Your Trip
          </p>
          <p class="local-ride-desc">
            Our one-way taxi service from Gopalganj lets you pay only for the
            distance you travel — no round-trip charges. Ideal for one-way
            transfers to Patna Junction, Gorakhpur Airport, or any city across
            Bihar and UP. Transparent pricing, no hidden fees, and instant
            booking make it the smartest travel choice.
          </p>
        </div>
        <div class="local-ride-para">
          <p class="local-ride-heading">Airport Transfers Made Easy</p>
          <p class="local-ride-desc">
            Traveling to Jay Prakash Narayan International Airport in Patna or
            Gorakhpur Airport? Book your airport cab with Golden Cab Service
            for on-time pickup and drop. We monitor flight schedules and
            ensure our driver reaches you well in advance — even for early
            morning and late-night flights.
          </p>
        </div>
        <div class="local-ride-para">
          <p class="local-ride-heading">Monthly Cab Packages in Gopalganj</p>
          <p class="local-ride-desc">
            Frequently commuting? Our monthly car rental plans offer a
            dedicated cab and driver for daily needs at highly discounted
            rates. Perfect for corporate employees, students, or families in
            Gopalganj who need consistent, reliable transport every day
            without the hassle of daily bookings.
          </p>
        </div>
      </div>
      <div class="right-guide">
        <div class="left-guide-top-heading">
          <p>Book One-Way or Round-Trip with Golden Cab</p>
          <p>Service</p>
        </div>
        <div class="local-ride-para">
          <p class="local-ride-heading">Easy Online Booking</p>
          <p class="local-ride-desc">
            Booking a cab with Golden Cab Service in Gopalganj takes just
            minutes. Fill in the form on this page, or WhatsApp us at +91
            9608150914. Instant confirmation, transparent pricing, and a
            driver assigned to you within minutes. No app, no registration —
            just a simple call or message.
          </p>
        </div>
        <div class="local-ride-para">
          <p class="local-ride-heading">Pan India One-Way Cab Service</p>
          <p class="local-ride-desc">
            Golden Cab Service provides one-way cab service across all of
            India. Whether you're traveling from Gopalganj to Delhi, Mumbai,
            Kolkata, or any city in the country — we have reliable cabs and
            experienced drivers to take you there safely. We cover all states
            and union territories, making us your trusted travel partner for
            any destination in India.
          </p>
        </div>
        <div class="local-ride-para">
          <p class="local-ride-heading">
            Why Gopalganj Travelers Choose Golden Cab Service
          </p>
          <p class="local-ride-desc">
            As Gopalganj's most-trusted cab service, we've built our
            reputation on punctuality, honest pricing, and driver
            professionalism. Our growing network of routes, diverse fleet, and
            24/7 customer support make us the first choice for daily
            commuters, outstation travelers, corporate clients, and tourists
            visiting Gopalganj and the surrounding region.
          </p>
        </div>
        <div class="local-ride-para book-dropdown">
          <p class="local-ride-heading">Frequently Asked Questions</p>
        </div>

        <div class="accordion">
          <div class="accordion-header header" onclick="color()">
            How do I book a cab in Gopalganj?
            <span class="arrow">❯</span>
          </div>
          <div class="accordion-content" id="content">
            <p>Simply fill out the booking form on this page, call us at <span>+91 9608150914</span>, or send a WhatsApp
              message to <span>+91 9608150914</span>. You'll receive instant confirmation and a driver will be assigned
              to your ride promptly. We're available 24/7.</p>
          </div>

        </div>
        <div class="accordion">
          <div class="accordion-header header" id="text" onclick="color()">
            Do you offer one-way taxi from Gopalganj to Patna?
            <span class="arrow">❯</span>
          </div>
          <div class="accordion-content" id="content">
            <p>Yes! Our Gopalganj to Patna one-way cab service lets you pay only for the ride — no return charges.
              Distance is approximately 180 km and the journey takes around 4 hours. We operate this route 24/7 with
              hatchbacks, sedans, and SUVs.</p>
          </div>

        </div>
        <div class="accordion">
          <div class="accordion-header header" id="text" onclick="color()">
            What is the fare for cab service in Gopalganj?
            <span class="arrow">❯</span>
          </div>
          <div class="accordion-content" id="content">
            <p>Our cab fares in Gopalganj start from ₹12/km for hatchbacks. Sedans start from ₹13/km, SUVs from ₹14/km,
              and luxury SUVs from ₹18/km. All fares are inclusive of fuel with no hidden charges. Contact us for exact
              quote on your specific route.</p>
          </div>

        </div>
        <div class="accordion">
          <div class="accordion-header header" id="text" onclick="color()">
            Do you provide cab service to delhi or other state from Gopalganj?
            <span class="arrow">❯</span>
          </div>
          <div class="accordion-content" id="content">
            <p>Absolutely! Golden Cab Service provides one-way cab service across all of India. We operate routes from
              Gopalganj to Delhi, Varanasi, Lucknow, Ranchi, Kolkata, Mumbai, and anywhere else in the country. Our
              intercity drivers are experienced in long-distance travel.</p>
          </div>

        </div>
        <div class="accordion">
          <div class="accordion-header header" id="text" onclick="color()">
            Are your vehicles AC and sanitized?
            <span class="arrow">❯</span>
          </div>
          <div class="accordion-content" id="content">
            <p>Yes, all our vehicles are fully air-conditioned, GPS-tracked, and sanitized before every trip. We
              maintain a strict cleaning protocol to ensure a hygienic and comfortable journey for all passengers.</p>
          </div>

        </div>
      </div>
    </div>
    </div>
  </section>

  <?php
include("include/footer.php");
?>
  <!-- =====================================footer start====================================== -->