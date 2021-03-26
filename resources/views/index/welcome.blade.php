@include('public.header')
<style>
    .center{text-align: center;padding: 15px 0;}
    .header-span span{margin: 0 1%;float: right;}
    .total-span>span{margin: 0 3%}
    .time{ width: 10%;display: inline;float: right;margin: 5px;}
    .time2{ width: 15%;display: inline;float: right;margin: 5px;}
    .right{float: right;}
    .top{font-size: 13px;height: 32px;line-height: 30px;}
    .active{ color:red;}
    .tactive{ color:#1E9FFF}
</style>
<body>
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
<!--            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-body ">
                        <blockquote class="layui-elem-quote">欢迎管理员：
                            <span class="x-red">test</span>！当前时间:<?php echo date('Y-m-d H:i:s',time());?>
                        </blockquote>
                    </div>
                </div>
            </div>-->
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-header header-span all-count">
                        <a href="javascript:void(0)" class="layui-btn" id="total_btn" style="float: right;margin-top: 5px;">查询</a>
                        <input type="text" name="total_end" id="total_end" autocomplete="off" class="layui-inline layui-input time">
                        <input type="text" name="total_start" id="total_start" autocomplete="off" class="layui-inline layui-input time">
                        <span attr="year">今年</span>
                        <span attr="month">本月</span>
                        <span attr="week">本周</span>                            
                        <span attr="today" class="active">今日</span>

                    </div>
                    <div class="layui-card-body ">
                        <ul class="layui-row layui-col-space10 layui-this x-admin-carousel x-admin-backlog">
                            <li class="layui-col-md2">
                                <a href="javascript:;" class="x-admin-backlog-body">
                                    <h3>总销售金额</h3>
                                    <p class="center"><cite >¥:<span id="all_money">0</span></cite></p>
                                    <hr>
                                    <p>日均销售金额 ¥:<span id="amoney">0</span></p>
                                </a>
                            </li>
                            <li class="layui-col-md2">
                                <a href="javascript:;" class="x-admin-backlog-body">
                                    <h3>已收款总金额</h3>
                                    <p class="center"><cite >¥:<span id="all_have">0</span></cite></p>
                                    <hr>
                                    <p>日均收款金额 ¥:<span id="ahave">0</span></p>
                                </a>
                            </li>
                            <li class="layui-col-md2">
                                <a href="javascript:;" class="x-admin-backlog-body">
                                    <h3>未收款总金额</h3>
                                    <p class="center"><cite >¥:<span id="all_no">0</span></cite></p>
                                    <hr>
                                    <p>日均未收款金额 ¥:<span id="ano">0</span></p>
                                </a>
                            </li>
                            <li class="layui-col-md2">
                                <a href="javascript:;" class="x-admin-backlog-body">
                                    <h3>总订单数</h3>
                                    <p class="center"><cite><span id="all_order">0</span></cite></p>
                                    <hr>
                                    <p>日均订单数 <span id="aorder">0</span></p>
                                </a>
                            </li>
                            <li class="layui-col-md2">
                                <a href="javascript:;" class="x-admin-backlog-body">
                                    <h3>总销售产品数</h3>
                                    <p class="center"><cite><span id="all_product">0</span></cite></p>
                                    <hr>
                                    <p>日均销售产品数 <span id="all_product">0</span></p>
                                </a>
                            </li>
                            <li class="layui-col-md2">
                                <a href="javascript:;" class="x-admin-backlog-body">
                                    <h3>总门窗面积数</h3>
                                    <p class="center"><cite><span id="all_area">0</span></cite></p>
                                    <hr>
                                    <p>日均门窗面积数 <span id="aarea">0</span></p>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="layui-col-md12">
                <div class="layui-card" style="height: 450px;">
                    <div class="layui-card-header total-span">
                        <span class='total-type tactive' attr="total_price">销售额</span>
                        <span class='total-type' attr="id">订单数</span>
                        <span class='total-type' attr="count">销售产品</span>                            
                        <span class='total-type' attr="area">门窗面积</span>
                        
                        <div class="header-span delaer-title" style="display: inline;">
                            <a href="javascript:void(0)" class="layui-btn" id="dealer_btn" style="float: right;margin-top: 5px;">查询</a>
                            <input type="text" name="dealer-endtime" id="dealer-endtime" autocomplete="off" class="layui-inline layui-input time">
                            <input type="text" name="dealer-starttime" id="dealer-starttime" autocomplete="off" class="layui-inline layui-input time">
                            <span attr="year">今年</span>
                            <span attr="month">本月</span>
                            <span attr="week" class="tactive">本周</span>                            
                            <span attr="today">今日</span>
                        </div>
                    </div>
                    <div class="layui-card-body">
                        <div id="main" style="width: 60%;height:400px;display: inline-block;float: left;"></div>
                        <div class="layui-col-md4 dealer-box" style="display: inline-block;">
                            <p class="top">门店销售排名</p>
                            {volist name='dealer' id='v'}
                            <p class="top">{$i}.{$v.dealer_name}店<span class="right">{$v.total}</span></p>
                            {/volist}
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="layui-col-md6">
                <div class="layui-card" style="height: 450px;">
                    <div class="layui-card-header header-span sales-title">
                        <h4 style="float:left;">销售额类别占比</h4>
                         <a href="javascript:void(0)" class="layui-btn" id="sales_btn" style="float: right;margin-top: 5px;">查询</a>
                        <input type="text" name="sales-endtime" id="sales-endtime" autocomplete="off" class="layui-inline layui-input time2">
                        <input type="text" name="sales-starttime" id="sales-starttime" autocomplete="off" class="layui-inline layui-input time2">
                        <span attr="year">今年</span>
                        <span attr="month">本月</span>
                        <span attr="week" class="tactive">本周</span>                            
                        <span attr="today">今日</span>

                    </div>
                    <div class="layui-card-body ">
                        <div id="sales-percent" style="width: 100%;height:400px;display: inline-block;float: left;"></div>

                    </div>
                </div>                
            </div>
            <div class="layui-col-md6">
                <div class="layui-card" style="height: 450px;">
                    <div class="layui-card-header header-span order-title">
                        <h4 style="float:left;">订单数类别占比</h4>
                         <a href="javascript:void(0)" class="layui-btn" id="order_btn" style="float: right;margin-top: 5px;">查询</a>
                        <input type="text" name="order-endtime" id="order-endtime" autocomplete="off" class="layui-inline layui-input time2">
                        <input type="text" name="order-starttime" id="order-starttime" autocomplete="off" class="layui-inline layui-input time2">
                        <span attr="year">今年</span>
                        <span attr="month">本月</span>
                        <span attr="week" class="tactive">本周</span>                            
                        <span attr="today">今日</span>

                    </div>
                    <div class="layui-card-body ">
                        <div id="order-percent" style="width: 100%;height:400px;display: inline-block;float: left;"></div>

                    </div>
                </div>                
            </div>
            <div class="layui-col-md6">
                <div class="layui-card" style="height: 450px;">
                    <div class="layui-card-header header-span product-title">
                        <h4 style="float:left;">销售产品类别占比</h4>
                        <a href="javascript:void(0)" class="layui-btn" id="product_btn" style="float: right;margin-top: 5px;">查询</a>
                        <input type="text" name="product-endtime" id="product-endtime" autocomplete="off" class="layui-inline layui-input time2">
                        <input type="text" name="product-starttime" id="product-starttime" autocomplete="off" class="layui-inline layui-input time2">
                        <span attr="year">今年</span>
                        <span attr="month">本月</span>
                        <span attr="week" class="tactive">本周</span>                            
                        <span attr="today">今日</span>

                    </div>
                    <div class="layui-card-body ">
                        <div id="product-percent" style="width: 100%;height:400px;display: inline-block;float: left;"></div>

                    </div>
                </div>                
            </div>
            <div class="layui-col-md6">
                <div class="layui-card" style="height: 450px;">
                    <div class="layui-card-header header-span area-title">
                        <h4 style="float:left;">门窗面积类别占比</h4>
                        <a href="javascript:void(0)" class="layui-btn" id="area_btn" style="float: right;margin-top: 5px;">查询</a>
                        <input type="text" name="area-endtime" id="area-endtime" autocomplete="off" class="layui-inline layui-input time2">
                        <input type="text" name="area-starttime" id="area-starttime" autocomplete="off" class="layui-inline layui-input time2">
                        <span attr="year">今年</span>
                        <span attr="month">本月</span>
                        <span attr="week" class="tactive">本周</span>                            
                        <span attr="today">今日</span>

                    </div>
                    <div class="layui-card-body ">
                        <div id="area-percent" style="width: 100%;height:400px;display: inline-block;float: left;"></div>

                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>
</body>
<script>layui.use(['laydate', 'form', 'layer'],
            function () {
                var laydate = layui.laydate;
                var form = layui.form;
                var layer = layui.layer;
                $ = layui.jquery;

                lay('.time').each(function () {
                    laydate.render({
                        elem: this
                        , trigger: 'click'
                    });
                });
                lay('.time2').each(function () {
                    laydate.render({
                        elem: this
                        , trigger: 'click'
                    });
                });


            });



</script>
<script src="__STATIC__/js/jquery.min.js" charset="utf-8"></script>
<script src="__STATIC__/js/echarts.min.js" charset="utf-8"></script>
<script>
    $(function(){
       //概况统计-初次加载
       total({type:'today'});

        //概况统计
        $('.all-count span').click(function(){
            $('.all-count span').removeClass('active');
            $(this).addClass('active');
            var type = $(this).attr('attr');
            total({type:type});

        })
        //概况统计--区间筛选
        $('#total_btn').click(function(){
            if($('#total_start').val() == '' || $('#total_end').val()==''){
                layer.msg("请填写开始时间和结束时间",{icon:2});
                return;
            }
            total({type:'btn',start:$('#total_start').val(),end:$('#total_end').val()})
        })
        
        function total(data){
             $.post("{:url('index/count')}",data,function(obj){  
                 var obj = obj.data;
                  $('#all_money').text(obj.money);
                  $('#amoney').text(obj.averageMoney);
                  $('#all_have').text(obj.havePay);
                  $('#ahave').text(obj.averageHave);
                  $('#all_no').text(obj.noPay);
                  $('#ano').text(obj.averageNo);
                  $('#all_product').text(obj.product);
                  $('#aproduct').text(obj.averageProduct);
                  $('#all_order').text(obj.order);
                  $('#aorder').text(obj.averageOrder);
                  $('#all_area').text(obj.area);
                  $('#aarea').text(obj.averageArea);
             },'json'); 
        }
        
        //柱状图统计 点击效果
        $('.total-span>span').click(function(){
            $('.total-span span').removeClass('tactive');
            $(this).addClass('tactive');
        })
        
        //门店销售统计
        $('.delaer-title span').click(function(){
            $('.delaer-title span').removeClass('tactive');
            $(this).addClass('tactive');
            $.post("{:url('dealerCount')}",{type:$(this).attr('attr')},function(obj){
                var data = obj.data;
                var html = '<p class="top">门店销售排名</p>';
                for(i=0;i<data.length;i++){
                    html +="<p class='top'>"+data[i]['dealer_name']+"<span class='right'>"+data[i]['total']+"</span></p>";
                }                       
                $('.dealer-box').html(html);
            },'json'); 
        })
        //门店销售统计--区间筛选
        $('#dealer_btn').click(function(){
            $('.delaer-title span').removeClass('tactive');
            if($('#dealer-starttime').val() == '' || $('#dealer-endtime').val()==''){
                layer.msg("请填写开始时间和结束时间",{icon:2});
                return;
            }
            $.post("{:url('dealerCount')}",{type:'btn',start:$('#dealer-starttime').val(),end:$('#dealer-endtime').val()},function(obj){
                var data = obj.data;
                var html = '<p class="top">门店销售排名</p>';
                for(i=0;i<data.length;i++){
                    html +="<p class='top'>"+data[i]['dealer_name']+"<span class='right'>"+data[i]['total']+"</span></p>";
                }                       
                $('.dealer-box').html(html);
            },'json'); 
        })
    })
</script>
<script>

//初始化柱状图
var myChart = echarts.init(document.getElementById('main'));
// 指定图表的配置项和数据
var dataAxis = ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'];
let data = {$result};
var yMax = {$max};
var dataShadow = [];

for (var i = 0; i < data.length; i++) {
    dataShadow.push(yMax);
}

option = {
    title: {
        text: '销售额',
    },
    tooltip : {
        trigger: 'axis',
        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
            type : 'line'        // 默认为直线，可选为：'line' | 'shadow'
        }
    },
    xAxis: {
        data: dataAxis,
        axisLabel: {
            inside: true,
            textStyle: {
                color: '#fff'
            }
        },
        axisTick: {
            show: false
        },
        axisLine: {
            show: false
        },
        z: 10
    },
    yAxis: {
        axisLine: {
            show: false
        },
        axisTick: {
            show: false
        },
        axisLabel: {
            textStyle: {
                color: '#999'
            }
        }
    },
    dataZoom: [
        {
            type: 'inside'
        }
    ],
    series: [
        { // For shadow
            type: 'bar',
            itemStyle: {
                normal: {color: 'rgba(0,0,0,0.05)'}
            },
            barGap:'-100%',
            barCategoryGap:'40%',
//            data: dataShadow,
            animation: false
        },
        {
            type: 'bar',
            itemStyle: {
                normal: {
                    color: new echarts.graphic.LinearGradient(
                        0, 0, 0, 1,
                        [
                            {offset: 0, color: '#83bff6'},
                            {offset: 0.5, color: '#188df0'},
                            {offset: 1, color: '#188df0'}
                        ]
                    )
                },
                emphasis: {
                    color: new echarts.graphic.LinearGradient(
                        0, 0, 0, 1,
                        [
                            {offset: 0, color: '#2378f7'},
                            {offset: 0.7, color: '#2378f7'},
                            {offset: 1, color: '#83bff6'}
                        ]
                    )
                }
            },
            data: data
        }
    ]
};

