<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>订阅者列表</title>

    <link href="//cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>

<body>
<div class="panel-group">
    <div class="panel panel-primary">
        <div class="panel-heading">
            列表
        </div>
        <div class="panel-body">
            <div class="list-op" id="list_op">
                <button type="button" class="btn btn-default btn-sm" id="btn-send">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>发送
                </button>
            </div>
        </div>
        <div class="panel-body">
            发送标题:<input type="text" id="title"/>
        </div>
        <div class="panel-body">
            发送内容:<textarea rows="10" cols="100" id="content"></textarea>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
            <tr class="success">
                <th>姓名</th>
                <th>邮箱</th>
            </tr>
            </thead>
            <tbody>
            @foreach($subscribes as $subscribe)
                <tr>
                    <td><input type="checkbox" name="checkItem" data-id="{{$subscribe['id']}}"/></td>
                    <td>
                        {{$subscribe['name']}}
                    </td>
                    <td>
                        {{$subscribe['email']}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div><!-- end of panel -->
</div>
<script>
    $(function(){
        function initTableCheckbox() {
            var $thr = $('table thead tr');
            var $checkAllTh = $('<th><input type="checkbox" id="checkAll" name="checkAll" /></th>');
            /*将全选/反选复选框添加到表头最前，即增加一列*/
            $thr.prepend($checkAllTh);
            /*“全选/反选”复选框*/
            var $checkAll = $thr.find('input');
            $checkAll.click(function(event){
                /*将所有行的选中状态设成全选框的选中状态*/
                $tbr.find('input').prop('checked',$(this).prop('checked'));
                /*并调整所有选中行的CSS样式*/
                if ($(this).prop('checked')) {
                    $tbr.find('input').parent().parent().addClass('warning');
                } else{
                    $tbr.find('input').parent().parent().removeClass('warning');
                }
                /*阻止向上冒泡，以防再次触发点击操作*/
                event.stopPropagation();
            });
            /*点击全选框所在单元格时也触发全选框的点击操作*/
            $checkAllTh.click(function(){
                $(this).find('input').click();
            });
            var $tbr = $('table tbody tr');
//            var $checkItemTd = $('<td><input type="checkbox" name="checkItem" /></td>');
            /*每一行都在最前面插入一个选中复选框的单元格*/
//            $tbr.prepend($checkItemTd);
            /*点击每一行的选中复选框时*/
            $tbr.find('input').click(function(event){
                /*调整选中行的CSS样式*/
                $(this).parent().parent().toggleClass('warning');
                /*如果已经被选中行的行数等于表格的数据行数，将全选框设为选中状态，否则设为未选中状态*/
                $checkAll.prop('checked',$tbr.find('input:checked').length == $tbr.length ? true : false);
                /*阻止向上冒泡，以防再次触发点击操作*/
                event.stopPropagation();
            });
            /*点击每一行时也触发该行的选中操作*/
            $tbr.click(function(){
                $(this).find('input').click();
            });
        }
        initTableCheckbox();


        $('#btn-send').click(function () {
            var id = [];
            $("input[name='checkItem']:checkbox:checked").each(function(){
                  id.push($(this).data('id'));
            })

            if(id.length > 0){
                var title = $('#title').val();
                var content = $('#content').val();

                if(title == "" || content == ""){
                    alert('请输入标题和内容');
                    return false;
                }



                $.post("/api/results/sendemail", {ids:id.join(","),title:title,content:content},function(data) {
                    if(data.status == 200){
                        alert('发送成功');
                        return;
                    }else{
                        alert(data.msg);
                    }
                });
            }else{
                alert('请选择发送人员;')
                return false;
            }
        });
    });
</script>
</body>
</html>