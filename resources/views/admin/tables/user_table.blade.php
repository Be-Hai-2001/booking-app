@extends('admin.master')

@section('main-admin')
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
    <div class="table-main-right">
        <div id="title-data" style="margin-bottom:5rem"> Home <i class="fa-solid fa-right-to-bracket"></i> Profile </div>
        <table style="width:100%">
            <tr class="title-admin-table">
                <th>Id</th>
                <th>Tên Người Dùng  </th>
                <th>Số Căn Cước</th>
                <th>Email</th>
                <th>Số Điện Thoại</th>
                {{-- <th>Trạng Thái</th> --}}
                <th>Chức Danh</th>
                <th>Trạng Thái</th>
            </tr>

            @foreach ($users as $user)
                <tr class="content-admin-table">
                    <th> {{ $user->id }} </th>
                    <th> {{ $user->tenUser }} </th>
                    <th> {{ $user->cccd }} </th>
                    <th> {{ $user->email }} </th>
                    <th> {{ $user->sdt }} </th>
                    <th> {{ $user->is_admin }} </th>
                    <th>
                      <label class="switch">
                        <input type="checkbox" value="{{ $user->id }}" class="switch-check-profile" checked>
                        <span class="slider round"></span>
                      </label>
                      <input type="hidden" value="{{ $user->trangThai }}" class="stt-user">
                    </th>
                </tr>
            @endforeach
        </table>
    </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@endsection
