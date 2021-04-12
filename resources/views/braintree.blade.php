<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BRAINTREE</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div id="dropin-container"></div>
                    <button id="submit-button">Request payment method</button>
                </div>
            </div>
        </div>
    <script>
        var button = document.querySelector('#submit-button');
        braintree.dropin.create({
            authorization: "sandbox_x6mvdvj5_r7czy6mhvckbb4v2",
            container: '#dropin-container'
            }, function (createErr, instance) {
                button.addEventListener('click', function () {
                instance.requestPaymentMethod(function (err, payload) {
                $.get('{{ route('payment.make') }}', {payload}, function (response) {
                if (response.success) {
                    alert('Payment successfull!');
                } else {
                    alert('Payment failed');
                }
            }, 'json');
        });
    });
});
</script>
</body>
</html>



{{--

-----------------------------------------------------------------------------------

CREDENZIALI PER ACCEDERE AL PANNELLO TEST/SANDBOX DI BRAINTREEPAYMENTS:

USERNAME: Squad4Group
PASSWORD: Booleangroup4

-----------------------------------------------------------------------------------

PER BRAINTREE PAYMENTS:

3. To setup Braintree in Laravel, go to App/Providers/AppServiceProvider.php and add the following code to your boot() method

\Braintree_Configuration::environment(env(‘BRAINTREE_ENV’));
\Braintree_Configuration::environment(env(‘BRAINTREE_ENV’));
\Braintree_Configuration::merchantId(env(‘BRAINTREE_MERCHANT_ID’));
\Braintree_Configuration::publicKey(env(‘BRAINTREE_PUBLIC_KEY’));
\Braintree_Configuration::privateKey(env(‘BRAINTREE_PRIVATE_KEY’));

SOSTITUIRE CON:

Configuration::environment(env('BRAINTREE_ENV'));
Configuration::merchantId(env('BRAINTREE_MERCHANT_ID'));
Configuration::publicKey(env('BRAINTREE_PUBLIC_KEY'));
Configuration::privateKey(env('BRAINTREE_PRIVATE_KEY'));

IMPORTANDO use Braintree\Configuration;

-----------------------------------------------------------------------------------

USARE QUESTO USE NEL CONTROLLER DEI PAGAMENTI (altrimenti bestemmi):

use Braintree\Transaction as Braintree_Transaction;


--}}
