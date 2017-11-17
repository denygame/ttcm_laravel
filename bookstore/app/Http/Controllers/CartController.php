<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Book;
use App\Category;

class CartController extends Controller
{
	public function add()
	{
		if(isset($_GET['id'])){
			$id = $_GET['id'];

			$book = Book::where('id',$id)->firstOrFail();
			Cart::add(['id' => $book->id, 
				'name' => $book->name, 
				'qty' => 1, 
				'price' => $book->price * (1 - $book->discount/100), 
				'options' => ['discount'=>$book->discount,
					   				 'r_price'=>$book->price, //gía k giảm
					   				 'img' => $book->image_before]
					   				]);

			echo json_encode(
				array("count" => $this->getCount(), 
					"html" => $this->getMiniCartHtml())
			);
		}
	}

	public function addMany(){
		if(isset($_GET['id']) && isset($_GET['qty']) ){
			$id = $_GET['id'];
			$qty = $_GET['qty'];

			$book = Book::where('id',$id)->firstOrFail();
			Cart::add(['id' => $book->id, 
				'name' => $book->name, 
				'qty' => $qty, 
				'price' => $book->price * (1 - $book->discount/100), 
				'options' => ['discount'=>$book->discount,
					   				 'r_price'=>$book->price, //gía k giảm
					   				 'img' => $book->image_before]
					   				]);
			echo route("cart");
		}
	}

	public function update()
	{
		if(isset($_GET['rowId']) && isset($_GET['qty'])){
			$rowId = $_GET['rowId'];
			$qty = $_GET['qty'];
			Cart::update($rowId,$qty);
			$item = Cart::get($rowId);
			
			$priceChange = number_format($item->price * $item->qty).'đ';

			echo json_encode(
				array("price" => $priceChange, 
					"htmlTotalPay" => $this->getTotalPayHtml(),
					"htmlMiniCart" => $this->getMiniCartHtml(),
					"count" => $this->getCount())
			);
		}
	}

	public function remove()
	{
		if(isset($_GET['rowId']))
		{
			$rowId = $_GET['rowId'];
			Cart::remove($rowId);

			echo json_encode(
				array("count" => $this->getCount(), 
					"htmlTotalPay" => $this->getTotalPayHtml(),
					"htmlMiniCart" => $this->getMiniCartHtml(),
					"count" => $this->getCount())
			);
		}
	}


	public function getContent()
	{
		return Cart::content();
	}

	public function getTotal()
	{
		return Cart::subtotal();
	}

	public function destroy()
	{
		Cart::destroy();
	}

	public function getCount()
	{
		return Cart::count();
	}

	//lấy thông tin cho route shoppingcart
	public function getInfoRoute($idbook)
	{
		$book = Book::where('id',$idbook)->firstOrFail();
		$cate = Category::where('id',$book->cate_id)->firstOrFail();

		return  array('title' => $cate->alias, 'str_book' => get_strBook($book->id,$book->alias));
	}



	private function getMiniCartHtml()
	{
		$cart = Cart::content();

		$str = '<span>Bạn có <span class="cart-count">'. $this->getCount() .'</span> sản phẩm trong giỏ hàng</span>';

		$str = $str.'<div class="my-cart-list">';

		foreach ($cart as $item) 
		{
			$array = $this->getInfoRoute($item->id);

			$html_item = '<div class="cart-item-wrap">
			<div class="cart-item-img">
			<a href=" '.route("detail", ["title" => $array["title"], 'str_book' => $array["str_book"] ]).' "><img src="upload/products/'.$item->options["img"].'"></a>'.'</div>';
			$html_item = $html_item.'<div class="cart-item-text">
			<a href=" '.route("detail", ["title" => $array["title"], 'str_book' => $array["str_book"] ]).' ">'.$item->name.'</a>';

			if ($item->options['discount']!=0)
			{
				$html_item = $html_item.'<a href=" '.route("detail", ["title" => $array["title"], 'str_book' => $array["str_book"] ]).' "><span style="color: #ec6ã">'.number_format($item->price).'đ</span> <span style="text-decoration: line-through">'. number_format($item->options['r_price']) .'đ</span></a>';
			}
			else
			{
				$html_item  = $html_item.'<a href=" '.route("detail", ["title" => $array["title"], 'str_book' => $array["str_book"] ]).' "><span style="color: #ec6ã">'. number_format($item->price) .'đ</span></a>';
			}

			$html_item =$html_item.'<h6>'. $item->qty .'</h6></div>
			</div>';

			$str = $str . $html_item;
		}

		$str = $str.'</div><div class="cart-total-button-wrap">
		<span class="text-upp regular total">TỔNG TIỀN:<span>'.$this->getTotal().' đ</span></span>
		<div  class="button-wrap horizontal-center">
		<a href="'.route("cart").'" class="cart-popup-button text-upp">GIỎ HÀNG<i class="fa fa-angle-double-right flloat-right"></i></a>
		</div>
		<div  class="button-wrap horizontal-center">
		<a href="'.route("checkout").'" class="cart-popup-button text-upp b-fun">THANH TOÁN<i class="fa fa-angle-double-right flloat-right"></i></a>
		</div>
		</div>
		</div>';

		return $str;
	}


	private function getTotalPayHtml(){
		$str = '<h4 class="medium">TỔNG CỘNG</h4>';

		foreach ($this->getContent() as $item) {
			$str.='<span class="float-left text-cap">'. $item->name .' x '.  $item->qty .'<span class="float-right bold">'. number_format($item->price * $item->qty) .'đ</span></span>';
		}
		$str.= '<span class="float-left text-cap">total <span class="float-right bold" style="font-size: 24px;line-height: 22px;">'. $this->getTotal() .'đ</span></span>
		<span class="center-content"><a href="'.route("checkout").'" class="cart-button text-upp bold">THANH TOÁN</a></span>';

		return $str;
	}
}