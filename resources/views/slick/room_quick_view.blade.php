

<div id="div-quick-view" style="display: none">
    <div id="quick-view">

    </div>
    <div class="payment-view">
        <div id="content-quickView" >
            <div class="hoadon">
                <div  style="height:80%;">
                    <img id="room-main" src="" alt="">
                </div>
                <div style="height:20%">
                    ÂCCCACAC
                </div>
            </div>
            {{-- <hr> --}}
            <div class="content">
                <div id="title-room"></div>
                <div style="margin-bottom: 10px"><b style="margin-left:5px;">Diện tích chỗ ở: </b><a id="dientich"></a></div>
                <div style="margin-bottom: 10px"><b style="margin-left:5px">Sức chứa tối đa: </b><a id="sucChua"></a></div>
                <div class="services">
                    <?php for($i=0; $i<6; $i++){ ?>
                        <b class="services_name"></b>
                        <p class="services_content"></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    {{-- <i class="fa-solid fa-circle-xmark"></i> --}}
</div>
{{-- <script src="{{ asset('app/js/display/client/payment.js') }}"></script> --}}
{{-- <div class="services-chil">
    <b>{service_name}</b>
    <a>{service_content}</a>
</div> --}}
