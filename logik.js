    
    function produktzeigen(nr) {
        if(nr === 1) {
            document.getElementById("schuh").style.display = "none";
            document.getElementById("tshirt").style.display = "block";
        }
        if(nr === 2) {
            document.getElementById("schuh").style.display = "block";
            document.getElementById("tshirt").style.display = "none";
        }
    }

      function initPayPalButton() {
        paypal.Buttons({
          style: {
            shape: 'pill',
            color: 'blue',
            layout: 'vertical',
            label: 'paypal',
            
          },
  
          createOrder: function(data, actions) {
            return actions.order.create({
              purchase_units: [{"description":"Schuh","amount":{"currency_code":"EUR","value":10}}]
            });
          },
  
          onApprove: function(data, actions) {
            return actions.order.capture().then(function(orderData) {
              
              // Full available details
              console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
  
              // Show a success message within this page, e.g.
              const element = document.getElementById('paypal-button-tshirt');
              element.innerHTML = '';
              element.innerHTML = '<h3>Thank you for your payment!</h3>';
              const xhttp = new XMLHttpRequest();
              xhttp.open("GET", "testphp.php");
              xhttp.send();
              // Or go to another URL:  actions.redirect('thank_you.html');
              
            });
          },
  
          onError: function(err) {
            console.log(err);
          }
        }).render('#paypal-button-tshirt');
      }
      initPayPalButton();