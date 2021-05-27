function validate_item(){
  var item = document.getElementById('item').value;
  if (item == "") { 
    document.getElementById('msn_item').innerHTML = "L'item està incomplet";
    return false;
  }else{
    document.getElementById('msn_item').innerHTML = "";
    return true;
  }
}

function validate_stock(){
  var stock = document.getElementById('stock').value;
  if (stock == "") {
    document.getElementById('msn_stock').innerHTML = "l'stock està incomplet";
    return false;
  }else{
    document.getElementById('msn_stock').innerHTML = "";
    return true;
  }
}

//valido que les dues funciones son TRUE
function validate_producto(){
  if(validate_item() && validate_stock()){
    return true;
  }else{
    return false;
  }
}
