/**
 * ajax提交表单数据
 * @param string url 地址
 * @param string|array data 提交数据
 * @param int reload 刷新页面方式
 * @returns 
 */
function ajaxform(url, data,reload) {
    var index = layer.load(0,{time: 50*1000,shade:false});
    $.ajax({
        url: url, data: data, dataType: 'json',type:'post', success: function (obj) {
            layer.close(index);
            if (obj.code == 0) {
                layer.msg(obj.msg, {icon: 1, time: 1000}, function () {
                    // var index = parent.layer.getFrameIndex(window.name);// 获得frame索引
                    //跳转到后台输出的地址
                    if (obj.url != '') {
                        window.location.href = obj.url;
                        return;
                    }
                    //刷新当前页面
                    if (reload == 1) {
                        location.reload();
                        return;
                        //不刷新页面
                    } else if (reload == 2) {
                        // parent.layer.close(index);//关闭当前frame
                        return;
                    }
                    parent.location.reload(); //刷新父页面
                });
                return;
            }
            layer.msg(obj.msg, {icon: 2});
        },
        error: function (xhr) {
            layer.close(index);
            layer.msg('服务端请求异常',{icon: 2});
        }
    });

}


