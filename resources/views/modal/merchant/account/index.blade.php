
@if(!$isFASetup)
<div id="googleFAModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        {!! Form::open(['route' => 'account.fa.update']) !!}
        <input type='hidden' name='action' value='enable'/>
        <div class="modal-content">
            <div class="modal-header">                
                <h4 class="modal-title">{{translate('setup_g2fa','Setup Google Authenticator')}} </h4>  
                <button type="button" class="btn modal-close-btn" data-dismiss="modal"><i class='ti-close'></i></button>   
            </div>
            <div class="modal-body row">    
                <div class='col-12 fa-step'>
                    <span class='step-icon'> 1 </span>
                    <h3> {{translate('ga_step1','Download Google Authenticator')}} </h3>
                    <p> {{translate('download','Download')}} <a href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en&gl=US" target="_blank">Google Authenticator</a> {{translate('desc_gfa','App on your mobile device')}}. </p>
                </div>
                <div class='col-12 fa-step'>
                    <span class='step-icon'> 2 </span>
                    <h3> {{translate('ga_step2','Set up an account')}} </h3>
                    <p> {{translate('desc_gfa2','In the Google Authenticator App, click on the "+" button on the right bottom, then choose Scan a QR code')}}. </p>
                </div>
                <div class='col-12 fa-step'>
                    <span class='step-icon'> 3 </span>
                    <h3> {{translate('ga_step3','Scan QR Code')}} </h3>
                    <p> {{translate('desc_gfa3','Scan the QR code below or you can choose Enter a setup key manually.')}} </p>
                    <div class='qr-code'>
                        <img src="{{ $QR_Image }}">
                        <div class='code'>
                            <p>{{translate('manual_entry','Manual Entry')}} </p>
                            <p class='mb-2'>{{translate('ga_secret_backup','Write down this secret key and keep it in a safe place. If your phone got lost or erased Google Authenticator account, you will need this key to restore your Google Authenticator account.')}} </p>
                            <span> {{$secret}} </span>
                        </div>
                    </div>
                </div>
                <div class='col-12 fa-step'>
                    <span class='step-icon'> 4 </span>
                    <h3> {{translate('ga_step4','Verify OTP')}} </h3>
                    <p> {{translate('desc_gfa4','Once you finish scanning the code, you should able to see new Account registered in the App. Insert the OTP code below to complete the setup.')}}. </p>
                    <div class="form-group">                        
                        <input type="text" class="form-control" name='code' placeholder="{{translate('opt_code','Insert your OTP code here')}}">
                    </div>
                </div>
            </div>         
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary-light ">{{translate('verify_otp','Verify OTP')}}</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endif


<div id="profileModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="btn modal-close-btn" data-dismiss="modal"><i class='ti-close'></i></button>
            </div>
            <div class="modal-body row">
                <input type='hidden' name='method' id='method'/>    
                <div class='col-12 form-group'>
                    <div id="emailToggle" class='toggle-section'>
                        <p class='required'>{{translate('new_email','New email')}}</p>
                        <input type="email" class="form-control disable-input toggle-section" name="email" placeholder="example@gmail.com" length="50"/>
                    </div>
                    <div id="phoneToggle" class="toggle-section">
                        <p class='required'>{{translate('new_phone','New phone')}}</p>
                        <div class="input-group">
                            <select class="custom-select disable-input" name="country_code">
                                @foreach(getConfig('country.tel_code') as $key => $value)
                                    <option value="{{$key}}">{{translate($value,$value)}}</option>
                                @endforeach
                            </select>
                            <input type="text" class="form-control toggle-section disable-input" name="phone" placeholder="123337788" length="12" />
                        </div>
                    </div>
                </div>
                <div class='col-12 form-group'>
                    <p class='required'>{{translate('current_password','Current password')}} </p>
                    <input type="password" class="form-control password_input" name="password" required />
                </div>
                <div class='col-12 form-group'>
                    <label>{{translate('verification_code','Verification Code')}}</label>
                    <div class="input-group">
                        <input type="text" class="form-control verification_input" name="verification_code" required />
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary profile-action-btn" data-action='verification' type="button">{{translate('send','Send')}}</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">               
                <button type="button" class="btn btn-default" data-dismiss="modal">{{translate('cancel','cancel')}}</button>
                <button class="btn btn-primary profile-action-btn" data-action='update' >{{translate('update','Update')}}</button>                           
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>


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
                    <p> {{translate('desc_ts4_','Once Telegram Bot prompt you to insert verification code, copy paste the verification code below.')}}</p>
                    <div class="form-group">           
                        <div class="input-group">
                            <input type="text" id='merchantUID' class="form-control"  readonly value="{{getUserUID()}}">
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



