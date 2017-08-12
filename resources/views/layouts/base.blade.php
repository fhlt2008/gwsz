<div class="alert alert-block alert-success">
    <button type="button" class="close" data-dismiss="alert">
        <i class="icon-remove"></i>
    </button>

    <i class="icon-ok green"></i>

    欢迎使用
    <strong class="red">
        岗位设置管理系统
        <small>(v1.0)</small>
    </strong>

</div>
<div class="panel panel-primary ">


    <div class="panel-heading"  onclick="initTable('table_gInfo',59,'管理')">
        <div class="row">
        <span class="col-md-11">管理岗</span><span class="badge badge-success col-md-1">点击显示详细信息……</span>

        </div>
    </div>

    <div class="panel-title">
        <table id = "table" class="center">
        </table>
    </div>

    <div id="myDiv" >
        <table class="table table-hover" id="table_gInfo"
               data-pagination="true"
               data-show-refresh="true"
               data-show-toggle="true"
               data-search="true"
               data-url="/index/59/管理"
               data-data-type="json"
               data-showColumns="true">
        </table>
    </div>

</div>

<div class="panel panel-primary " >
    <div class="panel-heading " onclick="initTable('table_zInfo',59,'专技')">
        <span>专技岗</span>

    </div>
    <div class="panel-title pre-scrollable">
        <table id ='table1' data-toggle="table" class="center">
            <tr class="warning">
                <td  rowspan="2" style="vertical-align: middle;"></td>
                <td  rowspan="2" onclick="initTable('table_zInfo',59,'专技',4)" style="vertical-align: middle;">4级</td>
                <td colspan="3" onclick="initTable('table_zInfo',59,'专技',5)" >五级<span class="red">小计</span><span class="green"></span></td>
                <td colspan="3" onclick="initTable('table_zInfo',59,'专技',6)" >六级</td>
                <td colspan="3" onclick="initTable('table_zInfo',59,'专技',7)" >七级</td>
                <td colspan="3" onclick="initTable('table_zInfo',59,'专技',[5,6,7])" >高级小计</td>
                <td colspan="3" onclick="initTable('table_zInfo',59,'专技',8)">八级</td>
                <td colspan="3" onclick="initTable('table_zInfo',59,'专技',9)">九级</td>
                <td colspan="3" onclick="initTable('table_zInfo',59,'专技',10)">十级</td>
                <td colspan="3" onclick="initTable('table_zInfo',59,'专技',[8,9,10])">一级小计</td>
                <td  rowspan="2" onclick="initTable('table_zInfo',59,'专技',11)" style="vertical-align: middle;">十一级</td>
                <td  rowspan="2" onclick="initTable('table_zInfo',59,'专技',12)" style="vertical-align: middle;">十二级</td>
                <td  rowspan="2" onclick="initTable('table_zInfo',59,'专技',13)" style="vertical-align: middle;">十三级</td>
                <td  rowspan="2" style="vertical-align: middle;">合计</td>
            </tr>
            <tr class="warning">

                <td>普通</td>
                <td>特聘</td>
                <td>乡村</td>
                <td>普通</td>
                <td>特聘</td>
                <td>乡村</td>
                <td>普通</td>
                <td>特聘</td>
                <td>乡村</td>
                <td>普通</td>
                <td>特聘</td>
                <td>乡村</td>
                <td>普通</td>
                <td>特聘</td>
                <td>乡村</td>
                <td>普通</td>
                <td>特聘</td>
                <td>乡村</td>
                <td>普通</td>
                <td>特聘</td>
                <td>乡村</td>
                <td>普通</td>
                <td>特聘</td>
                <td>乡村</td>


            </tr>
            <tr>
                <td>核准数</td>
                <td>{{$hzj0['p4']}}</td>
               @foreach($hzj1 as $m)
                    <td>{{$m}}</td>
                   @endforeach
                <td>{{$hzj1['p5']+$hzj1['p6']+$hzj1['p7']}}</td>
                <td>{{$hzj1['t5']+$hzj1['t6']+$hzj1['t7']}}</td>
                <td>{{$hzj1['x5']+$hzj1['x6']+$hzj1['x7']}}</td>
                @foreach($hzj2 as $m)
                    <td>{{$m}}</td>
                @endforeach
                <td>{{$hzj2['p8']+$hzj2['p9']+$hzj2['p10']}}</td>
                <td>{{$hzj2['t8']+$hzj2['t9']+$hzj2['t10']}}</td>
                <td>{{$hzj2['x8']+$hzj2['x9']+$hzj2['x10']}}</td>
                @foreach($hzj3 as $m)
                    <td>{{$m}}</td>
                @endforeach
                <td>0</td>


                <td>{{array_sum($hzj0)+array_sum($hzj1)+array_sum($hzj2)+array_sum($hzj3)}}</td>
            </tr>
            <tr>
                <td>聘用数</td>
                <td>{{$pzj0['p4']}}</td>
                @foreach($pzj1 as $m)
                    <td>{{$m}}</td>
                @endforeach
                <td>{{$pzj1['p5']+$pzj1['p6']+$pzj1['p7']}}</td>
                <td>{{$pzj1['t5']+$pzj1['t6']+$pzj1['t7']}}</td>
                <td>{{$pzj1['x5']+$pzj1['x6']+$pzj1['x7']}}</td>
                @foreach($pzj2 as $m)
                    <td>{{$m}}</td>
                @endforeach
                <td>{{$pzj2['p8']+$pzj2['p9']+$pzj2['p10']}}</td>
                <td>{{$pzj2['t8']+$pzj2['t9']+$pzj2['t10']}}</td>
                <td>{{$pzj2['x8']+$pzj2['x9']+$pzj2['x10']}}</td>
                @foreach($pzj3 as $m)
                    <td>{{$m}}</td>
                @endforeach
                <td>{{array_sum($pzj0)+array_sum($pzj1)+array_sum($pzj2)+array_sum($pzj3)}}</td>



            </tr>
            <tr>
                <td>空岗数</td>
                <td>{{$hzj0['p4']-$pzj0['p4']}}</td>
                @foreach($pzj1 as $key=>$m)
                    <td>{{$hzj1[$key]-$m}}</td>
                @endforeach
                <td>{{$hzj1['p5']+$hzj1['p6']+$hzj1['p7']-($pzj1['p5']+$pzj1['p6']+$pzj1['p7'])}}</td>
                <td>{{$hzj1['t5']+$hzj1['t6']+$hzj1['t7']-($pzj1['t5']+$pzj1['t6']+$pzj1['t7'])}}</td>
                <td>{{$hzj1['x5']+$hzj1['x6']+$hzj1['x7']-($pzj1['x5']+$pzj1['x6']+$pzj1['x7'])}}</td>
                @foreach($pzj2 as $key=>$m)
                    <td>{{$hzj2[$key]-$m}}</td>
                @endforeach
                <td>{{$hzj2['p8']+$hzj2['p9']+$hzj2['p10']-($pzj2['p8']+$pzj2['p9']+$pzj2['p10'])}}</td>
                <td>{{$hzj2['t8']+$hzj2['t9']+$hzj2['t10']-($pzj2['t8']+$pzj2['t9']+$pzj2['t10'])}}</td>
                <td>{{$hzj2['x8']+$hzj2['x9']+$hzj2['x10']-($pzj2['x8']+$pzj2['x9']+$pzj2['x10'])}}</td>
                @foreach($hzj3 as $key=>$m)
                    <td>{{$m-$pzj3[$key]}}</td>
                @endforeach
                <td></td>
                <td>{{array_sum($hzj0)+array_sum($hzj1)+array_sum($hzj2)-(array_sum($pzj0)+array_sum($pzj1)+array_sum($pzj2))}}</td>



            </tr>
        </table>

    </div>
    <div id="myDiv1" >
        <table class="table table-hover" id="table_zInfo"
               data-pagination="true"
               data-show-refresh="true"
               data-show-toggle="true"
               data-sortable="true"
               data-search="true">
        </table>
    </div>
