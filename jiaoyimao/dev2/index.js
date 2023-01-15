    //显示交易选择
    function showBargain(){
        $('.module_box').toggle();
    }

    //点击选择交易类型
    $('#content_box li').click(function(){
        //获取分类名称
        var data = $(this).find("h4").text();
        //赋值分类名称
        $('#bargain_category').text(data);
        //获取分类id
        var category_id = $(this).find("h4").attr('category_id');
        // 赋值分类id
        $("input[name='category_id']").val(category_id);
        //隐藏选择框
        $('.module_box').toggle();
    })

    //提交表单
    function submitForm(){

        $("#form_1").submit();
    }


    // 支付页面JS
    // 支付页面倒计时
    function setTime(time){

        if (time === 0) {

            $('#time i').text('00:00');
            return false;
        } else {
            time--;
            // 将1800秒换错成时间格式
            var m = parseInt(time/60);
            if(m<10){
                m = '0'+m;
            }
            var s = parseInt(time%60);
            if(s<10){
                s = '0'+s;
            }
            $('#time').text(m+':'+s);
            setTimeout(function() {
                setTime(time);
            },1000);
        }

    }