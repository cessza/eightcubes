<?php 
use App\Category;
$categories = Category::categories(); ?>
<div id="header">
	<div class="container">
		<div id="welcomeLine" class="row">
			<div class="span6">Welcome!<strong> User</strong></div>
			<div class="span6">
				<div class="pull-right">
					<a href="product_summary.html"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ 3 ] Items in your cart </span> </a>
				</div>
			</div>
		</div>
		<!-- Navbar ================================================== -->
		<section id="navbar">
		  <div class="navbar">
		    <div class="navbar-inner">
		      <div class="container">
		        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		          <span class="icon-bar"></span>
		          <span class="icon-bar"></span>
		          <span class="icon-bar"></span>
		        </a>
		        <a class="brand" href="#"><img src="images/front_images/Logo/LogoW.png" style="width: 60px;"></a>
		        <div class="nav-collapse">
		          <ul class="nav">
					<li class="active"><a href="#">Home</a></li>
						<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Products<b class="caret"></b></a>
							<ul class="dropdown-menu" style="overflow-y: scroll; height: 300px; width: 230px;">
							@foreach($categories as $category)
									<li class="dropdown">
										<a href="#"><strong>{{ $category['name'] }}</strong></a>
                						@foreach($category['subcategories'] as $subcategory)
											<li><a href="#">{{ $subcategory['sub_name'] }}</a></li>
										@endforeach
									</li>
							@endforeach
							</ul>
						</li>
		            <li><a href="#">About</a></li>
		          </ul>
		          <form class="navbar-search pull-left" action="#">
		            <input type="text" class="search-query span2" placeholder="Search"/>
		          </form>
		          <ul class="nav pull-right">
		            <li><a href="#">Contact</a></li>
		            <li class="divider-vertical"></li>
		            <li><a href="#">Login</a></li>
		          </ul>
		        </div><!-- /.nav-collapse -->
		      </div>
		    </div><!-- /navbar-inner -->
		  </div><!-- /navbar -->
		</section>
	</div>
</div>  