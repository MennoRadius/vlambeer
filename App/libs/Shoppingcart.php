<?php

Class Shoppingcart
{
	private $cart_id;

	public function __construct($db)
	{
		$this->db = $db;

		if (isset($_SESSION['id'])) 
		{
			$this->cart_id = $_SESSION['id'];
			
			if(isset($_SESSION['cid']))
			{
				$this->cid = $_SESSION['cid'];
			}
			else
			{
			 	$this->cid = uniqid(10);
			}
		}
	}

	public function addToCart($product_id, $name, $item_price)
	{
		if ($this->db->query("SELECT customer_id FROM customers WHERE customer_id = :cid")) 
		{
			# code...
		}
	}

	public function removeFromCart($product_id)
	{

	}

	public function changeQuantity($quantity)
	{

	}


	/*Method to get all the items in the shoppingcart*/
	public function getStock()
	{
		$query = $db->query("SELECT product_id, name, stock FROM tbl_products WHERE product_id = '$id'");

		if($stock->name == 0)
		{
			echo "product is out of stock ";
		}

		if ($stock->name <= 3) 
		{
			echo "Er zijn nog maar minder dan 3 producten beschikbaar";
		}

		if ($stock->name >= 5) 
		{
			echo "Er zijn op dit moment nog 5 of meer producten aanwezig";
		}
	}

	public function updateStock($id, $quantity)
	{
		$currentStock = $db->query("SELECT product_id, stock FROM tbl_products WHERE product_id = $id");
		$updateStock = $currentStock - $quantity;

		if ($quantity > $stock)
		{		
			echo "De voorraad is bijgewerkt.";
		}
	}

	

		//als betaling voltooid is:
		//1. check alle items op id welke er in winkelmandje zaten.
		//2. check hoeveel items er in winkelmandje zaten
		//3. update de item stock
}?>