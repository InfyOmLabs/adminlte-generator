<!DOCTYPE html>
<html>

<head>
    <title>Systeme Paiement Cash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    {{-- <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script> --}}
    <!-- Custom Theme files -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!-- //Custom Theme files -->
    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- //web font -->
    <link rel="stylesheet" href="{{ asset('css/notiflix-3.2.5.min.css') }}" />
    <script src="https://cdn.cinetpay.com/seamless/main.js"></script>
    <style>
        .sdk {
            display: block;
            position: absolute;
            background-position: center;
            text-align: center;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body>
    <!-- main -->
    <div class="main-w3layouts wrapper">
        <h1>Inscription Systeme Paiement Cash</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <form method="POST" action="{{ route('clients.store') }}" id="send-inscription">
                    @csrf
                    <input class="text" type="text" name="name" placeholder="Nom & Prénom" required="">
                    <input class="text email" type="email" name="email" placeholder="Email" required="">
                    <input class="text email" type="text" name="phone" placeholder="Téléphone" required="">
                    <input type="submit" value="VALIDER & PAYER">
                </form>
            </div>
        </div>
        <!-- copyright -->
        <div class="colorlibcopy-agile">
            <p>© 2022 Systeme Paiement Cash</p>
        </div>
        <!-- //copyright -->
        <ul class="colorlib-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <!-- //main -->
    <script src="{{ asset('js/notiflix-3.2.5.min.js') }}"></script>
    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js') }}"></script>
    <script src="{{ asset('js/payment.js')}}"></script>
</body>

</html>
