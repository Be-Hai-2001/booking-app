
<div class="filtering edit" style="display: flex; margin: auto 210px;">
    {{-- Product --}}
    {{-- <div >
        {{-- <div  style="width: 20em">
            <div class="image-hotel">
                <img style="margin-left: 24px;" src="./app/images/uudai.png" alt="">
            </div>
            <div style="margin-left: 24px;" class="content">
                <p>Giá sản phẩm</p>
                <p> <a href="#">Tên sản phẩm</a> </p>
            </div>
         </div> --}}
    {{-- </div> --}} --}}
    @foreach ($discount as $hidden)
        <div>
            <div style="width: 20em">
                <div class="image-hotel" >
                    <img style="margin-left: 24px;" src="./app/images/uudai.png" alt="">
                </div>
                <div style="margin-left: 24px;" class="content">
                    <p>{{ $hidden->giaLoaiPhong }}</p>
                    <p> <a href="#">{{ $hidden->tenLoai }}</a> </p>
                </div>
             </div>
        </div>
    @endforeach

</div>

<script type="text/javascript" src="frontend/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js" integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">

$('.filtering').slick({
  slidesToShow: 4,
  slidesToScroll: 4,
  arrows:true,
  speed:300,
  autoplay: true,


});

var filtered = false;

$('.js-filter').on('click', function(){
  if (filtered === false) {
    $('.filtering').slick('slickFilter',':even');
    $(this).text('Unfilter Slides');
    filtered = true;
  } else {
    $('.filtering').slick('slickUnfilter');
    $(this).text('Filter Slides');
    filtered = false;
  }
});
</script>
