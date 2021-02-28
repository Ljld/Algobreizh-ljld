const initCart = () => {
  let addBtnElts = document.getElementsByClassName('add-button');
  let productRows = document.getElementsByClassName('product-row');
  var cart = {
    total_price: 0,
    lines: [],
    addLine: function(ref, productPrice, quantity) {
      var line = {
        ref: ref,
        productPrice: productPrice,
        quantity: quantity,
        result: productPrice * quantity
      }
      this.lines.push(line);
    }
  };

  addBtnElts.forEach((addBtn, i) => {
    
    addBtn.addEventListener("click", cart.addLine());
  });

  //formElt.addEventListener("keyup", checkForm);
}