</div>




<div class="panel panel-primary " >
    <div class="panel-heading " onclick="initTable('table_jInfo',59,'工勤')">
        <span>工勤</span>

    </div>
    <div class="panel-title">
        <table class="table table-bordered table-striped">
            <tr class="warning">
                <td></td>
                <td>二级</td>
                <td>三级</td>
                <td>四级</td>
                <td>五级</td>
                <td>普工</td>
                <td>合计</td>
            </tr>
            <tr>
                <td>核准数</td>
                @foreach($hgq as $value)
                    <td>{{$value}}</td>
                    @endforeach
                <td>{{array_sum($hgq)}}</td>

            </tr>
            <tr>
                <td>聘用数</td>
                @foreach($pgq as $value)
                    <td>{{$value}}</td>
                @endforeach
                <td>{{array_sum($pgq)}}</td>
            </tr>
        </table>
    </div>
    <div id="myDiv2"  >
        <table class="table table-hover" id="table_jInfo"
               data-pagination="true"
               data-show-refresh="true"
               data-show-toggle="true"
               data-sortable="true"
               data-showColumns="true">
        </table>
    </div>
</div>


<div class="modal fade" id="modalTable" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">信息编辑</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="editInfo">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="tel" class="form-control" id="inputEmail3" >
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" >保存修改</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
        <div id="toolbar">
            <a href="javascript:void(0);" class="btn btn-primary btn-xs" onclick="resource_addWindow('');"><i class="icon iconfont"></i>新增</a>
            <a href="javascript:void(0);" class="btn btn-danger btn-xs" onclick="wf.resource_delete();"><i class="icon iconfont"></i>删除</a>
        </div>


