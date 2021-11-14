<div id="mobile-bottom-tab" class="bottom-nav pos-sticky mobile-bottom-nav tour-db tour-mobile-db" data-element data-mobile-index='3' data-intro="{{translate('tour_tool_button_float')}}">

    <a href='/' class="{{isNavActive(['dashboard'])?'active':''}}">
        <i class="icon far fa-clipboard"></i>
        <span class="label">{{translate('dashboard','Dashboard')}}</span>
    </a>
    
    @if($moduleList[$configModule['product']] && ($isOwner || in_array($configModule['product'], $permissionList)))
    <a href='/product' class="{{isNavActive(['product.*'])?'active':''}}">
        <i class="icon far fa-list-alt"></i>
        <span class="label">{{translate('product','Product')}}</span>
    </a>
    @endif

    @if($moduleList[$configModule['order']] && ($isOwner || in_array($configModule['order'], $permissionList)))
    <a href='/order' class="bottom-nav-center">
        <img class="bottom-tab-img" src="/img/icon/orderr.png" />
    </a>
    @endif

    @if($moduleList[$configModule['promotion']] && ($isOwner || in_array($configModule['promotion'], $permissionList)))
    <a href='/promotion' class="{{isNavActive(['promotion.*'])?'active':''}}">
        <i class="icon far fa-file-image"></i>
        <span class="label">{{translate('promotion','Promotion')}}</span>
    </a>
    @endif

    @php($systemList = [$configModule['faq'], $configModule['cms'], $configModule['shipping'], $configModule['staff']])
    @if(count(array_diff($systemList, $moduleList)) <= count($systemList) && ( $isOwner || count(array_diff($systemList,
        $permissionList)) < count($systemList))) <a href='/system' class="{{isNavActive(['system.*'])?'active':''}}">
        <i class="icon far fa-id-badge"></i>
        <span class="label">{{translate('store','Store')}}</span>
        </a>
    @endif
    
</div>