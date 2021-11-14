<div id="shareStoreModal" class="modal fade" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">                
                <button type="button" class="btn modal-close-btn" data-dismiss="modal"><i class='ti-close'></i></button>     
            </div>
            <div class="modal-body">            
                <div class='container'>
                    <div class='feedback-form'>
                        <h1>{{translate('share_store','Share Store')}}. </h1>
                        <div class='feedback-message'>
                            <div class="form-group row">
                                <div class="form-group col-12">
                                    <p>{{translate('store_website','Store Website')}}</p>
                                    <div class="input-group mb-1">
                                        <input type="text" class="form-control" id="shareStoreURL" value="https://{{getMerchant()->getPrimaryDomain()}}" readonly>
                                        <div class="input-group-append">
                                            <button class="btn copy-btn" type="button" data-target="shareStoreURL"><i class='ti-clipboard'></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <p>{{translate('store_qr_code','Store QR Code')}}</p>
                                    <div class="input-group mb-1">
                                        <input type="text" class="form-control" id="shareStoreQR"  value="https://{{getMerchant()->getPrimaryDomain()}}/store/qr" readonly>
                                        <div class="input-group-append">
                                            <button class="btn copy-btn" type="button" data-target="shareStoreQR"><i class='ti-clipboard'></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <div class="likely">
                                        <div class="facebook"></div>
                                        <div class="twitter"></div>
                                        <div class="telegram"></div>
                                        <div class="whatsapp"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>         
        </div>
    </div>
</div>
