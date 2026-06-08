 <div class="form-main-container">
    <form method="post" action="index.php" class="form">
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
            <div class="user-icon mobile-span">
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
