window.addEventListener("load", function () {
    var cartItems = [{
        name: "Product 1",
        description: "Description of product 1",
        quantity: 1,
        price: 50,
        sku: "prod1",
        currency: "USD"
    }, {
        name: "Product 2",
        description: "Description of product 2",
        quantity: 3,
        price: 20,
        sku: "prod2",
        currency: "USD"
    }, {
        name: "Product 3",
        description: "Description of product 3",
        quantity: 4,
        price: 10,
        sku: "prod3",
        currency: "USD"
    }];

    var total = 0;
    for (var a = 0; a < cartItems.length; a++) {
        total += (cartItems[a].price * cartItems[a].quantity);
    }

    // Render the PayPal button
    paypal.Button.render({

        // Set your environment
        env: 'sandbox', // sandbox | production

        // Specify the style of the button
        style: {
            label: 'checkout',
            size: 'responsive', // small | medium | large | responsive
            shape: 'pill', // pill | rect
            color: 'gold', // gold | blue | silver | black,
            layout: 'vertical'
        },

        // PayPal Client IDs - replace with your own
        // Create a PayPal app: https://developer.paypal.com/developer/applications/create

        client: {
            sandbox: 'AdzsJYkvReUBwhm6SXUDSjB6aXrOcirhRxbVA4H2vIwMJPaNUTY6lTiU5c4fr961vlNa9f1debZ7W1EC',
            production: ''
        },

        funding: {
            allowed: [
                paypal.FUNDING.CARD,
                paypal.FUNDING.ELV
            ]
        },

        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [{
                        amount: {
                            total: total,
                            currency: 'USD'
                        },
                        item_list: {
                            // custom cartItems array created specifically for PayPal
                            items: cartItems
                        }
                    }]
                }
            });
        },

        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                // you can use all the values received from PayPal as you want
                console.log({
                    "intent": data.intent,
                    "orderID": data.orderID,
                    "payerID": data.payerID,
                    "paymentID": data.paymentID,
                    "paymentToken": data.paymentToken
                });

                // [call AJAX here]
            });
        },
        
        onCancel: function (data, actions) {
            console.log(data);
        }

    }, '#btn-paypal-checkout');
});