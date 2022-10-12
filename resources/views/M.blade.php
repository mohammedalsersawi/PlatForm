<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="card">

        <div class="row">
            <div class="col-lg-8 col-md-6">
                <script src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId={{ $checkoutId }}"></script>
                <form action="{{ route('thanks') }}" class="paymentWidgets" data-brands="VISA MASTER AMEX">

                </form>



            </div>

        </div>
</body>

</html>
