@extends('layouts.frontend.master')
@section('contend')
<style type="text/css">
	thead tr th {
		text-align: center;
	}
	.cart {
		padding-left: 10px;
	}
</style>
<div class="container">
	<div class="titlePrimary">
            GIỎ HÀNG CỦA BẠN.
    </div>
	<div class="row">
		<form action="{{ route('cart.update')}}" method="post" style="width: 100%;">
			@method('put')
			@csrf
			<table width="100%" border="1" cellpadding="0" cellspacing="0">
				<thead>
					<tr height="30">
						<th>#ID</th>
						<th>Tên sản phẩm</th>
						<th>Đơn giá</th>
						<th>số lượng</th>
						<th>Thành tiền</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@php 
						$total = 0;
					@endphp
					@foreach($product as $product)
						@php 
							$total += ($product->price * $product->qty);
						@endphp
						<tr height="30">
							<td class="cart">{{$product->id}}</td>
							<td class="cart">{{$product->name}}</td>
							<td class="cart">{{number_format($product->price)}}</td>
							<td width="70">
								<input type="text" name="qty[{{$product->id}}]" value="{{$product->qty}}" style=" border: none; padding-left: 10px" >
							</td class="cart">
							<td class="cart">{{number_format($product->price * $product->qty)}}</td>
							<td class="cart">
								<a href="{{ route('cart.delete', ['id' => $product->id]) }}" class="btn btn-danger btn-xs" title="xóa" onclick="return confirm('Bạn Có chắc Không')"> <i class="fa fa-trash"></i> Xóa</a>
							</td>
						</tr>
					@endforeach
					<tr height="30">
						<td class="cart" colspan="4">
							<button type="submit" class="btn btn-primary btn-xs" >Cập Nhật</button>
						</td>
						<td class="cart" colspan="2">Tổng Tiền: {{number_format($total)}} vnđ</td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
</div>
@endsection