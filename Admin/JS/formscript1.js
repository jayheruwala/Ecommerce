function showForm(){
    var selectedForm = document.getElementById("formSelector").value;

    //Hide all forms
    var froms = document.querySelectorAll(".form_container");
    froms.forEach(function(form){
        form.style.display = 'none';
    });

    document.getElementById(selectedForm).style.display = "block";

}


function printError(Id,msg) {
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
    var image = document.getElementById('mimage');
    mbrandErr = mNameErr = mquantityErr= mimageErr = mprocessorErr = mbackCameraErr = mfrontCameraErr = mbatteryErr = mdisplayErr = mramErr = mromErr = mpriceErr = mdiscountPriceErr = false;
    var pattern=/^[0-9]+$/;
    var file = image.files[0];
    if (!file) {
        printError("mimageErr","plese select image");
    }else if (!file.type.startsWith('image/')) {
        printError("mimageErr","Plese select df image");
        
    }else{
        printError("mimageErr","");
        mimageErr=true;
    }


    if(brandName == ""){
        printError("mbrandErr","Brand Name not be empty");
        
    }else{
        printError("mbrandErr","");
        mbrandErr=true;
    }
    if(Name == ""){
        printError("mNameErr","Brand Name not be empty");
        
    }else{
        printError("mNameErr","");
        mNameErr=true;
    }
    if(quantity == ""){
        printError("mquantityErr","Brand Name not be empty");
        
    }else if(!quantity.match(pattern)){
        printError("mquantityErr","Plese Enter only Numbers");
    }
    else{
        printError("mquantityErr","");
        mquantityErr=true;
    }
    if(processor == ""){
        printError("mprocessorErr","Brand Name not be empty");
        
    }else{
        printError("mprocessorErr","");
        mprocessorErr=true;
    }
  
    if(backCamera == ""){
        printError("mbackCameraErr","Brand Name not be empty");
        
    }else{
        printError("mbackCameraErr","");
        mbackCameraErr=true;
    }
    if(frontCamera == ""){
        printError("mfrontCameraErr","Brand Name not be empty");
        
    }else{
        printError("mfrontCameraErr","");
        mfrontCameraErr=true;
    }
  
    if(battery == ""){
        printError("mbatteryErr","Brand Name not be empty");
        
    }else{
        printError("mbatteryErr","");
        mbatteryErr=true;
    }
    if(display == ""){
        printError("mdisplayErr","Brand Name not be empty");
        
    }else{
        printError("mdisplayErr","");
        mdisplayErr=true;
    }
    if(ram == ""){
        printError("mramErr","Brand Name not be empty");
        
    }else{
        printError("mramErr","");
        mramErr=true;
    }
    if(rom == ""){
        printError("mromErr","Brand Name not be empty");
        
    }else{
        printError("mromErr","");
        mromErr=true;
    }
    
    if(price == ""){
        printError("mpriceErr","Brand Name not be empty");
        
    }else if(!price.match(pattern)){
        printError("mpriceErr","Plese Enter only Numbers");
    }
    else{
        printError("mpriceErr","");
        mpriceErr=true;
    }
    if(discountPrice == ""){
        printError("mdiscountPriceErr","Brand Name not be empty");
        
    }else if(!discountPrice.match(pattern)){
        printError("mdiscountPriceErr","Plese Enter only Numbers");
    }
    else{
        printError("mdiscountPriceErr","");
        mdiscountPriceErr=true;
    }
   



    if((mbrandErr && mNameErr && mimageErr && mquantityErr && mprocessorErr && mbackCameraErr && mfrontCameraErr && mbatteryErr && mdisplayErr && mramErr && mromErr && mpriceErr && mdiscountPriceErr)  == true){
        

        return true;
    }
    else{
        
        return false;
    }
}


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
    var image = document.getElementById('limage');
    lbrandErr = lNameErr = limageErr = lquantityErr = lprocessorErr = lgraphicsCardErr = frontCameraErr = lbatteryErr = ldisplayErr = lramErr = lromErr = lpriceErr = ldiscountPriceErr = false;
    var pattern=/^[0-9]+$/;
    var file = image.files[0];
    if (!file) {
        printError("limageErr","plese select image");
    }else if (!file.type.startsWith('image/')) {
        printError("limageErr","Plese select df image");
        
    }else{
        printError("limageErr","");
        limageErr=true;
    }
    if(brandName == ""){
        printError("lbrandErr","Brand Name not be empty");
        
    }else{
        printError("lbrandErr","");
        lbrandErr=true;
    }
    if(Name == ""){
        printError("lNameErr","Brand Name not be empty");
        
    }else{
        printError("lNameErr","");
        lNameErr=true;
    }
    if(quantity == ""){
        printError("lquantityErr","Brand Name not be empty");
        
    }else if(!quantity.match(pattern)){
        printError("lquantityErr","Plese Enter only Numbers");
    }
    else{
        printError("lquantityErr","");
        lquantityErr=true;
    }
    if(processor == ""){
        printError("lprocessorErr","Brand Name not be empty");
        
    }else{
        printError("lprocessorErr","");
        lprocessorErr=true;
    }
  
    if(graphicsCard == ""){
        printError("lgraphicsCardErr","Brand Name not be empty");
        
    }else{
        printError("lgraphicsCardErr","");
        lgraphicsCardErr=true;
    }

    if(frontCamera == ""){
        printError("lfrontCameraErr","Brand Name not be empty");
        
    }else{
        printError("lfrontCameraErr","");
        lfrontCameraErr=true;
    }
  
    if(battery == ""){
        printError("lbatteryErr","Brand Name not be empty");
        
    }else{
        printError("lbatteryErr","");
        lbatteryErr=true;
    }
    if(display == ""){
        printError("ldisplayErr","Brand Name not be empty");
        
    }else{
        printError("ldisplayErr","");
        ldisplayErr=true;
    }

    if(ram == ""){
        printError("lramErr","Brand Name not be empty");
        
    }else{
        printError("lramErr","");
        lramErr=true;
    }
    if(rom == ""){
        printError("lromErr","Brand Name not be empty");
        
    }else{
        printError("lromErr","");
        lromErr=true;
    }
    
    if(price == ""){
        printError("lpriceErr","Brand Name not be empty");
        
    }else if(!price.match(pattern)){
        printError("lpriceErr","Plese Enter only Numbers");
    }
    else{
        printError("lpriceErr","");
        lpriceErr=true;
    }
    if(discountPrice == ""){
        printError("ldiscountPriceErr","Brand Name not be empty");
        
    }else if(!discountPrice.match(pattern)){
        printError("ldiscountPriceErr","Plese Enter only Numbers");
    }
    else{
        printError("ldiscountPriceErr","");
        ldiscountPriceErr=true;
    }
  



    if((lbrandErr && lNameErr && limageErr && lquantityErr && lprocessorErr && lgraphicsCardErr && lfrontCameraErr && lbatteryErr && ldisplayErr && lramErr && lromErr && lpriceErr && ldiscountPriceErr)  == true){
        

        return true;
    }
    else{
        
        return false;
    }
}



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
    var image = document.getElementById('cimage');
   
     cbrandErr = cNameErr = cquantityErr = cprocessorErr = cgraphicsCardErr = cramErr = cromErr = cpriceErr = cdiscountPriceErr = false;
   
    
     var pattern=/^[0-9]+$/;
 
     var file = image.files[0];
     if (!file) {
         printError("cimageErr","plese select image");
     }else if (!file.type.startsWith('image/')) {
         printError("cimageErr","Plese select df image");
         
     }else{
         printError("cimageErr","");
         cimageErr=true;
     }
    if(brandName == ""){
        printError("cbrandErr","Brand Name not be empty");
        
    }else{
        printError("cbrandErr","");
        cbrandErr=true;
    }
    if(Name == ""){
        printError("cNameErr","Brand Name not be empty");
        
    }else{
        printError("cNameErr","");
        cNameErr=true;
    }
    if(quantity == ""){
        printError("cquantityErr","Brand Name not be empty");
        
    }else if(!quantity.match(pattern)){
        printError("cquantityErr","Plese Enter only Numbers");
    }
    else{
        printError("cquantityErr","");
        cquantityErr=true;
    }
    if(processor == ""){
        printError("cprocessorErr","Brand Name not be empty");
        
    }else{
        printError("cprocessorErr","");
        cprocessorErr=true;
    }
  
    if(graphicsCard == ""){
        printError("cgraphicsCardErr","Brand Name not be empty");
        
    }else{
        printError("cgraphicsCardErr","");
        cgraphicsCardErr=true;
    }


    if(ram == ""){
        printError("cramErr","Brand Name not be empty");
        
    }else{
        printError("cramErr","");
        cramErr=true;
    }
    if(rom == ""){
        printError("cromErr","Brand Name not be empty");
        
    }else{
        printError("cromErr","");
        cromErr=true;
    }
    
    if(price == ""){
        printError("cpriceErr","Brand Name not be empty");
        
    }else if(!price.match(pattern)){
        printError("cpriceErr","Plese Enter only Numbers");
    }
    else{
        printError("cpriceErr","");
        cpriceErr=true;
    }
    if(discountPrice == ""){
        printError("cdiscountPriceErr","Brand Name not be empty");
        
    }else if(!discountPrice.match(pattern)){
        printError("cdiscountPriceErr","Plese Enter only Numbers");
    }
    else{
        printError("cdiscountPriceErr","");
        cdiscountPriceErr=true;
    }
  



    if((cbrandErr && cNameErr && cimageErr && cquantityErr && cprocessorErr && cgraphicsCardErr && cramErr && cromErr && cpriceErr && cdiscountPriceErr)  == true){
        

        return true;
    }
    else{
        
        return false;
    }
}



