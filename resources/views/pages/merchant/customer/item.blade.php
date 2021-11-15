    <div class='col-sm-4'>
        <div class='grid-box-item'>
            <div role="group">
                <button id="btnGroupDrop{{$index}}" type="button" aria-haspopup="true" aria-expanded="false" class="btn btn-default menu-tooltip" data-tooltip-content="#tooltip_menu{{$index}}">
                    <i class='ti-more-alt'></i>
                </button>
                <div class="tooltip_templates">
                    <span id="tooltip_menu{{$index}}" class='tooltip_menus'>
                        <a href='/customer/view'>
                            <button  class='btn btn-default' >
                                <i class='ti-eye'></i> View Details
                            </button>        
                        </a>
                    </span>
                </div>
            </div>         
            <div class='img-section'> <img src='/img/icon/customer.png'/> </div>
            <div class='content-section'>
                <span class='badge badge-{{$badge}}'> {{$type}}</span>
                <h1> {{$name}} </h1>
                <div class='detail'>
                    <p> <i class='ti ti-email'></i>{{$email}}</p>
                    <p> <i class='ti ti-mobile'></i> {{$phone}} </p>
                </div>
                <small class='date'>{{$date}}</small>
            </div>
        </div>
    </div>