<?php
//Llamada al modelo
require_once("models/promotions_model.php");
require_once("models/products_model.php");

//clase que controla la inserción de promociones y llama a la vista para 
// añadir promociones
class promotion_controller {

  // Función que inserta promociones
  function insert_promotion() {
      $promotion = new promotions_model();
      $promotion->setProduct($_POST['product']);

      $promotion->setDiscountPercentage($_POST['discount']);
      $promotion->setEndDate($_POST['fechaFinal']);

      $promotion->insert_promotion();
  }

  // función que llama a la vista de añadir promociones
  public function promotionAdd_view(){

    $products = new products_model();
    $data = $products->get_all_products();

    require_once "views/templates/header_template.phtml";

    include("views/promotionAdd_view.phtml");
  }

}
?>