function validateAccessories(){
    const brandName=document.getElementById("abrandName").value;
    const Name=document.getElementById("aName").value;
    const quantity=document.getElementById("aquantity").value;
    const battery=document.getElementById("abattery").value;
    const playBack=document.getElementById("aplayBack").value;
    const type=document.getElementById("atype").value;
    const price=document.getElementById("aprice").value;
    const discountPrice=document.getElementById("adiscountPrice").value;
    var image = document.getElementById('aimage');
   
    abrandErr = aNameErr = atypeErr = aquantityErr = abatteryErr = aplayBackErr =  apriceErr = adiscountPriceErr = false;
   
    var pattern=/^[0-9]+$/;

    var file = image.files[0];
    if (!file) {
        printError("aimageErr","plese select image");
    }else if (!file.type.startsWith('image/')) {
        printError("aimageErr","Plese select df image");
        
    }else{
        printError("aimageErr","");
        aimageErr=true;
    }

    if(brandName == ""){
        printError("abrandErr","Brand Name not be empty");
        
    }else{
        printError("abrandErr","");
        abrandErr=true;
    }
    if(Name == ""){
        printError("aNameErr","Brand Name not be empty");
        
    }else{
        printError("aNameErr","");
        aNameErr=true;
    }
    if(type == ""){
        printError("atypeErr","Brand Name not be empty");
        
    }else{
        printError("atypeErr","");
        atypeErr=true;
    }
    if(quantity == ""){
        printError("aquantityErr","Brand Name not be empty");
        
    }else if(!quantity.match(pattern)){
        printError("aquantityErr","Plese Enter only Numbers");
    }
    else{
        printError("aquantityErr","");
        aquantityErr=true;
    }
  
    if(battery == ""){
        printError("abatteryErr","Brand Name not be empty");
        
    }else{
        printError("abatteryErr","");
        abatteryErr=true;
    }
    if(playBack == ""){
        printError("aplayBackErr","Brand Name not be empty");
        
    }else{
        printError("aplayBackErr","");
        aplayBackErr=true;
    }
   
    if(price == ""){
        printError("apriceErr","Brand Name not be empty");
        
    }else if(!price.match(pattern)){
        printError("apriceErr","Plese Enter only Numbers");
    }
    else{
        printError("apriceErr","");
        apriceErr=true;
    }
 
 
    if(discountPrice == ""){
        printError("adiscountPriceErr","Brand Name not be empty");
        
    }else if(!discountPrice.match(pattern)){
        printError("adiscountPriceErr","Plese Enter only Numbers");
    }
    else{
        printError("adiscountPriceErr","");
        adiscountPriceErr=true;
    }
  



    if((abrandErr && aNameErr && atypeErr && a1imageErr && aquantityErr && abatteryErr && aplayBackErr && apriceErr && adiscountPriceErr)  == true){
        

        return true;
    }
    else{
        
        return false;
    }
}