// 鼠标点击放大
var zoomSize = 6;
myChart.on('click', function (params) {
    myChart.dispatchAction({
        type: 'dataZoom',
        startValue: dataAxis[Math.max(params.dataIndex - zoomSize / 2, 0)],
        endValue: dataAxis[Math.min(params.dataIndex + zoomSize / 2, data.length - 1)]
    });
});
myChart.setOption(option); 
window.onresize = myChart.resize;

//异步更改柱状图数据
$('.total-type').click(function(){
      var title = $(this).text();  //标题
      $.post("{:url('index/sales')}",{field:$(this).attr('attr')},function(obj){  
            
            var yMax = obj.data.max;   //最大值
            var data = obj.data.data;
            var dataShadow = [];

            for (var i = 0; i < data.length; i++) {
                dataShadow.push(yMax);
            }
            myChart.setOption({
                title: {
                    text: title,
                },
                series: [
                { // For shadow
                    type: 'bar',
                    itemStyle: {
                        normal: {color: 'rgba(0,0,0,0.05)'}
                    },
                    barGap:'-100%',
                    barCategoryGap:'40%',
//                    data: dataShadow,
                    animation: false
                },
                {
                    type: 'bar',
                    itemStyle: {
                        normal: {
                            color: new echarts.graphic.LinearGradient(
                                0, 0, 0, 1,
                                [
                                    {offset: 0, color: '#83bff6'},
                                    {offset: 0.5, color: '#188df0'},
                                    {offset: 1, color: '#188df0'}
                                ]
                            )
                        },
                        emphasis: {
                            color: new echarts.graphic.LinearGradient(
                                0, 0, 0, 1,
                                [
                                    {offset: 0, color: '#2378f7'},
                                    {offset: 0.7, color: '#2378f7'},
                                    {offset: 1, color: '#83bff6'}
                                ]
                            )
                        }
                    },
                    data: data
                }
    ]});
       },'json');

})
</script>
<script>
     var sales = echarts.init(document.getElementById('sales-percent'),'light');
     var order = echarts.init(document.getElementById('order-percent'),'light');
     var product = echarts.init(document.getElementById('product-percent'),'light');
     var area = echarts.init(document.getElementById('area-percent'),'light');

