---
name: payment-gateway-integration
description: Flow logic rules for adding or modifying payment gateways, detailing session-based checkout redirects and callback workflows.
---

# Payment Gateway Integration Guidelines

ProdeX supports dynamic, modular checkout experiences across multiple payment gateways (PayPal, Stripe, Bkash, Razorpay, etc.). All payment controllers follow a standardized, session-driven redirect and callback design.

## 1. Core Integration Workflow

When a user initiates a payment, the gateway controller (e.g., `PaypalController`, `StripeController`) must:
1.  Read API keys and configuration dynamically using `get_setting()` (e.g., `get_setting('paypal_sandbox')`).
2.  Check the `payment_type` stored in the Session to decide what action is being paid for.
3.  Calculate the exact payable transaction amount based on the payment type.
4.  Redirect the user to the gateway page.
5.  Upon payment callback (Success or Cancel), route the result to the corresponding domain controller.

## 2. Reading Session and Calculating Amount

Your controller's payment initiation method (usually `pay()`) should execute this logic to determine transaction parameters:

```php
if (Session::has('payment_type')) {
    $paymentType = Session::get('payment_type');
    $paymentData = Session::get('payment_data');
    
    if ($paymentType == 'cart_payment') {
        // Main Store Checkout
        $combined_order = CombinedOrder::findOrFail(Session::get('combined_order_id'));
        $amount = $combined_order->grand_total;
    } elseif ($paymentType == 'order_re_payment') {
        // Paying an unpaid existing order
        $order = Order::findOrFail($paymentData['order_id']);
        $amount = $order->grand_total;
    } elseif ($paymentType == 'wallet_payment') {
        // Customer loading funds into their wallet
        $amount = $paymentData['amount'];
    } elseif ($paymentType == 'customer_package_payment') {
        // Purchasing a customer package
        $customer_package = CustomerPackage::findOrFail($paymentData['customer_package_id']);
        $amount = $customer_package->amount;
    } elseif ($paymentType == 'seller_package_payment') {
        // Purchasing a seller subscription package
        $seller_package = SellerPackage::findOrFail($paymentData['seller_package_id']);
        $amount = $seller_package->amount;
    }
}
```

## 3. Standard Callback Processing

Upon a successful gateway response (e.g., callback URL trigger), your callback method must retrieve the session values and route control to the correct destination:

```php
if ($request->session()->has('payment_type')) {
    $paymentType = $request->session()->get('payment_type');
    $paymentData = $request->session()->get('payment_data');
    
    // Convert transaction response payload to JSON string representation
    $payment_details = json_encode($response); 

    if ($paymentType == 'cart_payment') {
        return (new CheckoutController)->checkout_done($request->session()->get('combined_order_id'), $payment_details);
    } elseif ($paymentType == 'order_re_payment') {
        return (new CheckoutController)->orderRePaymentDone($paymentData, $payment_details);
    } elseif ($paymentType == 'wallet_payment') {
        return (new WalletController)->wallet_payment_done($paymentData, $payment_details);
    } elseif ($paymentType == 'customer_package_payment') {
        return (new CustomerPackageController)->purchase_payment_done($paymentData, $payment_details);
    } elseif ($paymentType == 'seller_package_payment') {
        return (new SellerPackageController)->purchase_payment_done($paymentData, $payment_details);
    }
}
```

## 4. Handling Payment Cancellations
When a payment is cancelled, clean up transaction temporary session keys and display a warning toast:

```php
public function getCancel(Request $request)
{
    $request->session()->forget('order_id');
    $request->session()->forget('payment_data');
    
    flash(translate('Payment cancelled'))->warning();
    return redirect()->route('home');
}
```
