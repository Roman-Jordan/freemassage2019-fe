<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Document</title>
  <link rel="stylesheet" href="./css/index.css" />
  <style>
    <?php include('./css/index.css'); ?>
  </style>
</head>

<body>
  <section>
    <div>
      <h1>Book a free in office massage for your staff</h1>
      <button id="formTrigger">Book now, FUCK YEA</button>
    </div>
  </section>
  <div id="signup" class="formHolder hideForm">
    <form action="/newContact.php" method="post">
      <div>
        <input type="text" id="CompanyName" name="CompanyName" placeholder="Company Name" autocomplete="organization" />
        <label for="name">Contact Person</label>
        <input type="text" id="name" name="name" placeholder="Contact Person" />
      </div>
      <div>

        <input type="tel" id="tel" name="tel" placeholder="1-971-555-5555" />


        <input type="email" id="email" name="email" placeholder="email" />
      </div>
      <div>

        <input type="date" id="date" name="date" placeholder="Date" />


        <input type="time" id="time" name="time" placeholder="Time" />
      </div>
      <div>
        <input type="address" id="address" name="address" placeholder="Address" />
        <input type="city" id="city" name="city" placeholder="city" />

        <input type="state" id="state" name="state" placeholder="state" />
      </div>
      <div class="g-recaptcha" data-sitekey="6LetccMUAAAAAFUgZj0bluAwyy_eDQCkIyYcX1Tv"></div>
      <input type="submit" value="Submit" />

    </form>
  </div>

  <script>
    const formTrigger = document.querySelector("#formTrigger");
    const form = document.querySelector("#signup");
    formTrigger.addEventListener("click", () => {
      form.classList.toggle("hideForm");
    });
  </script>
  <script src="https://www.google.com/recaptcha/api.js?render=_reCAPTCHA_site_key"></script>

</body>

</html>