option = {
    tooltip: {
        trigger: 'item',
        formatter: "{a} <br/>{b}: {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        x: 'left',
        data:[{volist name='sales' id='v'}'{$v.name}-{$v.series_name}',{/volist}]
    },
    series: [
        {
            name:'销售占比',
            type:'pie',
            radius: ['50%', '70%'],
            avoidLabelOverlap: false,
            label: {
                normal: {
                    show: false,
                    position: 'center'
                },
                emphasis: {
                    show: true,
                    textStyle: {
                        fontSize: '25',
                        fontWeight: 'bold'
                    }
                }
            },
            labelLine: {
                normal: {
                    show: false
                }
            },
            data:[
                {volist name='sales' id='v'}
                {value:{$v.all_price}, name:'{$v.name}-{$v.series_name}'},
                {/volist}
               
            ]
        }
    ]
};
orderOption = {
    tooltip: {
        trigger: 'item',
        formatter: "{a} <br/>{b}: {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        x: 'left',
        data:[{volist name='order_list' id='v'}'{$v.name}-{$v.series_name}',{/volist}]
    },
    series: [
        {
            name:'订单数类别占比',
            type:'pie',
            radius: ['50%', '70%'],
            avoidLabelOverlap: false,
            label: {
                normal: {
                    show: false,
                    position: 'center'
                },
                emphasis: {
                    show: true,
                    textStyle: {
                        fontSize: '25',
                        fontWeight: 'bold'
                    }
                }
            },
            labelLine: {
                normal: {
                    show: false
                }
            },
            data:[
                {volist name='order_list' id='v'}
                {value:{$v.count}, name:'{$v.name}-{$v.series_name}'},
                {/volist}
               
            ]
        }
    ]
};
productOption = {
    tooltip: {
        trigger: 'item',
        formatter: "{a} <br/>{b}: {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        x: 'left',
        data:[{volist name='product_list' id='v'}'{$v.name}-{$v.series_name}',{/volist}]
    },
    series: [
        {
            name:'销售产品类别占比',
            type:'pie',
            radius: ['50%', '70%'],
            avoidLabelOverlap: false,
            label: {
                normal: {
                    show: false,
                    position: 'center'
                },
                emphasis: {
                    show: true,
                    textStyle: {
                        fontSize: '25',
                        fontWeight: 'bold'
                    }
                }
            },
            labelLine: {
                normal: {
                    show: false
                }
            },
            data:[
                {volist name='product_list' id='v'}
                {value:{$v.count}, name:'{$v.name}-{$v.series_name}'},
                {/volist}
               
            ]
        }
    ]
};
areaOption = {
    tooltip: {
        trigger: 'item',
        formatter: "{a} <br/>{b}: {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        x: 'left',
        data:[{volist name='area_list' id='v'}'{$v.name}-{$v.series_name}',{/volist}]
    },
    series: [
        {
            name:'门窗面积类别占比',
            type:'pie',
            radius: ['50%', '70%'],
            avoidLabelOverlap: false,
            label: {
                normal: {
                    show: false,
                    position: 'center'
                },
                emphasis: {
                    show: true,
                    textStyle: {
                        fontSize: '25',
                        fontWeight: 'bold'
                    }
                }
            },
            labelLine: {
                normal: {
                    show: false
                }
            },
            data:[
                {volist name='area_list' id='v'}
                {value:{php}echo round($v['area'],2);{/php}, name:'{$v.name}-{$v.series_name}'},
                {/volist}
               
            ]
        }
    ]
};
sales.setOption(option);
product.setOption(productOption);
order.setOption(orderOption);
area.setOption(areaOption);

