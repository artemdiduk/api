<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h2>Payment Information</h2>
    <form action="/purchase" class="form-send" method="post">

        <div class="form-row">
            <div class="col-md-6">
                <h5>Order id</h5>
            </div>
            <div class="col-md-6">
                <p><?= $order_id ?></p>
                <input name="order_id" id="order_id" value="<?= $order_id ?>" hidden>
            </div>
            <div class="col-md-6">
                <h5>Order Amount</h5>
            </div>
            <div class="col-md-6">
                <p><?= $order_amount ?></p>
                <input name="order_amount"  id="order_amount" value="<?= $order_amount ?>" hidden>
            </div>
            <div class="col-md-6">
                <h5>Order Currency</h5>
            </div>
            <div class="col-md-6">
                <p><?= $order_currency ?></p>
                <input name="order_currency" id="order_currency" value="<?= $order_currency ?>" hidden>
            </div>

            <div class="col-md-6">
                <h5>Order Description</h5>
            </div>
            <div class="col-md-6">
                <p><?= $order_description ?></p>
                <input name="order_description" id="order_description" value="<?= $order_description ?>" hidden>
            </div>

        </div>


        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="payer_first_name">Name</label>
                <input required name="payer_first_name" type="text" class="form-control" id="payer_first_name"
                       placeholder="Enter name" maxlength="32">
            </div>
            <div class="form-group col-md-4">
                <label for="payer_last_name">Surname</label>
                <input required type="text" name="surname" class="form-control" id="payer_last_name"
                       placeholder="Enter surname" maxlength="32">
            </div>
            <div class="form-group col-md-4">
                <label for="payer_middle_name">Middle Name</label>
                <input name="payer_middle_name" type="text" class="form-control" id="payer_middle_name"
                       placeholder="Enter middle name"
                       maxlength="32">
            </div>

            <div class="form-group col-md-6">
                <label for="birth_date">Birthday (yyyy-MM-dd)</label>
                <input name="payer_birth_date" type="text" class="form-control" id="birth_date"
                       placeholder="Enter birthday"
                       pattern="\d{4}-\d{2}-\d{2}">
            </div>
            <div class="form-group col-md-6">
                <label for="payer_address">Address</label>
                <input required name="payer_address" type="text" class="form-control" id="payer_address"
                       placeholder="Enter  address" maxlength="255">
            </div>

            <div class="form-group col-md-3">
                <label for="payer_address">Address 2</label>
                <input name="payer_address2" type="text" class="form-control" id="payer_address2"
                       placeholder="Enter  address" maxlength="255">
            </div>

            <div class="form-group col-md-3">
                <label for="payer_country">Country (2-letter code)</label>
                <input type="text" required name="payer_country" class="form-control" id="payer_country"
                       placeholder="Enter  country (2-letter code)" maxlength="2">
            </div>
            <div class="form-group col-md-3">
                <label for="payer_state">State</label>
                <input type="text" class="form-control" id="payer_state" placeholder="Enter  state"
                       maxlength="32">
            </div>
            <div class="form-group col-md-3">
                <label for="payer_city">City</label>
                <input required name="payer_city" type="text" class="form-control" id="payer_city" placeholder="Enter  city"
                       maxlength="32">
            </div>
            <div class="form-group col-md-3">
                <label for="payer_zip">ZIP-code of the Customer</label>
                <input required type="text" name="payer_zip" class="form-control" id="payer_zip" placeholder="Enter ZIP-code" maxlength="10">
            </div>
            <div class="form-group col-md-3">
                <label for="payer_email">Email</label>
                <input required name="payer_email" type="email" class="form-control" id="payer_email" placeholder="Enter  email"
                       maxlength="256">
            </div>
            <div class="form-group col-md-4">
                <label for="payer_phone">Phone</label>
                <input required name="payer_phone" type="tel" class="form-control" id="payer_phone" placeholder="Enter  phone"
                       maxlength="32">
            </div>
            <div class="form-group col-md-3">
                <label for="cardNumber">Card Number</label>
                <input required type="number" name="card_number" class="form-control" id="cardNumber" placeholder="Enter card number">
            </div>
            <div class="form-group col-md-3">
                <label for="expYear">Expiration Year</label>
                <select required id="expYear" name="card_exp_year" class="form-control">
                    <?php for ($i = date("Y"); $i < date("Y") + 5; $i++) : ?>
                        <option value="<?= $i ?>" selected><?= $i ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="expMonth">Expiration Month</label>
                <select required id="expMonth" class="form-control" name="card_exp_month">
                    <?php for ($i = 1; $i <= 12; $i++) : ?>
                        <option value="<?= sprintf('%02d', $i); ?>"><?= sprintf('%02d', $i); ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="cvv2">CVV2</label>
                <input name="card_cvv2" required type="number" class="form-control" id="cvv2" placeholder="Enter CVV2">
            </div>
        </div>
        <input name="client_key" value="<?= $client_key ?>" id="client_key" class="form-control" hidden >
        <input name="client_pas" value="<?= $client_pas ?>"  id="client_pas" class="form-control" hidden >
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <div class="result alert mt-3" ></div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

    $(function () {
        $("#birth_date").datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
</script>

<script src="/../../resource/js/index.js"></script>

</body>
</html>