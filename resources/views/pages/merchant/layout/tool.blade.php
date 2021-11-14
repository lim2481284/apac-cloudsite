<div class="tools-button">
    <button id="tool-list-btn" class="btn btn-primary tour-db tour-mobile-db" data-mobile-index='1' data-element data-index='6'
            data-intro="{{translate('tour_tool_button_float')}}" type='button'><img class="tour-db" src='/img/icon/white_star.png'/></button>    
</div>
<div class='tool-overlay'></div>
<ul class="tool-list">
    @if($moduleList[$configModule['product']] && ($isOwner || in_array($configModule['product'], $permissionList)))
    <a href="/product">
        <li>{{translate('create_product','Create Product')}}<i class="ti-package"></i></li>
    </a>
    @endif
    @if($moduleList[$configModule['order']] && ($isOwner || in_array($configModule['order'], $permissionList)))
    <a href="/order">
        <li>{{translate('manage_order','Manage Order')}}<i class="ti-control-shuffle"></i></li>
    </a>
    @endif

    @if($moduleList[$configModule['goal']] && ($isOwner || in_array($configModule['goal'], $permissionList)))
    <a href="/system/goal">
        <li>{{translate('create_goal','Create Goal')}}<i class="ti-cup"></i></li>
    </a>
    @endif
 
    @if($moduleList[$configModule['cms']] && ($isOwner || in_array($configModule['cms'], $permissionList)))
    <a href="/system/cms">
        <li>{{translate('website_builder','Website Builder')}}<i class="ti-layout"></i></li>
    </a>
    @endif
    
    @if($moduleList[$configModule['expenses']] && ($isOwner || in_array($configModule['expenses'], $permissionList)))
    <a href="/tool/expenses">
        <li>{{translate('expenses_management','Expenses Management')}}<i class="ti-receipt"></i></li>
    </a>
    @endif
    <a class="notepad-toggle" data-toggle='true'>
        <li>{{translate('my_notepad','My Notepad')}} <i class="ti-write"></i></li>
    </a>
    <a href="https://community.cloudsite.com.my">
        <li>{{translate('cloudsite_service','Cloudsite Service')}}<i class="ti-star"></i></li>
    </a>

</ul>

<div class="notes-box">
    <div class="title-area">
        <a class="notepad-back"><i class="fas fa-arrow-left"></i></a>
        <p id='noteTopTitle' data-title="{{translate('my_notepad','My Notepad')}}">{{translate('my_notepad','My Notepad')}}</p>
        <a class="notepad-toggle" data-toggle='false'><i class="fas fa-times"></i></a>
    </div>       
    <div class="inputField">
        <div class="input-group">
            <input id="noteText" class='form-control' name="title" maxlength='30' type="text" placeholder="{{translate('add_new_note','Add new note')}}">
            <div class="input-group-append">
                <button id="addNoteBtn" class="btn btn-outline-secondary" disabled type="button"><i class="fas fa-plus"></i></button>
            </div>
        </div>
    </div>
    <ul id="todoList"></ul>
    <div class='note-loader'><img src='/img/icon/inpage_loader.gif'/></div>
    <div id='noteDesc'><textarea class='form-control'></textarea></div>
    <span class="no-notes">{{translate('no_note_yet','You dont have any note yet. Insert your note title below to create new note !')}}</span>
</div>   
