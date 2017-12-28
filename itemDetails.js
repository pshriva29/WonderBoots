/* anonymous function to get the id*/
var $ = function (id) {
    return document.getElementById(id);
}
/* added to add object on local storage
var shoppingBag = {
    size: null
}
*/

function validateBag() {
    var sizeSelected = document.getElementById('sizeSelected').value;
  //added to check object on local storage  
  //shoppingBag.size = sizeSelected;
 //   console.log('printing size', sizeSelected);

    if (sizeSelected == "select") {
    $("message").innerHTML = "Please select size";
        
    }
    else {
    //    localStorage.setItem('bagQuantity', JSON.stringify(shoppingBag));
        $("addToBag").action = "myBag.html";
        document.getElementById("addToBag").submit();
    }
}
