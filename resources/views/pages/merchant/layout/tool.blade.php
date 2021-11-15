<div class="tools-button">
    <button id="tool-list-btn" class="btn btn-primary tour-db tour-mobile-db" data-mobile-index='1' data-element data-index='6'
            data-intro="Navigate faster through Quick Access Tools or use Tools." type='button'><img class="tour-db" src='/img/icon/white_star.png'/></button>    
</div>
<div class='tool-overlay'></div>
<ul class="tool-list">
    <a href='{{env("ECOMMERCE_URL")}}/{{getMerchant()->domain}}'>
        <li>Visit My Store <i class="ti-star"></i></li>
    </a>
    <a href="/product">
        <li>Create Product <i class="ti-package"></i></li>
    </a>
    <a href="/order">
        <li>Manage Order <i class="ti-control-shuffle"></i></li>
    </a>

    <a href="/customer">
        <li>Manage Customer<i class="ti-id-badge"></i></li>
    </a>
 
    <a href="/store">
        <li>Manage Store<i class="ti-layout"></i></li>
    </a>

</ul>
