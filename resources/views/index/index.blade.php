@include('public.header')
<style>
    .count {color: red;float: right}
    .meun_dd{float: left; background-color: #393d49; height: 100%; padding: 0;position: relative;}
    .meun_left{float: right; text-align: center; padding: 10px 0; font-size: 14px; width: 90%; background: #6988b0; color: #fff;border-radius:5px 0 0 5px;margin-top: 10px;}
    .meun_left:hover{ background: #1d8ee2;}
    .meun_left span{ cursor: pointer;}

    .meun_left div.twomeun,.meun_left div.twomeun div.threemeun{position: absolute;top: 0px;left:100%;width: 160px; height: 100%;background-color: #304a60; border-right:2px solid #fff;  z-index: 999; padding-top: 10px; letter-spacing:1px; font-weight: normal;}
    .meun_left div.twomeun div.title{float: left;color: #fff; width: 140px;text-align: left; padding-left: 20px; font-size: 14px; padding: 10px;cursor: pointer;}
    .meun_left div.twomeun div.title:hover{ background: #1d8ee2; color: #fff;}
    .meun_left div.twomeun,.meun_left div.twomeun div.threemeun{display: none;}
    .meun_left:hover div.twomeun/*,.meun_left div.twomeun div.title:hover div.threemeun*/{display: inline; }
    .meun_left div.twomeun div.threemeun{width: 140px; padding: 0 10px; background-color: #698194; box-shadow:5px 5px 10px rgba(0,0,0,0.5); padding-top: 10px;z-index: 998;}
    .meun_left div.twomeun div.threemeun p{ margin-top: 10px; text-align: left; font-size: 12px; line-height: 25px;}
    .meun_left div.twomeun div.threemeun p i{ color: #00ffa5;}
    .meun_left a{ color: #fff;}
    .meun_left a:hover{border-left:3px solid #1fc6f1; padding-left: 5px;}
    .hide{background: #fff;}
</style>
<script>
function toggle(obj) {
$(".hide").hide();
$(obj).children().show();
}
</script>
<body class="index">
<!-- 主体开始 -->
<div class="page-content" style="left: 0;top:0;">
    <div class="meun_dd" style="width:2%;">
        <div class="meun_left"><span>物<br>控<br>M<br>C</span>
            <div class="twomeun">
                <div class="title" onclick="toggle(this)">✣ 型材仓
                    <div class="threemeun hide" >
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('型材库存列表','{:url('material/twoAnalysis')}')">型材列表  </a></p>
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('添加出库单','{:url('material/addOutOrder')}')">添加出库单</a></p>
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('待出库列表','{:url('material/waitOutList')}')">待出库列表</a></p>
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('进出仓总帐','{:url('material/materialCollect')}')">进出仓总帐</a></p>
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('退货单&退料单','{:url('material/returnOrder')}')"> 退货单&退料单</a> <i>(3)</i></p>
                    </div>
                </div>
                <div class="title" onclick="toggle(this)">✣ 配件&辅料仓
                    <div class="threemeun hide">
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('配件&辅料列表','{:url('Partmaterial/stock')}')">辅料列表</a> <i>(3)</i></p>
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('入库清单','{:url('Partmaterial/dateCollect')}')">入库清单</a></p>
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('生成出库单','{:url('Partmaterial/storeOutOrder')}')">生成出库单</a></p>
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('待出库列表','{:url('Partmaterial/waitOutOrder')}')">待出库列表</a></p>
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('出库清单','{:url('Partmaterial/outlist')}')">出库清单</a></p>
                    </div>
                </div>
                <div class="title" onclick="toggle(this)">✣ 余料仓
                    <div class="threemeun hide">
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('余料列表','{:url('Material/surplusStock')}')">全部余料/添加余料</a></p>
                    </div>
                </div>
                <div class="title" onclick="toggle(this)">✣ 半/成品仓
                    <div class="threemeun hide">
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('全部入库列表','{:url('Product/storageList')}')">全部入库列表</a></p>
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('部分入库列表','{:url('Product/storageList')}?type=2')">部分入库列表</a> <i>({$product.part_into})</i></p>
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('整单入库列表','{:url('Product/storageList')}?type=1')">整单入库列表</a> <i>({$product.all_into})</i></p>
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('待发货单','{:url('Product/send')}')">待发货单</a> <i>({$product.send})</i></p>
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('历史出入汇总','{:url('Product/sendCollection')}')">历史出入汇总</a></p>
                    </div>
                </div>
                <div class="title" onclick="toggle(this)">✣ 采购/委外建议
                    <div class="threemeun hide">
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('型材预警','{:url('Suggest/material')}')">型材预警</a> <i>(3)</i></p>
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('配件&辅料预警','{:url('Suggest/partMaterial')}')">配件&辅料预警</a> <i>(3)</i></p>
                        <p><a href="javascript:void(0)">委外做色建议</a></p>
                    </div>
                </div>
                <div class="title" onclick="toggle(this)">✣ 采购管理
                    <div class="threemeun hide">
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('发起申购单','{:url('Book/storeIndex')}')">发起申购单</a></p>
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('待审核申购单列表','{:url('Book/waitCheck')}')">待审核申购单列表</a> <i>(3)</i></p>
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('待回厂列表','{:url('Book/waitBack')}')">待回厂列表</a> <i>(3)</i></p>
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('历史采购计划汇总','{:url('Book/collect')}')">历史采购计划汇总</a></p>
                    </div>
                </div>
                <div class="title" onclick="toggle(this)">✣ 委外管理
                    <div class="threemeun hide">
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('添加委外单','{:url('Outsourcing/storeIndex')}')">添加委外单</a></p>
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('待审核委外单列表','{:url('Outsourcing/waitCheck')}')">待审核委外单列表</a> <i>(3)</i></p>
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('委外中途列表','{:url('Outsourcing/workColorCollect')}')">委外中途列表</a> <i>(3)</i></p>
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('历史委外计划汇总','{:url('Outsourcing/historyCollect')}')">历史委外计划汇总</a></p>
                    </div>
                </div>
                <div class="title" onclick="toggle(this)">✣ 仓库盘点
                    <div class="threemeun hide">
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('型材盘点','{:url('Inventory/index')}')">型材汇总</a></p>
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('配件&辅料盘点','{:url('Inventory/partIndex')}')">配件&辅料汇总</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="meun_left">
            <a target="_blank" href="">
            <span>生<br>控<br>P<br>C</span>
            </a>
        </div>
        <div class="meun_left"><span>财<br>务</span>
            <div class="twomeun">
                <div class="title"  onclick="toggle(this)">✣ 订单管理
                    <div class="threemeun hide">
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('发货申请列表','{:url('Finance/sendApply')}')">发货申请列表</a> <i>(10)</i></p>
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('欠款已发货订单','{:url('Finance/arrears',array('type'=>1))}')">欠款已发货订单</a> <i>(3)</i></p>
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('历史发货汇总','{:url('Finance/arrears')}')">历史发货汇总</a></p>
                    </div>
                </div>
                <div class="title" onclick="toggle(this)">✣ 应收/应付管理
                    <div class="threemeun hide">
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('应收管理','{:url('Finance/ordernumPayment')}')">应收管理</a> <i>(1024)</i></p>
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('应付管理','{:url('Finance/materialPayment')}')">应付管理</a> <i>(1024)</i></p>
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('历史付款汇总','{:url('Finance/materialPayment')}?paid_status=1')">历史付款汇总</a></p>
                    </div>
                </div>
                <div class="title" onclick="toggle(this)">✣ 经销管理
                    <div class="threemeun hide">
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('经销商列表','{:url('Dealer/index')}')">经销商列表</a></p>
                    </div>
                </div>
                <div class="title" onclick="toggle(this)">✣ 物料报废
                    <div class="threemeun hide">
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('卖出记录','{:url('Scrap/index')}')">卖出记录</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="meun_left"><span>设<br>置</span>
            <div class="twomeun">
                <div class="title" onclick="toggle(this)">✣ 物料参数管理
                    <div class="threemeun hide">
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('型材列表','{:url('Bomlist/index')}')">型材列表</a></p>
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('配件&辅料列表','{:url('Bomlist/partbom')}')">配件&辅料列表</a></p>
                    </div>
                </div>
                <div class="title" onclick="toggle(this)">✣ 仓位/供应商
                    <div class="threemeun hide">
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('供应商列表','{:url('Supplier/index')}')">供应商列表</a></p>
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('仓位管理','{:url('Warehouse/index')}')">仓位管理</a></p>
                    </div>
                </div>
                <div class="title" onclick="toggle(this)">✣ 用户管理
                    <div class="threemeun hide">
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('用户列表','{:url('user/user')}')">用户列表</a></p>
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('用户列表','{:url('user/role')}')">角色组</a></p>
                    </div>
                </div>
                <div class="title" onclick="toggle(this)">✣ 系列管理
                    <div class="threemeun hide">
                        <p><a href="javascript:void(0)" onclick="xadmin.add_tab('系列列表','{:url('Series/index')}')">系列列表</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="meun_left"><span>状<br>态</span>
            <div class="twomeun">
                <div class="title">
                    <span style="font-size: 12px;">当前账号：</span>
                    <p style="font-size: 14px; line-height: 35px;color: #00ffa5;">{$Think.session.uname}</p>
                    <p><a href="{:url('switchUser')}">退出/切换账号</a></p>
                </div>

            </div>
        </div>
        <!---->
    </div>
    <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false" style="float: left; width: 98%;">
        <ul class="layui-tab-title">
            <li class="home">
                <i class="layui-icon">&#xe68e;</i>物控首页
            </li>
        </ul>
        <div class="layui-unselect layui-form-select layui-form-selected" id="tab_right">
            <dl>
                <dd data-type="this">关闭当前</dd>
                <dd data-type="other">关闭其它</dd>
                <dd data-type="all">关闭全部</dd>
            </dl>
        </div>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <iframe src="{{route('wukong')}}" frameborder="0" scrolling="yes" class="x-iframe"></iframe>
            </div>
        </div>
        <div id="tab_show"></div>
    </div>
</div>
<div class="page-content-bg"></div>
<!-- 主体结束 -->

</body>
<script type="text/javascript" src="/static/js/index.js"></script>
<script>
    layui.use(['layer','laydate','form'],function(){
        var laydate = layui.laydate,
            layer = layui.layer,
            form = layui.form;
    });
</script>
</html>
