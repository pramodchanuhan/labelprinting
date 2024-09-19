<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li>
                    @role('admin')
                    <a href="{{ url('') }}/index"><i class="la la-dashboard"></i> <span> Dashboard</span> </a>
                    @else
                    <a href="{{ url('') }}/employee-dashboard"><i class="la la-dashboard"></i> <span> Dashboard</span> </a>
                    @endrole
                </li>
                @if (auth()->user()->role == 1 || auth()->user()->role == 2)
                <li class="submenu">
                    <a href="{{ url('') }}/#"><i class="la la-user"></i> <span> Employees</span>
                        <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ url('') }}/employees">All Employees</a></li>
                    </ul>
                </li>
                @endif
                <li class="submenu">
                    <a href="#"><i class="las la-sign-out-alt"></i> <span>Label Printing</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                      
                        <li>
                            <a href="{{ url('') }}/labelprint/labelprintfrom">Label Printing From</a>
                        </li>

                        <li>
                            <a href="{{ url('') }}/labelprint/labelprintfromlist">Label Printing List</a>
                        </li>

                        <!-- @if (auth()->user()->role == 1 || auth()->user()->role == 2)
                        <li>
                            <a href="{{ url('') }}/shreesairaj/registerfromList">Bus Tickets List</a>
                        </li>
                        @endif -->
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- /Sidebar -->