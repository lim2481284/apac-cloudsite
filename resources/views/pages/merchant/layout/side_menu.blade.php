<nav id="sidebar" class="tour-db" data-element data-index='1'  data-intro="Use this sidebar to navigate to other sections.">
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
                            <span> Dashboard</span>
                        </div>
                    </i>
                </a>
            </li>

            <li class="{{isNavActive(['order.*'])?'active':''}}">
                <a href='/order'>
                    <i class="menu-icon ti-control-shuffle">
                        <div>
                            <span>Order </span>
                        </div>
                    </i>
                </a>
            </li>

            <li class="{{isNavActive(['customer.*'])?'active':''}}">
                <a href='/customer'>
                    <i class="menu-icon ti-id-badge">
                        <div>
                            <span> Customer</span>
                        </div>
                    </i>
                </a>
            </li>

            <li class="{{isNavActive(['product.*'])?'active':''}}">
                <a href='/product'>
                    <i class="menu-icon ti-package">
                        <div>
                            <span>Product </span>
                        </div>
                    </i>
                </a>
            </li>


            <li class="{{isNavActive(['promotion.*'])?'active':''}}">
                <a href='/promotion'>
                    <i class="menu-icon ti-star">
                        <div>
                            <span> Promotion </span>
                        </div>
                    </i>
                </a>
            </li>

            <li class="{{isNavActive(['analysis.*'])?'active':''}}">
                <a href='/analysis'>
                    <i class="menu-icon ti-bar-chart">
                        <div>
                            <span> Analaysis </span>
                        </div>
                    </i>
                </a>
            </li>

            <li class="{{isNavActive(['store.*'])?'active':''}}">
                <a href='/store'>
                    <i class="menu-icon ti-settings">
                        <div>
                            <span> Store </span>
                        </div>
                    </i>
                </a>
                </li>
        </ul>
        <div id="sideBottomNav">
            <a href='/logout'>
                <i class='ti ti-control-skip-backward'></i>
            </a>
        </div>
    </div>
</nav>