<script type="text/javascript">
    jQuery('#toolbar').hide();
    $('#toolbar').click(function () {
        alert($(this).parent().parent().parent().html());

    })

    function initTable(id,code,type,level) {
        var level = arguments[3] ? arguments[3] : 0
        $.ajax({
            url: "/index/" + code + "/" + type + "/"+level,
            type: "get",
            dataType: "json",
            success: function (data) {
                $('#toolbar').show();
                var columns=[ {title: '姓名', field: '姓名1'}, {
                    title: '聘任岗位',
                    field: '聘任岗位'
                }, {title: '聘任等级', field: '聘任等级'}, {title: '身份证号', field: '身份证号'}, {
                    title: '参加工作年月',
                    field: '参加工作年月'
                }, {title: '学历', field: '学历'}, {title: '已获专技职务', field: '已获专技职务'}, {
                    title: '其他需要补充说明的事项',
                    visible:false,
                    field: '其他需要补充说明的事项'
                }];
                $('#'+id).bootstrapTable('destroy');
                $('#'+id).bootstrapTable({
                    columns: columns,
                    data: data,
                    toolbar: '#toolbar',
                    showColumns:true,
                    onDblClickRow: function (row) {
                        InitSubTable(row);
                    },

                });
            }
        });
    }

    function obj_str(obj){
        var str="";
        for(var p in obj){
            if(typeof(obj)=='object'){
                obj_str(p);
            }
            else{
                str+= p+":"+obj[p]+";"
            }
        }
        return str;
    }

    //初始化子表格(无线循环)
    function InitSubTable (row) {

        $('#modalTable').modal();
        alert($('#modalTable').html());
        jQuery('#modal-table').bootstrapTable({
            columns:[{title:'编号',field:'id'},{field:'name',title:'姓名'}],
            data:[{id:5,name:'otb'}]

        });
    }

   var cols= [[{field:'name',title:'df',rowspan:3},
        {valign:'middle',align:'center',title:'\u516d\u7ea7',field:'g6',rowspan:3},
        {valign:'middle',align:'center',title:'\u4e03\u7ea7',field:'g7',rowspan:3},
        {valign:'middle',align:'center',title:'\u516b\u7ea7',field:'g8',rowspan:3},
        {valign:'middle',align:'center',title:'\u4e5d\u7ea7',field:'g9',rowspan:3},
        {valign:'middle',align:'center',title:'\u5408\u8ba1',field:'gSum',rowspan:3},
        {valign:'middle',align:'center',title:'\u5176\u4e2d\u53cc\u80a9\u6311',colspan:9}
    ],
        [{valign:'middle',align:'center',title:'\u9ad8\u7ea7',colspan:3},
            {valign:'middle',align:'center',title:'\u4e00\u7ea7',colspan:3},
            {valign:'middle',align:'center',title:'\u4e8c\u7ea7',colspan:2},
            {valign:'middle',align:'center',title:'\u5c0f\u8ba1',rowspan:2}],
        [{valign:'middle',align:'center',title:'\u4e94\u7ea7',field:'s5'},
            {valign:'middle',align:'center',title:'\u516d\u7ea7',field:'s6'},
            {valign:'middle',align:'center',title:'\u4e03\u7ea7',field:'s7'},
            {valign:'middle',align:'center',title:'\u516b\u7ea7',field:'s8'},
            {valign:'middle',align:'center',title:'\u4e5d\u7ea7',field:'s9'},
            {valign:'middle',align:'center',title:'\u5341\u7ea7',field:'s10'},
            {valign:'middle',align:'center',title:'\u5341\u4e00\u7ea7',field:'s11'},
            {title:'\u5341\u4e8c\u7ea7',field:'s12'}
        ]
    ];
    jQuery('#table').bootstrapTable({
        columns:cols,
        data: [
            {
                @foreach($hgl as $key =>$value)
                        {{$key.":".$value.","}}
                        @endforeach

                        @foreach($psjt as $key =>$value)
                        {{$key.":".$value.","}}
                        @endforeach
                name: '核准数',
                gSum: "{{array_sum($hgl)}}",
                sSum: "{{array_sum($psjt)}}"
            },
            {
                @foreach($pgl as $key =>$value)
                        {{$key.":".$value.","}}
                        @endforeach

                        @foreach($psjt as $key =>$value)
                        {{$key.":".$value.","}}
                        @endforeach
                name: '聘用数',
                gSum: "{{array_sum($pgl)}}",
                sSum: "{{array_sum($psjt)}}"

            }
        ]

    });





</script>


<!-- /row -->
