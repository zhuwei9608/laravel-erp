
@include('public.header')
<link rel="stylesheet" href="/static/css/login.css">
<body class="login-bg">

<div class="login layui-anim layui-anim-up">
    <div class="message">智管数字化工厂管理平台</div>
    <div id="darkbannerwrap"></div>

    <form method="post" class="layui-form" >
        <input name="email" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
        <hr class="hr15">
        <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
        <hr class="hr15">
        <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
        <hr class="hr20" >
        {{csrf_field()}}
    </form>
</div>
<script>

    layui.use('form', function(){
        $ = layui.jquery;
        var form = layui.form;
        //监听提交表单
        form.on('submit(login)',
            function (data) {
                $.post("{{route('checklogin')}}",data.field,function(obj){
                    if(obj.code == 1){
                        layer.msg(obj.msg,{icon:2});
                        return;
                    }
                    layer.msg(obj.msg,{icon:1,time:1000},function(){
                        location.href = obj.url;
                    })
                },'json')
                return false;
            });

    });

</script>

</body>
</html>