<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{url('/')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            @if(isset(auth()->user()->role->permission ['name']['department']['can-view']))
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Departments
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            @endif
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                @if(isset(auth()->user()->role->permission ['name']['department']['can-add']))
                                    <a class="nav-link" href="{{route('departments.create')}}">Create Department</a>
                                    @endif
                                    @if(isset(auth()->user()->role->permission ['name']['department']['can-list']))
                                    <a class="nav-link" href="{{route('departments.index')}}">View Department</a>
                                    @endif
                                </nav>
                            </div>
                            @if(isset(auth()->user()->role->permission ['name']['notice']['can-view']))
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Notices
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            @endif
                            
                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                        @if(isset(auth()->user()->role->permission ['name']['notice']['can-add']))
                                            <a class="nav-link" href="{{route('notices.create')}}">Create Notices</a>
                                            @endif
                                            @if(isset(auth()->user()->role->permission ['name']['notice']['can-list']))
                                            <a class="nav-link" href="{{route('notices.index')}}">View Notices</a>
                                            @endif                                           
                                        </nav>
                                    </div>

                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapsePermission1" aria-expanded="false" aria-controls="pagesCollapsePermission">
                                    <div class="sb-nav-link-icon"><i class="fas fa-pencil"></i></div>    
                                    Staff Leaves
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapsePermission1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                        @if(isset(auth()->user()->role->permission ['name']['leave']['can-list']))
                                        <a class="nav-link" href="{{route('leaves.index')}}">
                                            List Leaves
                                        </a>
                                        @endif
                                        <a class="nav-link" href="{{route('leaves.create')}}">
                                            Add Leave
                                        </a>
                                        </nav>
                                    </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Manager Accounts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                @if(isset(auth()->user()->role->permission ['name']['role']['can-view']))    
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Roles
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    @endif
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                        @if(isset(auth()->user()->role->permission ['name']['role']['can-add']))
                                            <a class="nav-link" href="{{route('roles.create')}}">Create Role</a>
                                            @endif
                                            @if(isset(auth()->user()->role->permission ['name']['role']['can-list']))
                                            <a class="nav-link" href="{{route('roles.index')}}">View Role</a>
                                            @endif
                                        </nav>
                                    </div>
                                    @if(isset(auth()->user()->role->permission ['name']['user']['can-view']))
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Users
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    @endif
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                        @if(isset(auth()->user()->role->permission ['name']['user']['can-list']))
                                            <a class="nav-link" href="{{route('users.index')}}">View User</a>
                                            @endif
                                            @if(isset(auth()->user()->role->permission ['name']['user']['can-add']))
                                            <a class="nav-link" href="{{route('users.create')}}">Create User</a>
                                            @endif
                                        </nav>
                                    </div>
                                    @if(isset(auth()->user()->role->permission ['name']['permission']['can-view']))
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapsePermission" aria-expanded="false" aria-controls="pagesCollapsePermission">
                                        Permissions
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    @endif
                                    <div class="collapse" id="pagesCollapsePermission" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                        @if(isset(auth()->user()->role->permission ['name']['permission']['can-list']))
                                            <a class="nav-link" href="{{route('permissions.index')}}">View Permission</a>
                                            @endif
                                            @if(isset(auth()->user()->role->permission ['name']['permission']['can-add']))
                                            <a class="nav-link" href="{{route('permissions.create')}}">Create Permission</a>
                                            @endif
                                        </nav>
                                    </div>
                                    
                                </nav>
                                </div>

                            </div>         
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        {{Auth()->user()->name}}
                    </div>
                </nav>
            </div>