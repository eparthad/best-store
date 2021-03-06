<div class="logo-nav">
    <div class="logo-nav-left animated wow zoomIn" data-wow-delay=".5s">
        <h1><a href="{{url('/')}}">E-commerce<span>Shop anywhere</span></a></h1>
    </div>
    <div class="logo-nav-left1">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header nav_2">
                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{url('/')}}" class="act">Home</a></li>
                    @foreach($publishCategories as $publishCategory)
                    <li class="active"><a href="{{url('/category-view/'.$publishCategory->id.'/'.$publishCategory->categoryName)}}" class="act">{{ $publishCategory->categoryName }}</a></li>
                    @endforeach
                    <!-- Mega Menu -->
                    {{--<li class="dropdown">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>--}}
                        {{--<ul class="dropdown-menu multi-column columns-3">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-sm-4">--}}
                                    {{--<ul class="multi-column-dropdown">--}}
                                        {{--<h6>Men's Wear</h6>--}}
                                        {{--<li><a href="{{url('/category')}}">Clothing</a></li>--}}
                                        {{--<li><a href="products.html">Wallets</a></li>--}}
                                        {{--<li><a href="products.html">Shoes</a></li>--}}
                                        {{--<li><a href="products.html">Watches</a></li>--}}
                                        {{--<li><a href="products.html">Accessories</a></li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-4">--}}
                                    {{--<ul class="multi-column-dropdown">--}}
                                        {{--<h6>Women's Wear</h6>--}}
                                        {{--<li><a href="products.html">Clothing</a></li>--}}
                                        {{--<li><a href="products.html">Wallets,Bags</a></li>--}}
                                        {{--<li><a href="products.html">Footwear</a></li>--}}
                                        {{--<li><a href="products.html">Watches</a></li>--}}
                                        {{--<li><a href="products.html">Accessories</a></li>--}}
                                        {{--<li><a href="products.html">Jewellery</a></li>--}}
                                        {{--<li><a href="products.html">Beauty & Grooming</a></li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-4">--}}
                                    {{--<ul class="multi-column-dropdown">--}}
                                        {{--<h6>Kid's Wear</h6>--}}
                                        {{--<li><a href="products.html">Kids Home Fashion</a></li>--}}
                                        {{--<li><a href="products.html">Boy's Clothing</a></li>--}}
                                        {{--<li><a href="products.html">Girl's Clothing</a></li>--}}
                                        {{--<li><a href="products.html">Shoes</a></li>--}}
                                        {{--<li><a href="products.html">Brand Stores</a></li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                                {{--<div class="clearfix"></div>--}}
                            {{--</div>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="dropdown">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">Furniture <b class="caret"></b></a>--}}
                        {{--<ul class="dropdown-menu multi-column columns-3">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-sm-4">--}}
                                    {{--<ul class="multi-column-dropdown">--}}
                                        {{--<h6>Home Collection</h6>--}}
                                        {{--<li><a href="furniture.html">Cookware</a></li>--}}
                                        {{--<li><a href="furniture.html">Sofas</a></li>--}}
                                        {{--<li><a href="furniture.html">Dining Tables</a></li>--}}
                                        {{--<li><a href="furniture.html">Shoe Racks</a></li>--}}
                                        {{--<li><a href="furniture.html">Home Decor</a></li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-4">--}}
                                    {{--<ul class="multi-column-dropdown">--}}
                                        {{--<h6>Office Collection</h6>--}}
                                        {{--<li><a href="furniture.html">Carpets</a></li>--}}
                                        {{--<li><a href="furniture.html">Tables</a></li>--}}
                                        {{--<li><a href="furniture.html">Sofas</a></li>--}}
                                        {{--<li><a href="furniture.html">Shoe Racks</a></li>--}}
                                        {{--<li><a href="furniture.html">Sockets</a></li>--}}
                                        {{--<li><a href="furniture.html">Electrical Machines</a></li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-4">--}}
                                    {{--<ul class="multi-column-dropdown">--}}
                                        {{--<h6>Decorations</h6>--}}
                                        {{--<li><a href="furniture.html">Toys</a></li>--}}
                                        {{--<li><a href="furniture.html">Wall Clock</a></li>--}}
                                        {{--<li><a href="furniture.html">Lighting</a></li>--}}
                                        {{--<li><a href="furniture.html">Top Brands</a></li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                                {{--<div class="clearfix"></div>--}}
                            {{--</div>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li><a href="short-codes.html">Short Codes</a></li>--}}
                    {{--<li><a href="mail.html">Mail Us</a></li>--}}
                </ul>
            </div>
        </nav>
    </div>
    <div class="logo-nav-right">
        <div class="search-box">
            <div id="sb-search" class="sb-search">
                <form>
                    <input class="sb-search-input" placeholder="Enter your search term..." type="search" id="search">
                    <input class="sb-search-submit" type="submit" value="">
                    <span class="sb-icon-search"> </span>
                </form>
            </div>
        </div>
        <!-- search-scripts -->
        <script src="{{ asset('frontEnd/js/classie.js') }}"></script>
        <script src="{{ asset('frontEnd/js/uisearch.js') }}"></script>
        <script>
            new UISearch( document.getElementById( 'sb-search' ) );
        </script>
        <!-- //search-scripts -->
    </div>


    <div class="header-right">
        <div class="cart box_1">
            <a href="{{ url('/cart/show') }}">
                <h3> <div class="total" id="header-ajax">
                        </div>
                    <img src="{{ asset('frontEnd/images/bag.png') }}" alt="" />

                </h3>
            </a>
            <p><a href="{{ url('/empty-cart') }}" class="simpleCart_empty">Empty Cart</a></p>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>