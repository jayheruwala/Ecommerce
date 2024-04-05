function showForm(){
    var selectedForm=document.getElementById("formSelector").value;
    //hide all form
    var forms=document.querySelectorAll(".form_container");
    forms.forEach(function(form){
        form.style.display='none';
    });
    document.getElementById(selectedForm).style.display="block";
    
}

function printError(Id,msg){
    document.getElementById(Id).innerHTML=msg;
}
function validateMobile(){
    const brandName=document.getElementById("mbrandName").value;
    const Name=document.getElementById("mName").value;
    const quantity=document.getElementById("mquantity").value;
    const processor=document.getElementById("mprocessor").value;
    const backCamera=document.getElementById("mbackCamera").value;
    const frontCamera=document.getElementById("mfrontCamera").value;
    const battery=document.getElementById("mbattery").value;
    const display=document.getElementById("mdisplay").value;
    const ram=document.getElementById("mram").value;
    const rom=document.getElementById("mrom").value;
    const price=document.getElementById("mprice").value;
    const discountPrice=document.getElementById("mdiscountPrice").value;
    var image=document.getElementById('mimage');
    
    mbrandErr = mNameErr = mquantityErr = mprocessorErr = mbackCameraErr = mforntCameraErr = mbatteryErr = mdisplayErr = mramErr = mromErr = mpriceErr = mdiscountPriceErr = false;
    var pattern=/^[0-9]+$/;
    var file=image.files[0];
    if(!file){
        printError("mimageErr","plese select image");
    }else if(!file.type.startsWith('image/')){
        printError("mimageErr","select file is not image");
        
    }else{
        printError("mimageErr","");
        mimageErr=true;
    }
    if(brandName == ""){
        printError("mbrandErr","Brand name not be empty");
    }
    else{
        printError("mbrandErr","");
        mbrandErr=true; 
    }
    
    if(Name ==""){
        printError("mNameErr","Name not be empty");
    }else{
        printError("mNameErr","");
        mNameErr=true;
    }
    
    if(quantity == ""){
        printError("mquantityErr","quantity not be empty");
    }else if(!quantity.matches(pattern)){
        printError("mquantityErr","plese enter only number");
    }else{
        printError("mquantityErr","");
        mquantityErr=true;
    }
    
    
    if(processor ==""){
    printError("mprocessorErr","Processor not be empty");
}else{
    printError("mprocessorErr","");
    mprocessorErr=true;
}
if(backCamera == ""){
    printError("mbackCameraErr","backcamera not be empty"); 
}else{
    printError("mbackCameraErr","");
    mbackCameraErr = true;
    }


if(frontCamera == ""){
    printError("mfrontCameraErr","frontCamera not be empty");
}else{
    printError("mfrontCameraErr","");
mfrontCameraErr=true;
}

if(battery == ""){
    printError("mbatteryErr","battery not be empty");
}else{
    printError("mbatteryErr","");
mbatteryErr=true;
}

if(display == ""){
    printError("mdisplayErr","Display not be empty");
    
}else
{
    printError("mdisplayErr","");
    mdisplayErr=true;
}

if(ram == ""){
    printError("mramErr"," ram not be empty");
    
}else{
    printError("mramErr","");
mramErr=true;

}

if(rom == ""){
    printError("mromErr","plese enter storage in Gb");

}else{
    printError("mromErr","");

    mromErr=true;
}
if(price == ""){
    printError("mpriceErr","enter product market price")

}else{
    printError("mpriceErr","")
    mpriceErr=true;
}


if(discountPrice == ""){
    printError("mdiscountPriceErr","enter product selling price")

}else{
    printError("mdiscountPriceErr","")
    mdiscountPriceErr=true;
}
if(( mbrandErr && mNameErr && mquantityErr && mprocessorErr && mbackCameraErr && mfrontCameraErr && mbatteryErr && mdisplayErr && mramErr && mromErr && mpriceErr && mdiscountPriceErr) == true){
   
return true;
}else{
    

    return false;
}

}


//validate laptop