function validateAccessories1(){
 
    const brandName=document.getElementById("a1brandName").value;
    const Name=document.getElementById("a1Name").value;
    const type=document.getElementById("a1type").value;
    const quantity=document.getElementById("a1quantity").value;   
    const price=document.getElementById("a1price").value;
    const discountPrice=document.getElementById("a1discountPrice").value;
    var image = document.getElementById('a1image');
   
    a1randErr = a1NameErr = a1typeErr = a1imageErr = a1quantityErr = a1priceErr = a1discountPriceErr = false;
    var pattern=/^[0-9]+$/;

    var file = image.files[0];
    if (!file) {
        printError("a1imageErr","plese select image");
    }else if (!file.type.startsWith('image/')) {
        printError("a1imageErr","Plese select df image");
        
    }else{
        printError("a1imageErr","");
        a1imageErr=true;
    }
    if(brandName == ""){
        printError("a1brandErr","Brand Name not be empty");
        
    }else{
        printError("a1brandErr","");
        a1brandErr=true;
    }
    if(Name == ""){
        printError("a1NameErr","Brand Name not be empty");
        
    }else{
        printError("a1NameErr","");
        a1NameErr=true;
    }
    if(type == ""){
        printError("a1typeErr","Brand Name not be empty");
        
    }else{
        printError("a1typeErr","ihi");
        a1typeErr=true;
    }
    if(quantity == ""){
        printError("a1quantityErr","Brand Name not be empty");
        
    }else if(!quantity.match(pattern)){
        printError("a1quantityErr","Plese Enter only Numbers");
    }
    else{
        printError("a1quantityErr","");
        a1quantityErr=true;
    }
  
   
    if(price == ""){
        printError("a1priceErr","Brand Name not be empty");
        
    }else if(!price.match(pattern)){
        printError("a1priceErr","Plese Enter only Numbers");
    }
    else{
        printError("a1priceErr","");
        a1priceErr=true;
    }
 
 
    if(discountPrice == ""){
        printError("a1discountPriceErr","Brand Name not be empty");
        
    }else if(!discountPrice.match(pattern)){
        printError("a1discountPriceErr","Plese Enter only Numbers");
    }
    else{
        printError("a1discountPriceErr","");
        a1discountPriceErr=true;
    }
  



    if((a1brandErr && a1NameErr && a1imageErr && a1typeErr && a1quantityErr && a1priceErr && a1discountPriceErr)  == true){
        return true;
    }
    else{
        
        return false;
    }
}