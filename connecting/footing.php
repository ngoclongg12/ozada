<script src="<?= $config['hostname'] ?>library/bootstrap-v4/js/proper.min.js"></script>
<script src="<?= $config['hostname'] ?>library/bootstrap-v4/js/jquery.js"></script>
<script src="<?= $config['hostname'] ?>library/jquery/jquery.js"></script>
<script src="<?= $config['hostname'] ?>library/bootstrap-v4/js/boostrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="<?= $config['hostname'] ?>library/slick-main/slick/slick.min.js"></script>
<script src="<?= $config['hostname'] ?>library/slick-main/slick.jquery.json"></script>
<script src="<?= $config['hostname'] ?>library/dropify/js/dropify.min.js"></script>

<Script>
    $(document).ready(function() {
        // focus pagination
        $('.pageNumber<?php if (isset($_GET['page_filter'])) {echo $_GET['page_filter'];} ?>').focus();
        $('.pageNumber<?php if (isset($_GET['page'])) {echo $_GET['page'];} ?>').addClass('active');
        $('.pageNumber<?php if (!isset($_GET['page'])){echo "1";} ?>').addClass('active');
        $(".accUser").click(function() {
            $(".opAccHide").slideToggle();
        });
        $(".barh1").click(function() {
            $(".divbtnService").slideToggle();
        });
        $(".transport").click(function() {
            $(".transportToggle").slideToggle();
        });
        $(".logoUser").click(function() {
            $(".loginHide").slideToggle();
        });
        $(".box-lang").click(function() {
            $(".get-lang").slideToggle();
        });
        $(".set_admin").click(function() {
            $(".option-logout-toggle-admin").slideToggle();
        });
        $('.boxSearchPrd').hover(function(){
            
        })
        $('.slideBanner').slick({
            autoplay: true,
            autoplayspeed: 1000,
            dots: true,
        });
        $('.slidePrd').slick({
            dots: true,
            autoplay: true,
            autoplayspeed: 1000,
            slidesToShow: 6,
            slidesToScroll: 2,
            prevArrow: '<button class="btn-slick prev-slick" ><i class="fas fa-angle-left"></i></button>',
            nextArrow: '<button class="btn-slick next-slick" ><i class="fas fa-angle-right"></i></button>',
            responsive: [{
                    breakpoint: 1124,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4,
                        infinite: true,
                        dots: true,
                        dotsClass: "slick-dots slick-thumb",
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 320,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: false,
                    }
                },
            ]
        });
        $('.dropify').dropify({
            messages: {
                'replace': 'Chon hinh anh san pham',
                'remove': 'Gỡ bỏ',
                'error': 'Ooops !!!'
            }
        });

        // required input cart_bill
        $('#exampleModal').on('shown.bs.modal', function() {
            $('#myInput').trigger('focus');
        });
        $('#nameBill').change(function() {
            let nameBill = $('#nameBill').val();
            $('#modalName').html(nameBill);
        })
        $('#phoneBill').change(function() {
            let phoneBill = $('#phoneBill').val();
            $('#modalPhone').html(phoneBill);
        })
        $('#addressBill').change(function() {
            let addressBill = $('#addressBill').val();
            $('#modalAddress').html(addressBill);
        })
        $('#typeBill').change(function() {
            let typeBill = $('#typeBill :selected').text();
            $('#modalPay').html(typeBill);
        })
        $('.js_checkout').click(function(e) {
            // e.preventDefault();
            // return false;
            let infoKH = $('.infoKH').serialize();
            // console.log(infoKH);
            // console.log($('#typeBill :selected').val());
            if($('#typeBill :selected').val() == "0"){
                $('.errTypeBill').show();
                $('.errTypeBill').html('Vui lòng chọn hình thức thanh toán!');
            }
            $('#typeBill').change(function(){
                $('.errTypeBill').hide();
            })
            if($('#addressBill').val() == ""){
                $('.errAddressBill').show();
                $('.errAddressBill').html('Vui lòng điền địa chỉ!');
            }
            $('#addressBill').change(function(){
                $('.errAddressBill').hide();
            })
            $('#nameBill').change(function(){
                $('.errNameBill').hide();
            })
            if($('#nameBill').val() == ""){
                $('.errNameBill').show();
                $('.errNameBill').html('Vui lòng điền tên!');
            }
            $('#phoneBill').change(function(){
                $('.errPhoneBill').hide();
            })
            if($('#phoneBill').val() == ""){
                $('.errPhoneBill').show();
                $('.errPhoneBill').html('Vui lòng điền số điện thoại!');
            }
            if($('#nameBill').val() != "" && $('#phoneBill').val() != "" && $('#addressBill').val() != "" && $('#typeBill :selected').val() != "0"){
                jQuery.noConflict();
                $('#exampleModal').modal('show');
            }
        })

        // get info customer
        $('#exampleModal').on('click', '.js_submit', function(e) {
            // e.preventDefault();
            // let infoKH = $('.infoKH').serialize();
            let newnameBill = $('#nameBill').val();
            let newphoneBill = $('#phoneBill').val();
            let newaddressBill = $('#addressBill').val();
            
            $.get('./component/list_content/cart/cart_getinfo.php',
            {Name: newnameBill, Phone: newphoneBill, Address: newaddressBill},
            function(data){
                window.location.replace("<?= $config['hostname'] ?>index.php?component=cart_success");
            })
            
        })

        // count price
        $('.countNum').change(function() {
            var countVal = $(this).val();
            console.log(countVal);
            var inputID = $(this).attr('data-id');
            console.log(inputID);

            $.ajax({
                data: {
                    id: inputID,
                    qty: countVal
                },
                url: './component/list_content/cart/cart_caculator.php',
                method: 'get',
            }).done(res => {
                console.log(res);
                location.reload();
            }).fail(err => {
                console.log(err.response);
            })

        })

        // Change status-Order
        $('.cha_ship').change(function(){
            confirm('Chuyển trạng thái đang vận chuyển đơn hàng')
            let id_dh = $(this).find(":selected").val();
            
            $.ajax({
                data: {
                    val_id_dh: id_dh
                },
                url: '../Admin_layout/Order/order_processList.php',
                method: 'get',
            }).done(res => {
                console.log(res);
                window.location.replace("<?= $config['hostname'] ?>admin/trangquantri.php?Admin=order_shipping");
            }).fail(err => {
                console.log(err);
            });
        })
        $('.cha_done').change(function(){
            confirm('Chuyển trạng thái đơn hàng thành công')
            let done_id = $(this).find(":selected").val();
            
            $.ajax({
                data: {
                    done_id_dh: done_id
                },
                url: '../Admin_layout/Order/order_processShip.php',
                method: 'get',
            }).done(res => {
                console.log(res);
                window.location.replace("<?= $config['hostname'] ?>admin/trangquantri.php?Admin=order_success");
            }).fail(err => {
                console.log(err);
            });
        })
        
        // scroll animate
        if($(window).width() <= 540){
            $(document).scroll(function(){
                $('.rq_swipe_r').css('display','block').fadeOut(1500);
            })
        }
    });

    function prd_cart_del() {
        let conf = confirm('Bạn có chắc muốn xoá ?');
        return conf;
    }
    function product_del() {
        let conf = confirm('Bạn có chắc muốn xoá, thông tin sản phẩm sẽ không lấy lại được ?');
        return conf;
    }
    
</Script>