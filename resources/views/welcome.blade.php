
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Grab Survey</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="{{ asset('grab.png') }}" alt="" width="100" height="100">
        <h2>Grab Survey</h2>
        <p class="lead"></p>
      </div>

      <div class="row">
        <div class="col-md-12">
          <h4 class="mb-3">Survey Form</h4>
          <form action="https://grab-survey.herokuapp.com/survey-store" method="POST">
            <div class="row">
                @csrf

                <input type="hidden" name="latitude" id="latitude">
                <input type="hidden" name="longitude" id="longitude">

              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" name="first_name" class="form-control" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text"  name="last_name" class="form-control" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com">
            </div>

            <div class="mb-3">
              <label for="address">Address (Optional)</label>
              <input type="text" name="address" class="form-control" id="address" placeholder="1234 Main St">
            </div>

            <div class="mb-3">
              <label for="use_grab">How often you book at Grab <span class="text-muted"></span></label>
              <select class="custom-select d-block w-100" id="use_grab" required>
                  <option value="">Choose...</option>
                  <option>Once a week</option>
                  <option>Twice a week</option>
                  <option>Thrice or more than a week</option>
                </select>
            </div>

            <div class="mb-3">
              <label for="rate">Rate Grab (1-lowest - 5-highest)  <span class="text-muted"></span></label>
              <select class="custom-select d-block w-100" id="rate" required>
                  @foreach(range(1, 5) as $rate)
                  <option>{{ $rate }}</option>
                  @endforeach
                </select>
            </div>

            <h4 class="mb-3">What kind of device are you using when booking to Grab?</h4>
            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="android" value="android" name="device" type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="android">Phone (Android)</label>
              </div>
                <div class="custom-control custom-radio">
                <input id="iphone" value="iphone" name="device" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="iphone">Phone (Iphone)</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="tablet" value="tablet" name="device" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="tablet">Tablet</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="laptop" value="laptop" name="device" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="laptop">Laptop</label>
              </div>
                <div class="custom-control custom-radio">
                <input id="pc" value="pc" name="device" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="pc">PC</label>
              </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-success btn-lg btn-block" type="submit">Submit Survey</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2021-2022 Grab</p>
        <ul class="list-inline">
        </ul>
      </footer>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(setPosition);
        }

        function setPosition(position) {
            $('#latitude').val(position.coords.latitude);
            $('#longitude').val(position.coords.longitude);
        }

        allowLocation = false;

        $(document).ready(function() {
          $('form').on('submit', function(e){

            if (navigator.geolocation) {
                return true;
            } else {
                swal("Error!", "Please allow location!", "error");
                return false;
            }
            
          });
        });
    </script>
  </body>
</html>
