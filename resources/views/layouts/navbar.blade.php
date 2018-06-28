<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src= "{{ url('img/admin1.png') }}" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"> Admin</strong>
                             </span> <span class="text-muted text-xs block">Admin <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                          <!--   <li><a href="profile.html">Profile</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="login.html">Logout</a></li> -->
                              <li><a href="{{ url('admin_profile') }}"><i class="fa fa-user" aria-hidden="true"></i>&nbsp Profile</a></li>
                            <li><a href=""><i class="fa fa-user" aria-hidden="true"></i>&nbspContacts</a></li>
                            <li><a href="{{ url('mailbox') }}"><i class="fa fa-envelope-o"></i>&nbsp Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="logout">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        <p style="font-size:10px;">Admin<br> Control System</p>
                    </div>
                </li>
               <!--  <li class="active">
                    <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-secdropond-level">
                        <li><a href="index.html">Dashboard v.1</a></li>
                        <li class="active"><a href="dashboard_2.html">Dashboard v.2</a></li>
                        <li><a href="dashboard_3.html">Dashboard v.3</a></li>
                        <li><a href="dashboard_4_1.html">Dashboard v.4</a></li>
                        <li><a href="dashboard_5.html">Dashboard v.5 </a></li>
                    </ul>
                </li> -->
                <li class="active">
                    <a href="{{ url('dashboard') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span>  </a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Leave Management</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ url('apply_leave') }}">Apply Leave</a></li>
                        <li><a href="{{ url('leave_history') }}">Leave History</a></li>
                        <li><a href="{{ url('leave_approval') }}">Approve Leave</a></li>
                        <li><a href="{{ url('rmleave_report') }}">Rm leave report</a></li>
                    </ul>
                </li>
               <!-- <li>
                    <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Employee</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ url('create_employee') }}">Employee Creation</a></li>
                        <li><a href="{{ url('employee_report') }}">Employee Reports</a></li>
                    </ul>
                </li> by chaitu-->
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Quotation</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ url('create_quotation') }}">Quotation Entry</a></li>
                        <li><a href="{{ url('quotation_report') }}">Quotation Reports</a></li>
                    </ul>
                </li>
                 <li>
                    <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Invoice</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ url('create_invoice') }}">Invoice Entry</a></li>
                        <li><a href="{{ url('invoice_report') }}">Invoice Reports</a></li>
                    </ul>
                </li>
                 <!-- <li>
                    <a href="{{url('http://webmail.nprodax.com')}}"><i class="fa fa-envelope"></i> <span class="nav-label">Employee Mail</span></a>
                </li> -->
                 <li>
                    <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Holiday Calendar</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                    <li><a href="{{ url('create_holiday') }}"><i class="fa fa-calendar"></i> <span class="nav-label">Holiday Entry</span></a></li>
                     <li><a href="{{ url('holiday_report') }}"><i class="fa fa-calendar"></i> <span class="nav-label">Holiday Report</span></a></li>
                     </ul>
                </li>
                //---------------by chaitu-----------------//
                <!--by chaitu <li>
                    <a href="#"><i class="fa fa-money"></i> <span class="nav-label">Payments</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ url('create_payment') }}">Payment Entry</a></li>
                        <li><a href="{{ url('payment_voucher_report') }}">Payment Reports</a></li>
                    </ul>
                </li>
                 <li>
                    <a href="{{ url('receipt_report') }}"><i class="fa fa-money"></i> <span class="nav-label">Receipt Details</span><span class="fa arrow"></span></a>
                    <!-- <ul class="nav nav-second-level collapse">
                        <li><a href="{{ url('receipt_report') }}">Receipt</a>
                         </a></li>
                    </ul> -->
                </li>
               <!-- <li>
                    <a href="#"><i class="fa fa-motorcycle"></i> <span class="nav-label">Vehicles</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ url('vehicle_entry') }}">Vehicle Entry</a></li>
                        <li><a href="{{ url('vehicle_report') }}">Vehicle Reports</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Customers</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ url('customer_entry') }}">Customer Entry</a></li>
                        <li><a href="{{ url('customer_report') }}">Customer Reports</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Roles</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ url('assign_role') }}">Role Entry</a></li>
                        <li><a href="{{ url('role_report') }}">Role Reports</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Permission</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ url('assign_permission') }}">Permission Entry</a></li>
                        <li><a href="{{ url('permission_report') }}">Permission Reports</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Role Permission</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ url('assign_role_permission') }}">Role Permission Entry</a></li>
                        <li><a href="{{ url('role_permission_report') }}">Role Permission Reports</a></li>
                    </ul>
                </li>
                <!-<li>
                    <a href="css_animation.html"><i class="fa fa-magic"></i> <span class="nav-label">CSS Animations </span><span class="label label-info pull-right">62</span></a>
                </li>
                <li class="landing_link">
                    <a target="_blank" href="landing.html"><i class="fa fa-star"></i> <span class="nav-label">Landing Page</span> <span class="label label-warning pull-right">NEW</span></a>
                </li>
                <li class="special_link">
                    <a href="package.html"><i class="fa fa-database"></i> <span class="nav-label">Package</span></a>
                </li>-->
            </ul>

        </div>
    </nav>