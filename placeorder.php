<?php require_once 'includes/header.php';





// Check the session variable for products in cart
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;
$tax = 0.075;
$taxTotal = 0;
$total = 0;
// If there are products in cart
if ($products_in_cart) {
    // There are products in the cart so we need to select those products from the database
    // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id IN (' . $array_to_question_marks . ')');
    // We only need the array keys, not the values, the keys are the id's of the products
    $stmt->execute(array_keys($products_in_cart));
    // Fetch the products from the database and return the result as an Array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Calculate the subtotal
    foreach ($products as $product) {
        $subtotal += (float) $product['price'] * (int) $products_in_cart[$product['id']];
        $taxTotal += $subtotal * $tax;
        $total = $subtotal + $taxTotal;
    }
}

?>


<!-- <div class="placeorder content-wrapper">
    <h1>Your Order Has Been Placed</h1>
    <p>Thank you for ordering with us, we'll contact you by email with your order details.</p>
</div> -->
<div class="container placeorder">
    <div id="Checkout" class="inline">
        <h1>Payment</h1>
        <div class="card-row">
            <span class="visa"></span>
            <span class="mastercard"></span>
            <span class="amex"></span>
            <span class="discover"></span>
        </div>
        <form action="placeorder_sent.php" method="post">
            <div class="form-group">
                <label for="PaymentAmount">Payment amount</label>
                <div class="amount-placeholder">
                    <span>$</span>
                    <span><?= round($total, 2) ?></span>
                </div>
            </div>
            <div class="form-group">
                <label or="NameOnCard">Name on card*</label>
                <input required id="NameOnCard" class="form-control" type="text" maxlength="255"></input>
            </div>
            <div class="form-group">
                <label for="CreditCardNumber">Card number*</label>
                <input required id="CreditCardNumber" placeholder="Enter just the card number. No dashes needed" class="null card-image form-control" maxlength="16" type="text"></input>
            </div>
            <div class="expiry-date-group form-group">
                <label for="ExpiryDate">Expiration date*</label>
                <input id="ExpiryDate" type="month" name="start" min="2020-05" required class="form-control" type="text"></input>
            </div>
            <div class="security-code-group form-group">
                <label for="securityCode">Security code*</label>
                <div class="input-container">
                    <input id="securityCode" class="form-control" required type="password" maxlength="4"></input>
                    <!-- <i id="cvc" class="fa fa-question-circle"></i> -->
                </div>
                <div class="cvc-preview-container two-card hide">
                    <div class="amex-cvc-preview"></div>
                    <div class="visa-mc-dis-cvc-preview"></div>
                </div>
            </div>
            <div class="zip-code-group form-group">
                <label for="State">Phone*</label>
                <div class="input-container">
                    <input id="Phone" type="tel" required class="form-control" type="text" maxlength="10" placeholder="No Dashes needed"></input>
                    <a tabindex="0" role="button" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" data-toggle="popover" data-trigger="focus" data-placement="left" data-content="Enter the Phone number for billing."></a>
                </div>
            </div>
            <div class="zip-code-group form-group">
                <label for="StreetAddress">Street Address*</label>
                <div class="input-container">
                    <input id="StreetAddress" required class="form-control" type="text" maxlength="255"></input>
                    <a tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="left" data-content="Enter the Street Address for billing."></a>
                </div>
            </div>
            <div class="zip-code-group form-group">
                <label for="City">City*</label>
                <div class="input-container">
                    <input id="City" required class="form-control" type="text" maxlength="10"></input>
                    <a tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="left" data-content="Enter the City for billing."></a>
                </div>
            </div>
            <div class="zip-code-group form-group">
                <label for="State">State*</label>
                <div class="input-container">

                    <select required>
                        <option value="AL">AL</option>
                        <option value="AK">AK</option>
                        <option value="AR">AR</option>
                        <option value="AZ">AZ</option>
                        <option value="CA">CA</option>
                        <option value="CO">CO</option>
                        <option value="CT">CT</option>
                        <option value="DC">DC</option>
                        <option value="DE">DE</option>
                        <option value="FL">FL</option>
                        <option value="GA">GA</option>
                        <option value="HI">HI</option>
                        <option value="IA">IA</option>
                        <option value="ID">ID</option>
                        <option value="IL">IL</option>
                        <option value="IN">IN</option>
                        <option value="KS">KS</option>
                        <option value="KY">KY</option>
                        <option value="LA">LA</option>
                        <option value="MA">MA</option>
                        <option value="MD">MD</option>
                        <option value="ME">ME</option>
                        <option value="MI">MI</option>
                        <option value="MN">MN</option>
                        <option value="MO">MO</option>
                        <option value="MS">MS</option>
                        <option value="MT">MT</option>
                        <option value="NC">NC</option>
                        <option value="NE">NE</option>
                        <option value="NH">NH</option>
                        <option value="NJ">NJ</option>
                        <option value="NM">NM</option>
                        <option value="NV">NV</option>
                        <option value="NY">NY</option>
                        <option value="ND">ND</option>
                        <option value="OH" selected>OH</option>
                        <option value="OK">OK</option>
                        <option value="OR">OR</option>
                        <option value="PA">PA</option>
                        <option value="RI">RI</option>
                        <option value="SC">SC</option>
                        <option value="SD">SD</option>
                        <option value="TN">TN</option>
                        <option value="TX">TX</option>
                        <option value="UT">UT</option>
                        <option value="VT">VT</option>
                        <option value="VA">VA</option>
                        <option value="WA">WA</option>
                        <option value="WI">WI</option>
                        <option value="WV">WV</option>
                        <option value="WY">WY</option>
                    </select>
                    <a tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="left" data-content="Enter the State for billing."></a>
                </div>
            </div>
            <div class="zip-code-group form-group">
                <label for="ZIPCode">Zip/Postal code*</label>
                <div class="input-container">
                    <input id="ZIPCode" class="form-control" type="text" maxlength="10" required></input>
                    <a tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="left" data-content="Enter the ZIP/Postal code for your credit card billing address."></a>
                </div>
            </div>
            <button id="PayButton" class="btn btn-block btn-success submit-button" type="submit">
                <span class="submit-button-lock"></span>
                <span class="align-middle">Pay $<?= round($total, 2) ?></span>
            </button>
        </form>
    </div>
</div>



<?= template_footer() ?>