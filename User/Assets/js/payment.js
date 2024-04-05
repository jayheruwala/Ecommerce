function openCard() {
     var card = document.getElementById('payCreditcard');
    var creditCard = document.getElementById('creditCard');
    if (!creditCard.classList.contains('creditCard')) {
        creditCard.classList.add('creditCard');
    }
}
function closeCard() {
    var card = document.getElementById('payCreditcard');
    var creditCard = document.getElementById('creditCard');
    if (creditCard.classList.contains('creditCard')) {
        creditCard.classList.remove('creditCard');
    }
}


document.getElementById('cardNumber').addEventListener('input', function (e) {
    let cardNumber = e.target.value.replace(/\D/g);
    cardNumber = cardNumber.substring(0, 16);

    if (cardNumber === '') {
        document.getElementById('number-error-message').textContent = 'Card number cannot be empty.';
    } else if (/^\d{16}$/.test(cardNumber)) {
        e.target.value = cardNumber;
        document.getElementById('number-error-message').textContent = '';
    } else {
        document.getElementById('number-error-message').textContent = 'Please Enter a valid 16-digit card number';
    }
});
document.getElementById('cvv').addEventListener('input', function (e) {
    // alert("Hello");
    let cvv = e.target.value.replace(/\D/g);
    cvv = cvv.substring(0, 3);

    if (cvv === '') {
        document.getElementById('cvv-error-message').textContent = 'CVV cannot be empty.';
    } else if (/^\d{3}$/.test(cvv)) {
        e.target.value = cvv;
        document.getElementById('cvv-error-message').textContent = '';
    } else {
        document.getElementById('cvv-error-message').textContent = 'Please Enter a valid 3-digit CVV';
    }
});

document.getElementById('expMonth').addEventListener('change', function (e) {
    let expMonth = e.target.value;
    if (expMonth === "") {
        document.getElementById('exp-error-message').textContent = 'Please select a valid month';
    } else {
        document.getElementById('exp-error-message').textContent = '';
    }
});

document.getElementById('expYear').addEventListener('change', function (e) {
    let expYear = e.target.value;
    if (expYear === "") {
        document.getElementById('exp-error-message').textContent = 'Please select a valid year';
    } else {
        document.getElementById('exp-error-message').textContent = '';
    }
});


function validateAndPay() {
    var creditCardX = document.getElementById("payCreditCard");
    if (creditCardX.checked) {
        numberF = cvvF = expF = true;

        let cardNumber = document.getElementById('cardNumber').value.replace(/\D/g);
        cardNumber = cardNumber.substring(0, 16);

        if (cardNumber === '') {
            document.getElementById('number-error-message').textContent = 'Card number cannot be empty.';
            numberF = false;
        } else if (!/^\d{16}$/.test(cardNumber)) {
            document.getElementById('number-error-message').textContent = 'Please Enter a valid 16-digit card number';
            numberF = false;
        } else {
            document.getElementById('number-error-message').textContent = '';
            numberF = true;
        }

        let cvv = document.getElementById('cvv').value.replace(/\D/g);
        cvv = cvv.substring(0, 3);

        if (cvv === '') {
            document.getElementById('cvv-error-message').textContent = 'CVV cannot be empty.';
            cvvF = false;
        } else if (!/^\d{3}$/.test(cvv)) {
            document.getElementById('cvv-error-message').textContent = 'Please Enter a valid 3-digit CVV';
            cvvF = false;

        } else {
            document.getElementById('cvv-error-message').textContent = '';
            cvvF = true;
        }

        let expMonth = document.getElementById('expMonth').value;
        let expYear = document.getElementById('expYear').value;
        if (expMonth === "" || expYear === "") {
            document.getElementById('exp-error-message').textContent = 'Please select a valid month and year';
            expF = false;
        } else {
            document.getElementById('exp-error-message').textContent = '';
            expF = true;
        }

        if(numberF == false || cvvF == false || expF == false){
            return false;
        }else{
            return;
        }
    }
}
