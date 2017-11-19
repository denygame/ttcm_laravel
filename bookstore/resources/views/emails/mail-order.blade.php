@inject('cart', 'App\Http\Controllers\CartController')

<div style="font-weight: bold; color: #ec6a54; font-style: 35px"><center>Bạn đã đặt hàng tại T2HD Bookstore vào lúc {{ $time }}</center></div>
<div>
	<center><p>-------- Thông tin đơn hàng của bạn --------</p></center><br>
	@foreach ($content as $item)
		<center><p>{{ $item->qty }} X {{ $item->name }} = {{ number_format($item->qty * $item->price) }} VNĐ</p></center>
	@endforeach
	<br>
	<center><p>THÀNH TIỀN: {{ $total }} VNĐ</p></center>
	<center><p>--------------------------------------------</p></center><br><br>

	<div style="font-weight: bold; color: #ec6a54; font-style: 25px"><center>Nhân viên của chúng tôi sẽ liên hệ với bạn sớm nhất có thể để xác nhận hóa đơn này</center></div>

	<div style="font-weight: bold; color: #ec6a54; font-style: 25px"><center>Nếu có gì nhầm lẫn hãy liên hệ với chúng tôi <a class="bold c-sexy forget-link" href="{{ route('home') }}">qua trang web</a> hoặc <a class="bold c-sexy forget-link" href="mail.google.com" "email me">t2hd.faceshop.gmail.com</a></center></div>
</div>