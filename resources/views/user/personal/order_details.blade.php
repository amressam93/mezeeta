@extends('user.layouts.master')

@section('sub_title')
    تفاصيل الفاتوره
@endsection

@section('header')

	<style>

		.active_tab {
			background: #BA0202 !important;
			color: #FFF !important
		}

		.active_tab i { color: #FFF !important }

		.active_tab span, .active_tab i {
			border-color: #BA0202 !important;
		}

		.active_tab span { border-right-color: #fff !important;   }

		.table, .table thead>tr>th , .table tbody>tr>td {
			border: 1px solid #DDD;
			text-align: center
		}

		.single-account-info ul li {
			display: inline-block;
			min-width: 270px;
		}

        table {
            margin-top: 20px
        }

        .main-content-section {
            min-height: 600px;
            margin-top: 93px !important;
        }

        .custom_breadcrumb , .breadcrumb{
            margin-bottom: 10px !important
        }

        .main-content-section .tab-content .single-product {
            margin-top: 20px !important
        }

        @media (max-width: 767px) {
            .main-content-section {
                margin-top: 136px !important;
                padding-top: 0 !important;
            }
        }

        @media (max-width: 400px) {

            .main-content-section {
                margin-top: 162px !important;
                padding-top: 0 !important;
            }

            .single-account-info ul li a {
                font-size: 14px !important
            }
        }

	</style>


    <style>


		.single-account-info ul li {
			display: inline-block;
			min-width: 270px;
		}

        .account-info-text {
            display: block;
            font-size: 13px;
            margin: -4px 0 23px;
            overflow: hidden;
        }

        h2.page-title {
            border-bottom: 1px solid #d6d4d4;
            color: #555454;
            font-size: 18px;
            line-height: 22px;
            font-family: 'Bitter', serif;
            font-weight: 600;
            margin-bottom: 30px;
            margin-top: 0px;
            overflow: hidden;
            padding: 0 0 17px;
            text-transform: uppercase;
        }

        .single-account-info ul li {
            display: inline-block;
            min-width: 270px;
        }

        .single-account-info ul li a {
            border-color: #cacaca #b7b7b7 #9a9a9a;
            border-image: none;
            border-radius: 4px;
            border-style: solid;
            border-width: 1px;
            background: #f7f7f7;
            background: -moz-linear-gradient(#f7f7f7, #ededed);
            background: -webkit-linear-gradient(#f7f7f7, #ededed);
            background: -o-linear-gradient(#f7f7f7, #ededed);
            background: -ms-linear-gradient(#f7f7f7, #ededed);
            background: linear-gradient(#f7f7f7, #ededed);
            filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#f7f7f7', endColorstr='#ededed');
            background-size: 100% auto;
            color: #555454;
            display: block;
            font-weight: 600;
            font-size: 16px;
            line-height: 20px;
            font-family: 'Open Sans',sans-serif;
            overflow: hidden;
            text-shadow: 0 1px white;
            text-transform: uppercase;
        }

        .single-account-info ul li a span {
            border-bottom-left-radius: 5px;
            border-color: #fff #c8c8c8 #fff #fff;
            border-image: none;
            border-style: solid;
            border-top-left-radius: 5px;
            border-width: 1px;
            line-height: 48px;
            display: block;
            margin-right: 52px;
            overflow: hidden;
            padding: 0 17px;
        }

        .single-account-info ul li a i {
            border: 1px solid #fff;
            border-bottom-right-radius: 4px;
            border-top-right-radius: 4px;
            color: #fd7e01;
            float: right;
            font-size: 25px;
            line-height: 48px;
            overflow: hidden;
            text-align: center;
            width: 52px;
        }


	</style>

@endsection

@php
	$user = Auth::guard('user')->user();
@endphp

@section('content')


<!-- MAIN-CONTENT-SECTION START -->
	<section class="main-content-section padding_section" style="padding-top: 50px;min-height:500px">
		<div class="container">

			<div class="row">

				<nav class="custom_breadcrumb" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{asset('/')}}">
                                الرئيسية
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                              تفاصيل الطلب
                        </li>
                    </ol>
                </nav>

				<div class="col-12">
					<div class="account-info-text">
						مرحبا بك في حسابك. هنا يمكنك إدارة جميع المعلومات والأوامر الشخصية الخاصة بك.
					</div>
				</div>

				<!-- ACCOUNT-INFO-TEXT START -->
				<div class="col-sm-12 col-12">
					<div class="account-info">
						<div class="single-account-info">
							<ul>
								<li>
									<a href="{{ url('update_profile') }}">
										<i class="fa fa-user"></i>
										<span>تعديل المعلومات الشخصية</span>
									</a>
								</li>


								<li>
									<a href="{{ url('orders') }}" class="active_tab">
										<i class="fa fa-list-ol"></i>
										<span>الفواتير</span>
									</a>
								</li>

								<li>
									<a href="{{ url('logout') }}">
										<i class="fa fa-sign-out"></i>
										<span>تسجيل الخروج</span>
									</a>
								</li>


							</ul>
						</div>
					</div>
				</div>



				<div class="col-sm-12 col-12">

					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>التاريخ</th>
									<th>المنتج</th>
									<th>اللون</th>
									<th>المقاس</th>
									<th>الكمية</th>
									<th>السعر</th>
									<th>الاجمالي</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($orders as $item)
								<tr>
									<td>{{ $item->serial_number }}</td>
									<td>{{ Carbon\Carbon::parse($item->operation_date)->format('Y-m-d') }}</td>
									<td>
										@if($item->product != null)
											{{ $item->product->title }}
										@endif
									</td>
									<td>
										@if($item->product_color != null)
											{{ $item->product_color->title }}
										@endif
									</td>
									<td>
										@if($item->product_size != null)
											{{ $item->product_size->title }}
										@endif
									</td>
									<td>{{ $item->quantity }} </td>
									<td>{{ $item->sub_total }}  ج.م</td>
									<td>{{ $item->quantity * $item->sub_total }}  ج.م </td>
								</tr>
								@endforeach


								<tr>
									<th style="text-align:center;background: #DDD;border-right: 1px solid #CCC;" colspan="2"> الأجمالي الفرعي</th>
									<td colspan="6">{{ $invoice->sub_total }} ج.م</td>
								</tr>

								<tr>
									<th style="text-align:center;background: #CCC;border-right: 1px solid #CCC;" colspan="2">قيمة الشحن</th>
									<td colspan="6">{{ $invoice != null ? $invoice->shipping_value : '' }} ج.م</td>
								</tr>

								@if($invoice != null && $invoice->coupon_value > 0)
								<tr>
									<th style="text-align:center;background: #DDD;border-right: 1px solid #CCC;" colspan="2">قيمة الخصم</th>
									<td colspan="6">{{ $invoice->coupon_value }} ج.م</td>
								</tr>
								@endif

								<tr>
									<th style="text-align:center;background: #CCC;border-right: 1px solid #CCC;" colspan="2"> الأجمالي العام</th>
									<td colspan="6">{{ $invoice->total }} ج.م</td>
								</tr>

							</tbody>
						</table>
					</div>


				</div>




			</div>
		</div>
	</section>
	<!-- MAIN-CONTENT-SECTION END -->





@endsection