//多图表自适应-防止刷新irame导致的宽度过小
window.addEventListener("resize", function () {
    myChart.resize();
    sales.resize();
    product.resize();
    order.resize();
    area.resize();
});

//销售额占比
$('.sales-title span').click(function(){
    $('.sales-title span').removeClass('tactive');
    $(this).addClass('tactive');
    set_option("{:url('salesCount')}",{type:$(this).attr('attr')},'销售额占比',sales);
})    
//销售额占比--区间筛选
$('#sales_btn').click(function(){
    $('.sales-title span').removeClass('tactive');
    if($('#sales-starttime').val() == '' || $('#sales-endtime').val()==''){
        layer.msg("请填写开始时间和结束时间",{icon:2});
        return;
    }
    set_option("{:url('salesCount')}",{type:'btn',start:$('#sales-starttime').val(),end:$('#sales-endtime').val()},'销售额占比',sales);
})

//订单数类别占比
$('.order-title span').click(function(){
    $('.order-title span').removeClass('tactive');
    $(this).addClass('tactive');
    set_option("{:url('orderCount')}",{type:$(this).attr('attr')},'订单数类别占比',order);
})    
//订单数类别占比--区间筛选
$('#order_btn').click(function(){
    $('.order-title span').removeClass('tactive');
    if($('#order-starttime').val() == '' || $('#order-endtime').val()==''){
        layer.msg("请填写开始时间和结束时间",{icon:2});
        return;
    }
    set_option("{:url('orderCount')}",{type:'btn',start:$('#order-starttime').val(),end:$('#order-endtime').val()},'销售额占比',order);
})

