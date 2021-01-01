<?php 
use App\Category;
$categories = Category::categories();
// echo "<pre>"; print_r($categories); die;
?>
<!-- Sidebar ================================================== -->
<div id="sidebar" class="span3">
    <div class="well well-small"><a id="myCart" href="product_summary.html"><img src="{{asset('images/front_images/ico-cart.png')}}" alt="cart">3 Items in your cart</a></div>
    <ul id="sideManu" class="nav nav-tabs nav-stacked">
        @foreach($categories as $category)
            @if(count($category['subcategories'])>0)
            <li class="subMenu"><a>{{ $category['name'] }}</a>
                @foreach($category['subcategories'] as $subcategory)
                    <ul>
                        <li><a href="products.html"><i class="icon-chevron-right"></i><strong>{{ $subcategory['sub_name'] }}</strong></a></li>
                    </ul>
                @endforeach
                </li>
            @endif
        @endforeach
    </ul>
    <br/>
    <div class="thumbnail">
        <img src="{{asset('images/front_images/payment_methods.png')}}" title="Payment Methods" alt="Payments Methods">
        <div class="caption">
            <h5>Payment Methods</h5>
        </div>
    </div>
</div>
<!-- Sidebar end=============================================== -->