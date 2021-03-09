const initCart = () => {
  $(document).ready(function() {
    $('.add-to-cart-form').on("submit", function(event) {
      $form = $(this); //wrap this in jQuery
      var qty = $form.serialize();
      if (qty != 'qty=') {
        $.get($form.attr('action')+'&'+qty, {},
          function (data, textStatus, jqXHR) {
            alert(data.msg);
          },
          "json"
        );
        document.location.reload();
      } else {
        alert('Erreur : Quantité invalide !');
      }
      return false;
    });
  });
}
