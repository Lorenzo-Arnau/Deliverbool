<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel=“stylesheet” href="{{ asset('css/app.css') }}" type="text/css">
    <script src="https://js.braintreegateway.com/web/dropin/1.27.0/js/dropin.min.js"></script>
    <title>CHART JS</title>
</head>
<body>

    {{-- mettere div contenitore CON QUESTA CLASSE SPECIFICA per il canvas, così da poter modificare width e height --}}
    <div class="chart-container"
        style="height:40vh; width:80vw"
    >
        {{-- scrivere esattamente questo per contenere il grafico --}}
        <canvas id="myChart"></canvas>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
