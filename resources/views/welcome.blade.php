<!DOCTYPE html>
<html>
    <head>
        <title>example</title>
        <link rel='stylesheet' href='/stylesheets/style.css' />
        <!-- includes the Braintree JS client SDK -->
        <script src="https://js.braintreegateway.com/web/dropin/1.27.0/js/dropin.min.js"></script>
        <!-- includes jQuery -->
        <script src="http://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
    </head>
    <body>

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div id="dropin-wrapper">
        <div id="checkout-message"></div>
        <div id="dropin-container"></div>
        <button id="submit-button">Submit payment</button>
        </div>
        <script>
                var button = document.querySelector("#submit-button");
                braintree.dropin.create({
                authorization: 'sandbox_x6mvdvj5_r7czy6mhvckbb4v2' ,
                container: "#dropin-container"
                }, function (createErr, instance) {
                button.addEventListener("click", function () {
                    instance.requestPaymentMethod(function (err, payload) {
                        $.get("{{ route("payment.make") }}", {payload}, function (response) {
                if (response.success) {
                    alert("Payment successfull!");
                } else {
                    alert("Payment failed");
                }
            }, "json");
                });
            });
        });
    </script>
</body>
</html>


