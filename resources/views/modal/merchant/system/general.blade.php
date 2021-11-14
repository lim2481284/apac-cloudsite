<div id="actionModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                </h4>
                <button type="button" class="btn modal-close-btn" data-dismiss="modal"><i class='ti-close'></i></button>
            </div>
            <div class="modal-body">
                <div class='row'>
                    <div class="col-12 form-group">
                        <p class='input-title'></p>
                        <input type='text' name='target' id="targetID" class='form-control' />
                        <input type='hidden' name='action' id="actionID" />
                        <input type='hidden' name='section' id="sectionID" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{translate('cancel','cancel')}}</button>
                <button class="btn btn-primary-light update-action-btn" type='button'>{{translate('update','Update')}}</button>
            </div>
        </div>
    </div>
</div>


@if(getMerchant())
<div id="telegramNotificationModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">                
                <h4 class="modal-title">{{translate('setup_telegram_notification','Setup Telegram Bot Notification')}} </h4>  
                <button type="button" class="btn modal-close-btn" data-dismiss="modal"><i class='ti-close'></i></button>   
            </div>
            <div class="modal-body row">    
                <div class='col-12 fa-step'>
                    <span class='step-icon'> 1 </span>
                    <h3> {{translate('ts_step1','Download Telegram')}} </h3>
                    <p> {{translate('download','Download')}} <a href="https://desktop.telegram.org/" target="_blank">Telegram</a> {{translate('desc_gts','App on your mobile device or laptop device')}}. </p>
                </div>
                <div class='col-12 fa-step'>
                    <span class='step-icon'> 2 </span>
                    <h3> {{translate('ts_step2','Register an account')}} </h3>
                    <p> {{translate('desc_ts2','Register a Telegram account with your phone number')}}. </p>
                </div>
                <div class='col-12 fa-step'>
                    <span class='step-icon'> 3 </span>
                    <h3> {{translate('ts_step3','Connect Cloudsite Bot')}} </h3>
                    <p> {{translate('desc_ts3','Search "CloudsiteBot" and send "/connect" message')}} </p>
                </div>
                <div class='col-12 fa-step'>
                    <span class='step-icon'> 4 </span>
                    <h3> {{translate('ts_step4','Insert Merchant ID')}} </h3>
                    <p> {{translate('desc_ts4_','Once Telegram Bot prompt you to insert verification code, copy paste the verification code below.')}} </p>
                    <div class="form-group">           
                        <div class="input-group">
                            <input type="text" id='merchantUID' class="form-control"  readonly value="{{getMerchant()->uid}}">
                            <div class="input-group-append">
                                <button class="btn btn-default" type="button" onclick="copyClipboard('merchantUID')"><i class='ti ti-clipboard'></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>         
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default ">{{translate('setup_complete','Setup Complete')}}</button>
            </div>
        </div>
    </div>
</div>

<div id="infoModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">      
                <h4 class="modal-title"></h4>          
                <button type="button" class="btn modal-close-btn" data-dismiss="modal"><i class='ti-close'></i></button>     
            </div>
            <div class="modal-body">          
                <div class='tinymce-section' id='tacSection'>
                    <div class='wysiwyg' id="tac">{!! ($tac)?$tac->value:'' !!}</div>    
                </div>  
                <div class='tinymce-section' id='returnSection'>
                    <div class='wysiwyg' id="return">{!! ($return)?$return->value:'' !!}</div>    
                </div>  
                <div class='tinymce-section' id='privacySection'>
                    <div class='wysiwyg' id="privacy">{!! ($privacy)?$privacy->value:'' !!}</div>    
                </div>  
            </div>  
            <div class="modal-footer">
                <button class="btn btn-primary update-info-btn">{{translate('update','Update')}}</button>
            </div>       
        </div>
    </div>
</div>
@endif


<div id="messengerModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(['route' => 'system.general.action.update']) !!}
            <input type='hidden' name='action' value='update_page' />
            <input type='hidden' name='id' />
            <input type='hidden' name='token' />
            <div class="modal-header">
                <button type="button" class="btn modal-close-btn" data-dismiss="modal"><i class='ti-close'></i></button>
            </div>
            <div class="modal-body">
                <div class='container'>
                    <div class='row'>
                        <div class='col-sm-12 authorize-section'>
                            <h1> Facebook Messenger </h1>
                            <p> {{translate('messenger_setup_msg','Log in with Facebook account to manage the page you would like to connect.')}}</p>
                            <button id="fb-login" class='btn btn-primary' type='button'>
                                <img src='/img/icon/fb_icon.png' />
                                {{translate('connect_with_fb','Connect with Facebook')}}
                            </button>
                            <button class='btn btn-primary connected mb-2' type='button'>
                                <img src='/img/icon/connected.png' />
                                {{translate('connected','Connected')}}
                            </button>
                            <a class='btn btn-link connected mb-4' id="fb-logout">{{translate('disconnected','Disconnect')}} </a>
                        </div>
                        <div class='col-sm-12 connected-section'>
                            <hr />
                            <div class='row'>
                                <div class='col-12 form-group'>
                                    <p class='required'>{{translate('select_page_to_connect','Select page to connect')}} </p>
                                    <select name='page_id' class="form-control form-control-sm" id="page-id" required>
                                        <option value='' disabled selected> {{translate('select_page','Please select a page')}} </option>
                                    </select>
                                </div>
                                <div class='col-12 form-group mt-4' style='text-align:center'>
                                    <button class="btn btn-primary-light">{{translate('save','Save')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>


<div id="requestModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">                
                <button type="button" class="btn modal-close-btn" data-dismiss="modal"><i class='ti-close'></i></button>     
            </div>
            <div class="modal-body">            
                <div class='container'>
                    {!! Form::open(['route' => 'feedback.submit']) !!}
                    <input type='hidden' value="{{getConfig('feedback.type.request')}}" name="type"/>
                    <div class='feedback-form'>
                        <h1> {{translate('request_additional_industry','Request additional industry')}}. </h1>
                        <p> asdasd</p>
                        <div class='feedback-message'>
                            <p> {{translate('request_industry','Request Industry')}} </p>
                            <textarea name='message' class='form-control' rows='5' placeholder="{{translate('list_down_request_industry_here','List down request industry here')}}"></textarea>
                        </div>
                        <div class='submit-section'>
                            <button class='btn btn-primary'> {{translate('submit','Submit')}} </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>         
        </div>
    </div>
</div>

<div id="editDomainModal" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        {!! Form::open(['method'=>'post', 'url' => route('system.general.domain_setting')]) !!}
            <input hidden name="action" value="edit_domain_name" />
            <input hidden class="form-control oldDomain" placeholder="xyz.com" name="old_domain" minlength='2' maxlength='30' />
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">{{translate('edit_domain', 'Edit Domain Name')}}</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <div>
                            <p>{{translate("edit_domain_desc","You can edit your domain name here")}}</p>
                            <div class="web-co">
                                <input type="text" class="form-control domainInput" placeholder="xyz.com" name="domain" minlength='2' maxlength='30' required>
                                <p class="web-co-link">.cloudsite.store</p>
                            </div>
                            <label id="domain-availability" class="form-text domainExist" data-availability="false"></label>
                        </div>
                        <small style="color:red; font-weight:bold;" class="error-input"></small>
                    </div>
                </div>
                <div class="modal-footer">
                    {!! Form::submit(translate('confirm','Confirm'),['class'=>'btn btn-primary']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>     