//订单产品类别占比
$('.product-title span').click(function(){
    $('.product-title span').removeClass('tactive');
    $(this).addClass('tactive');
    set_option("{:url('productCount')}",{type:$(this).attr('attr')},'订单产品类别占比',product);
})    
//订单产品类别占比--区间筛选
$('#product_btn').click(function(){
    $('.product-title span').removeClass('tactive');
    if($('#product-starttime').val() == '' || $('#product-endtime').val()==''){
        layer.msg("请填写开始时间和结束时间",{icon:2});
        return;
    }
    set_option("{:url('productCount')}",{type:'btn',start:$('#product-starttime').val(),end:$('#product-endtime').val()},'订单产品类别占比',product);
})

//面积类别占比
$('.area-title span').click(function(){
    $('.area-title span').removeClass('tactive');
    $(this).addClass('tactive');
    set_option("{:url('areaCount')}",{type:$(this).attr('attr')},'面积类别占比',area);
})    
//订单产品类别占比--区间筛选
$('#area_btn').click(function(){
    $('.area-title span').removeClass('tactive');
    if($('#area-starttime').val() == '' || $('#area-endtime').val()==''){
        layer.msg("请填写开始时间和结束时间",{icon:2});
        return;
    }
    set_option("{:url('areaCount')}",{type:'btn',start:$('#area-starttime').val(),end:$('#area-endtime').val()},'面积类别占比',area);
})
function set_option(url,data,title,dom){
    $.post(url,data,function(obj){
        dom.setOption({
            legend: {
                orient: 'vertical',
                x: 'left',
                data:obj.data.title
            },
            series: [
                {
                    name:title,
                    data:obj.data.value
                }
            ]
        });
    },'json');
}

</script>
</html>