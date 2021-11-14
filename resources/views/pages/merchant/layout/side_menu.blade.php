<nav id="sidebar" class="tour-db" data-element data-index='1'  data-intro="{{translate('tour_sidebar_page_selection')}}">
    <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="ti ti-menu-alt"></i>
            <i class="ti ti-close close-nav"></i>
            <span class="sr-only">Toggle Menu</span>
        </button>
    </div>
    <div id='main-menu'>
        <div class='logo-section'>
            <img src='/img/logo/logo.png' />
            Cloudsite.
        </div>
        <ul class="list-unstyled components mb-5">
            <li class="{{isNavActive(['dashboard'])?'active':''}}">
                <a href='/'>
                    <i class="menu-icon ti-home">
                        <div>
                            <span> {{translate('dashboard','Dashboard')}} </span>
                        </div>
                    </i>
                </a>
            </li>


            @if($moduleList[$configModule['order']] && ($isOwner || in_array($configModule['order'], $permissionList)))
            <li class="{{isNavActive(['order.*'])?'active':''}}">
                <a href='/order'>
                    <i class="menu-icon ti-control-shuffle">
                        <div>
                            <span> {{translate('order','Order')}} </span>
                        </div>
                    </i>
                </a>
            </li>
            @endif

            @if($moduleList[$configModule['customer']] && ($isOwner || in_array($configModule['customer'],
            $permissionList)))
            <li class="{{isNavActive(['customer.index'])?'active':''}}">
                <a href='/customer'>
                    <i class="menu-icon ti-id-badge">
                        <div>
                            <span> {{translate('customer','Customer')}} </span>
                        </div>
                    </i>
                </a>
            </li>
            @endif

            @if($moduleList[$configModule['product']] && ($isOwner || in_array($configModule['product'],
            $permissionList)))
            <li class="{{isNavActive(['product.*'])?'active':''}}">
                <a href='/product'>
                    <i class="menu-icon ti-package">
                        <div>
                            <span> {{translate('product','Product')}} </span>
                        </div>
                    </i>
                </a>
            </li>
            @endif


            @if($moduleList[$configModule['promotion']] && ($isOwner || in_array($configModule['promotion'],
            $permissionList)))
            <li class="{{isNavActive(['promotion.*'])?'active':''}}">
                <a href='/promotion'>
                    <i class="menu-icon ti-star">
                        <div>
                            <span> {{translate('promotion','Promotion')}} </span>
                        </div>
                    </i>
                </a>
            </li>
            @endif

            @php($systemList = [$configModule['faq'], $configModule['cms'], $configModule['shipping'],
            $configModule['staff']])
            @if(count(array_diff($systemList, $moduleList)) <= count($systemList) && ( $isOwner ||
                count(array_diff($systemList, $permissionList)) < count($systemList))) <li
                class="{{isNavActive(['system.*'])?'active':''}}">
                <a href='/system'>
                    <i class="menu-icon ti-settings">
                        <div>
                            <span> {{translate('store','Store')}} </span>
                        </div>
                    </i>
                </a>
                </li>
            @endif
        </ul>
        <div id="sideBottomNav">
            <a href='/logout'>
                <i class='ti ti-control-skip-backward'></i>
            </a>
            <div id='helpbox'  class='tour-db' data-element data-index='6'  data-intro="{{translate('tour_topnav_guideline','Click here to find out more tutorial!')}}" >
                <i id='moduleHelp' data-toggle="modal" data-target="#guidelineModal" data-route="{{Request::route()->getName()}}" class='ti-help'></i>
            </div>
        </div>
    </div>
</nav>