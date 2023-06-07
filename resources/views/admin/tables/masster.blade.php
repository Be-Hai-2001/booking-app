    <!-- bảng khách sạn -->
    @include('admin.tables.hotel_table')
    <!-- bảng tiện ích khách sạn -->
    @include('admin.tables.service_hotel')
    <!-- Loại giường -->
    @include('admin.tables.loaigiuong_table')
    <!-- Loại phòng -->
    @include('admin.tables.roomtype_table')
    @include('admin.tables.service_roomtype')
    <div style="display: flex;">
        <!-- bảng quận huyện -->
        <div style="width:50%">
            @include('admin.tables.quanhuyen')
        </div>
        <!-- bảng phường xã -->
        <div style="width:50%">
            @include('admin.tables.phuongxa')
        </div>
    </div>
