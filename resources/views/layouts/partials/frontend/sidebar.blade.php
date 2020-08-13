<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                
                <li> <a class="waves-effect waves-dark" href="/" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a></li>
               
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-settings"></i><span class="hide-menu">Settings</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">General Setting</a></li>
                        <li><a href="#">Email Setting</a></li>
                        <li><a href="#">SMS Setting</a></li>
                        <li><a href="#">Footer Setting</a></li>
                       
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark @if(Request::route('attribute_slug')) active @endif" href="javascript:void(0)" aria-expanded="false"><i class="ti-settings"></i><span class="hide-menu">Product Specification </span></a>
                    <ul aria-expanded="false" class="collapse @if(Request::route('attribute_slug')) in @endif">
                        <li><a href="{{route('category')}}">Main Category</a></li>
                        <li><a href="{{route('subcategory')}}">Sub Category</a></li>
                        <li><a href="{{route('subchildcategory')}}">Sub Child Category</a></li> 
                        <li><a href="{{route('productAttribute')}}">Product Attributes</a></li>
                                
                        <li><a href="{{route('brand')}}">Product Brand</a></li>
                       
                    </ul>
                </li>


                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-shine"></i><span class="hide-menu">Product </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('product.create')}}">Add New Product</a></li>
                        <li><a href="{{route('product.list')}}">Manage Product</a></li>
                       
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-shine"></i><span class="hide-menu">Power setting </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Create Role</a></li>
                        <li><a href="#">Role Permission</a></li>
                       
                    </ul>
                </li>

            
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Customers </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">View Customers</a></li>
                        <li><a href="#">Transections</a></li>
                        <li><a href="#">Reviews</a></li>
                    
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-user"></i><span class="hide-menu">Staff </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Add New Staff</a></li>
                        <li><a href="#">All Staff</a></li>
                        <li><a href="#">Manage Designation</a></li>
                       
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-money"></i><span class="hide-menu">Vendor</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li> <a href="#">View Vendors</a></li>
                        <li><a href="#">Add Vendors</a></li>
                       
                        <li> <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">Vendor Request</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="javascript:void(0)">All Request</a></li>
                                <li><a href="javascript:void(0)">Pending</a></li>
                                <li><a href="javascript:void(0)">Accepted</a></li>
                                <li><a href="javascript:void(0)">Rejected</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Vendor Subscriptions</a></li>
                       
                    </ul>
                </li>

                 <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-palette"></i><span class="hide-menu">Orders</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="app-email.html">Add Product</a></li>
                        <li><a href="app-email-detail.html">View Products</a></li>
                        <li><a href="app-compose.html">Deactivated Products</a></li>
                        <li><a href="app-compose.html">Completed Orders</a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-palette"></i><span class="hide-menu">Orders</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="app-email.html">All Orders</a></li>
                        <li><a href="app-email-detail.html">Pending Orders</a></li>
                        <li><a href="app-compose.html">Accepted Orders</a></li>
                        <li><a href="app-compose.html">Processing Orders</a></li>
                        <li><a href="app-compose.html">Rejected Orders</a></li>
                        <li><a href="app-compose.html">Completed Orders</a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-support"></i><span class="hide-menu">Ticket Manage<span class="badge badge-pill badge-warning ml-auto">3</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#"><i class="ti-list"></i> All Ticket</a></li>
                      
                        
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-email"></i><span class="hide-menu">SMS <span class="badge badge-pill badge-cyan ml-auto">4</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="app-email.html">Mailbox</a></li>
                        <li><a href="app-email-detail.html">Mailbox Detail</a></li>
                        <li><a href="app-compose.html">Compose Mail</a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-palette"></i><span class="hide-menu">Expenditure</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="app-email.html">Mailbox</a></li>
                        <li><a href="app-email-detail.html">Mailbox Detail</a></li>
                        <li><a href="app-compose.html">Compose Mail</a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-stats-up"></i><span class="hide-menu">API</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="app-email.html">Mailbox</a></li>
                        <li><a href="app-email-detail.html">Mailbox Detail</a></li>
                        <li><a href="app-compose.html">Compose Mail</a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-bar-chart"></i><span class="hide-menu">Reports</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="app-email.html">Transactions</a></li>
                        <li><a href="app-email-detail.html">Mailbox Detail</a></li>
                        <li><a href="app-compose.html">Compose Mail</a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-map-alt"></i><span class="hide-menu">Network Map</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="app-email.html">Mailbox</a></li>
                        <li><a href="app-email-detail.html">Mailbox Detail</a></li>
                        <li><a href="app-compose.html">Compose Mail</a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-server"></i><span class="hide-menu">Stock</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="app-email.html">Mailbox</a></li>
                        <li><a href="app-email-detail.html">Mailbox Detail</a></li>
                        <li><a href="app-compose.html">Compose Mail</a></li>
                    </ul>
                </li>
                
                
             
               
                <li> <a class="waves-effect waves-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"href="#" aria-expanded="false"><i class="fa fa-power-off text-success"></i><span class="hide-menu">Log Out</span></a></li>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                </form>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>