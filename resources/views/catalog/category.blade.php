<!-- stores.blade.php -->

@extends('layouts.layout')

<!-- {{ $data }} -->
@section('front-content')
			<div class="store-header">
					<h1>Fullmoon Bubble Tea Store</h1>
			</div>
			<div class="menu-container main">
			<div class="menu-container">
	@guest
	<div class="notification">You are currently a visitor in this website, <a href="{{ route('login') }}">login</a> / <a href="{{ route('login') }}">register</a> if you want to receive a better price!</div>
	@else
	<div class="notification">You are currently a member of this website, your price will be based your rating, go to your account page for details.</div>
	@endguest
				@foreach ($data as $cat)
					<ul>
						<li class="menu-category">
							<h1>Select Your {{ $cat->name }}</h1>
							<p>Example Descriptions are shown here: <br>
								{{$cat->description}}
							</p>
						</li>
						@foreach ($cat->products as $p)
							<li class="menu-product">
								<a href="{{Request::url() . '/' . $cat->id . '/product/' . $p->id }}"><div class="menu-product-div">
									<img class="menu-product-image" src="{{ asset('images/product-images/'. $p->image)}}"/>
									<h2> {{ $p->name }} </h2>
									<div class="menu-price"> as low as ${{$p->price_t3}}</div>
								</div></a>
							</li>
						@endforeach
					</ul>
				@endforeach
					
			</div>

@endsection