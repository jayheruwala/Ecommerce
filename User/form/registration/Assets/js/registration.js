function printError(Id, Msg) {
    document.getElementById(Id).innerHTML = Msg;

}


var checkname = () => {
    const form = document.querySelector("form");
    const nfield = form.querySelector(".name");
    printError("nameErr", "");
    nfield.classList.remove("error");
    nfield.classList.remove("shake");
}

var checkemail = () => {
    const form = document.querySelector("form");
    const efiled = form.querySelector(".email");


    printError("emailErr", "");
    efiled.classList.remove("error");
    efiled.classList.remove("shake");
}

var checkmobile = () => {
    const form = document.querySelector("form");
    const mfiled = form.querySelector(".mobile");
    printError("mobileErr", "");
    mfiled.classList.remove("error");
    mfiled.classList.remove("shake");

}

var checkaddress = () => {

    const form = document.querySelector("form");
    const afiled = form.querySelector(".address");
    printError("addressErr", "");
    afiled.classList.remove("error");
    afiled.classList.remove("shake");
}

var checkcity = () => {

    const form = document.querySelector("form");
    const cfield = form.querySelector(".city");
    printError("cityErr", "");
    cfield.classList.remove("error");
    cfield.classList.remove("shake");
}

var checkpin_code = () => {

    const form = document.querySelector("form");
    const pfiled = form.querySelector(".pin_code");
    printError("pin_codeErr", "");
    pfiled.classList.remove("error");
    pfiled.classList.remove("shake");
}

var checkpassword = () => {

    const form = document.querySelector("form");
    const pfiled = form.querySelector(".password");
    printError("passwordErr", "");
    pfiled.classList.remove("error");
    pfiled.classList.remove("shake");
}

var checkcpassword = () => {

    const form = document.querySelector("form");
    const cpafiled = form.querySelector(".Cpassword");
    printError("cpasswordErr", "");
    cpafiled.classList.remove("error");
    cpafiled.classList.remove("shake");
}

function validateForm() {

    var name = document.Form.name.value;
    var email = document.Form.email.value;
    var mobile = document.Form.mobile.value;
    var address = document.Form.address.value;
    var city = document.Form.city.value;
    var pin_code = document.Form.pin_code.value;
    var password = document.Form.password.value;
    var cpassword = document.Form.cpassword.value;

    var nameErr = emailErr = mobileErr = addressErr = cityErr = pin_codeErr = passwordErr = cpasswordErr = true;

    const form = document.querySelector("form");
    const nfield = form.querySelector(".name");
    const efield = form.querySelector(".email");
    const mfield = form.querySelector(".mobile");
    const afield = form.querySelector(".address");
    const cfield = form.querySelector(".city");
    const pfield = form.querySelector(".pin_code");
    const pafield = form.querySelector(".password");
    const cpafield = form.querySelector(".Cpassword");


//namevalidation

if (name == "") {
    printError("nameErr", "Please enter your name");
    nfield.classList.add("shake");

} else {
    var regex = /^[a-zA-Z\s]+$/;
    if (regex.test(name) === false) {
        printError("nameErr", "Please enter a valid name");

    }
    else if (name.length < 1) {
        printError("nameErr", "minimum 5 charecter");

    }
    else {
        printError("nameErr", "");
        nameErr = false;

    }
}


//email validation
if (email == "") {
    printError("emailErr", "Please enter your email address");
    efield.classList.add("shake");
}
else {
    var regex =  /^[^]+@[^]+\.[a-z]{2,3}$/;
    if (email.match(regex) == false) {
        printError("emailErr", "Please enter a valid email address");

    } else {
        printError("emailErr", "");
        emailErr = false;
        
    }
}

//mobile number validation

if (mobile == "") {
    printError("mobileErr", "Please enter your address");
    mfield.classList.add("shake");

} else {
    var regex  = /^([0-9]{10})+$/;
    if(regex.test(mobile) === false){
    printError("mobileErr", "Please Enter valid 10 digit Mobile No.");
    }else{
        printError("mobileErr","");
        mobileErr = false;
    }

}
//address Validation


if(address == ""){
    printError("addressErr","Plese Enter Your Address");
    afield.classList.add("shake");

}else if(address.length <= 5){
    
    printError("addressErr","Address length must be grater then 5");

}else{
    printError("addressErr","");
    addressErr = false;
}

//city validation

if (city == "") {
    printError("cityErr", "Please enter your name");
    cfield.classList.add("shake");
} else {
    var regex = /^[a-zA-Z\s]+$/;
    if (regex.test(city) === false) {
        printError("cityErr", "Please enter a valid City");

    } else if (city.length < 4) {
        printError("cityErr", "minimum 4 charecter");

    } else if (city.length > 30) {
        printError("cityErr", "miximum 30 charecter");

    }
    else {
        printError("cityErr", "");
        cityErr = false;
    }
}

if (pin_code == "") {
    printError("pin_codeErr", "Please enter your city pin code");
    pfield.classList.add("shake");

} else if (pin_code.length == 6) {
    regex = /^(\d{6})/;
    if (regex.test(pin_code) === true) {

        printError("pin_codeErr", "");
        pin_codeErr = false;
    } else {
        printError("pin_codeErr", "Please enter a valid pin code");
    }

} else {
    printError("pin_codeErr", "The field must be 6 digit number");

}

if (password == "") {
    printError("passwordErr", "Please enter your password");
    pafield.classList.add("shake");
}
else {
    var regex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*]).{6,20}$/;
    if (regex.test(password) === false) {
        printError("passwordErr", "Please enter a valid password");

    } else if (password.length < 6) {
        printError("passwordErr", "minimum 6 charecter");
    } else if (password.length > 20) {
        printError("passwordErr", "maximum 20 charecter");
    }
    else {
        printError("passwordErr", "");
        passwordErr = false;
    }
}

if (cpassword == "") {
    printError("cpasswordErr", "Please enter your confirm password");
    cpafield.classList.add("shake");
} else if (cpassword != password) {
    printError("cpasswordErr", "password and confirm password must be same");

} else {
    printError("cpasswordErr", "");
    cpasswordErr = false;
}

if ((nameErr || emailErr || mobileErr || addressErr || cityErr || pin_codeErr || passwordErr || cpasswordErr) == true) {
    return false;
}
}