function subQty(){
    var qtyInput = document.getElementById("qty");
    var qtyValue = parseInt(qtyInput.value);
    if (qtyValue > 1) {
        qtyValue = qtyValue - 1;
    }
    else {qtyValue = 1;}
    
    qtyInput.value = qtyValue;

}



function addQty(){
    var qtyInput = document.getElementById("qty");
    var qtyValue = parseInt(qtyInput.value);
    if (qtyValue < 999) {
        qtyValue = qtyValue + 1;
    }
    else {qtyValue = 999;}
    
    qtyInput.value = qtyValue;

}

function checkQtyValue() {
    var qtyInput = document.getElementById("qty");
    var qtyValue = parseInt(qtyInput.value);
  
    if (isNaN(qtyValue) || qtyValue === 0 || qtyInput.value.trim() === "") {
      qtyInput.value = 1;
    }
    if (qtyValue > 999) {
        qtyInput.value = 999;
  }
  qtyInput.value = qtyValue.toString();
}

function ValidateInput(event) {
    var qtyInput = document.getElementById("qty");
    var keyCode = event.keyCode || event.which;
    var char = String.fromCharCode(keyCode);
  
    // Kiểm tra nếu kí tự không phải là số
    if (!isNumeric(char)) {
      event.preventDefault();
    }
  }

  function isNumeric(char) {
    return /^\d+$/.test(char);
  }