function validateLaptop(){
    const brandName=document.getElementById("lbrandName").value;
    const Name=document.getElementById("lName").value;
    const quantity=document.getElementById("lquantity").value;
    const processor=document.getElementById("lprocessor").value;
    const graphicsCard=document.getElementById("lgraphicsCard").value;
    const frontCamera=document.getElementById("lfrontCamera").value;
    const battery=document.getElementById("lbattery").value;
    const display=document.getElementById("ldisplay").value;
    const ram=document.getElementById("lram").value;
    const rom=document.getElementById("lrom").value;
    const price=document.getElementById("lprice").value;
    const discountPrice=document.getElementById("ldiscountPrice").value;
    var image=document.getElementById('limage');
    
    lbrandErr = lNameErr = lquantityErr = limageErr = lprocessorErr = lgraphicsCardErr = lfrontCameraErr = lbatteryErr = ldisplayErr = lramErr = lromErr = lpriceErr = ldiscountPriceErr = false;
 
    var pattern=/^[0-9]+$/;
    var file=image.files[0];
    if(!file){
        printError("limageErr","plese select image");
    }else if(!file.type.startsWith('image/')){
        printError("limageErr","select file is not image");

    }else{
        printError("limageErr","");
    limageErr=true;
    }
if(brandName == ""){
    printError("lbrandErr","Brand name not be empty");
}
else{
    printError("lbrandErr","");
    lbrandErr=true; 
}

if(Name ==""){
    printError("lNameErr","Name not be empty");
}else{
    printError("lNameErr","");
    lNameErr=true;
}

if(quantity == ""){
    printError("lquantityErr","quantity not be empty");
}else if(!quantity.matches(pattern)){
    printError("lquantityErr","plese enter only number");
}else{
    printError("lquantityErr","");
    lquantityErr=true;
}


if(processor ==""){
    printError("lprocessorErr","Processor not be empty");
}else{
    printError("lprocessorErr","");
    lprocessorErr=true;
}
if(graphicsCard == ""){
    printError("lgraphicsCardErr","backcamera not be empty"); 
}else{
    printError("lgraphicsCardErr","");
    lgraphicsCardErr = true;
    }
if(frontCamera == ""){
    printError("lfrontCameraErr","frontCamera not be empty");
}else{
    printError("lfrontCameraErr","");
lfrontCameraErr=true;
}

if(battery == ""){
    printError("lbatteryErr","battery not be empty");
}else{
    printError("lbatteryErr","");
lbatteryErr=true;
}

if(display == ""){
    printError("ldisplayErr","Display not be empty");
    
}else
{
    printError("ldisplayErr","");
    ldisplayErr=true;
}

if(ram == ""){
    printError("lramErr"," ram not be empty");
    
}else{
    printError("lramErr","");
lramErr=true;

}

if(rom == ""){
    printError("lromErr","plese enter storage in Gb");

}else{
    printError("lromErr","");

    lromErr=true;
}

if(price == ""){
    printError("lpriceErr","enter product market price")

}else{
    printError("lpriceErr","")
    lpriceErr=true;
}


if(discountPrice == ""){
    printError("ldiscountPriceErr","enter product selling price")

}else{
    printError("ldiscountPriceErr","")
    ldiscountPriceErr=true;
}

if(( lbrandErr && lNameErr && lquantityErr && limageErr && lprocessorErr && lgraphicsCardErr && lfrontCameraErr && lbatteryErr && ldisplayErr && mramErr && lromErr && lpriceErr && ldiscountPriceErr) == true){
    return true;
}else{
    return false;
}

}





function validateAccessories(){
   
    const brandName=document.getElementById("abrandName").value;
    const Name=document.getElementById("aName").value;
    const type=document.getElementById("atype").value;
    const quantity=document.getElementById("aquantity").value;
    const battery=document.getElementById("abattery").value;
    const playBack=document.getElementById("aplayBack").value;
    const price=document.getElementById("aprice").value;
    const discountPrice=document.getElementById("adiscountPrice").value;
    var image=document.getElementById('aimage');
     
    abrandErr = aNameErr = atypeErr = aquantityErr = aimageErr = abatteryErr = aplayBackErr = apriceErr = adiscountPriceErr = false;
    var pattern=/^[0-9]+$/;
    var file=image.files[0];
    if(!file){
        printError("aimageErr","plese select image");
    }else if(!file.type.startsWith('image/')){
        printError("aimageErr","select file is not image");

    }else{
        printError("aimageErr","");
    aimageErr=true;
    }
if(brandName == ""){
    printError("abrandErr","Brand name not be empty");
}
else{
    printError("abrandErr","");
    abrandErr=true; 
}

if(Name ==""){
    printError("aNameErr","Name not be empty");
}else{
    printError("aNameErr","");
    aNameErr=true;
}
if(type ==""){
    printError("atypeErr","product type not be empty");
}else{
    printError("atypeErr","");
    atypeErr=true;
}


if(quantity == ""){
    printError("aquantityErr","quantity not be empty");
}else if(!quantity.matches(pattern)){
    printError("aquantityErr","plese enter only number");
}else{
    printError("aquantityErr","");
    aquantityErr=true;
}


if(battery == ""){
    printError("abatteryErr","battery not be empty");
}else{
    printError("abatteryErr","");
abatteryErr=true;
}

if(playBack == ""){
    printError("aplayBackErr","Playback time not be empty");
}else{
    printError("aplayBackErr","");
    aplayBackErr=true;
}


if(price == ""){
    printError("apriceErr","enter product market price")

}else{
    printError("apriceErr","")
    apriceErr=true;
}


if(discountPrice == ""){
    printError("adiscountPriceErr","enter product selling price")

}else{
    printError("adiscountPriceErr","")
    adiscountPriceErr=true;
}

if(( abrandErr && aNameErr && aquantityErr && aimageErr && abatteryErr && aplayBackErr  && apriceErr && adiscountPriceErr) == true){
return true;
}else{
    return false;
}

}

// validateAccessories



function validateAccessories1(){
    const brandName=document.getElementById("a1brandName").value;
    const Name=document.getElementById("a1Name").value;
    const quantity=document.getElementById("a1quantity").value;
    const type=document.getElementById("a1type").value;
    const price=document.getElementById("a1price").value;
    const discountPrice=document.getElementById("a1discountPrice").value;
    var image=document.getElementById('a1image');
     
    a1brandErr = a1NameErr = a1typeErr = a1quantityErr = a1imageErr = a1priceErr = a1discountPriceErr = false;
    var pattern=/^[0-9]+$/;
    var file=image.files[0];
    if(!file){
        printError("a1imageErr","plese select image");
    }else if(!file.type.startsWith('image/')){
        printError("a1imageErr","select file is not image");

    }else{
        printError("a1imageErr","");
    a1imageErr=true;
    }
    
if(brandName == ""){
    printError("a1brandErr","Brand name not be empty");
}
else{
    printError("a1brandErr","");
    a1brandErr=true; 
}

if(Name ==""){
    printError("a1NameErr","Name not be empty");
}else{
    printError("a1NameErr","");
    a1NameErr=true;
}
if(type ==""){
    printError("a1typeErr","product type not be empty");
}else{
    printError("a1typeErr","");
    a1typeErr=true;
}


if(quantity == ""){
    printError("a1quantityErr","quantity not be empty");
}else if(!quantity.matches(pattern)){
    printError("a1quantityErr","plese enter only number");
}else{
    printError("a1quantityErr","");
    a1quantityErr=true;
}


if(price == ""){
    printError("a1priceErr","enter product market price")

}else{
    printError("a1priceErr","")
    a1priceErr=true;
}


if(discountPrice == ""){
    printError("a1discountPriceErr","enter product selling price")

}else{
    printError("a1discountPriceErr","")
    a1discountPriceErr=true;
}

if(( a1brandErr && a1NameErr && a1quantityErr && a1imageErr && a1priceErr && a1discountPriceErr) == true){
return true;
}else{
    return false;
}

}

//cpu





function validateCpu(){
    const brandName=document.getElementById("cbrandName").value;
    const Name=document.getElementById("cName").value;
    const quantity=document.getElementById("cquantity").value;
    const processor=document.getElementById("cprocessor").value;
    const graphicsCard=document.getElementById("cgraphicsCard").value;
    
    const ram=document.getElementById("cram").value;
    const rom=document.getElementById("crom").value;
    const price=document.getElementById("cprice").value;
    const discountPrice=document.getElementById("cdiscountPrice").value;
    var image=document.getElementById('cimage');
     
    cbrandErr = cNameErr = cquantityErr = cimageErr = cprocessorErr = cgraphicsCardErr = cdiaplayErr = cramErr = cromErr = cpriceErr = cdiscountPriceErr = false;
    var pattern=/^[0-9]+$/;
    var file=image.files[0];
    if(!file){
        printError("cimageErr","plese select image");
    }else if(!file.type.startsWith('image/')){
        printError("cimageErr","select file is not image");

    }else{
        printError("cimageErr","");
    cimageErr=true;
    }
if(brandName == ""){
    printError("cbrandErr","Brand name not be empty");
}
else{
    printError("cbrandErr","");
    cbrandErr=true; 
}

if(Name ==""){
    printError("cNameErr","Name not be empty");
}else{
    printError("cNameErr","");
    cNameErr=true;
}

if(quantity == ""){
    printError("cquantityErr","quantity not be empty");
}else if(!quantity.matches(pattern)){
    printError("cquantityErr","plese enter only number");
}else{
    printError("cquantityErr","");
    cquantityErr=true;
}


if(processor ==""){
    printError("cprocessorErr","Processor not be empty");
}else{
    printError("cprocessorErr","");
    cprocessorErr=true;
}
if(graphicsCard == ""){
    printError("cgraphicsCardErr","backcamera not be empty"); 
}else{
    printError("cgraphicsCardErr","");
    cgraphicsCardErr = true;
    }



if(ram == ""){
    printError("cramErr"," ram not be empty");
    
}else{
    printError("cramErr","");
cramErr=true;

}

if(rom == ""){
    printError("cromErr","plese enter storage in Gb");

}else{
    printError("cromErr","");

    cromErr=true;
}

if(price == ""){
    printError("cpriceErr","enter product market price")

}else{
    printError("cpriceErr","")
    cpriceErr=true;
}


if(discountPrice == ""){
    printError("cdiscountPriceErr","enter product selling price")

}else{
    printError("cdiscountPriceErr","")
    cdiscountPriceErr=true;
}

if(( cbrandErr && cNameErr && cquantityErr && cimageErr && cprocessorErr && cgraphicsCardErr && cdiaplayErr && cramErr && cromErr && cpriceErr && cdiscountPriceErr) == true){
return true;
}else{
    return false;
}

}
