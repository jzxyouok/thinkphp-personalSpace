/**
 * Created by Administrator on 2016/7/7.
 */
$(function(){
    message();
});

setInterval("message()",3600);
function message(){
    $.ajax({
        //提交数据的类型 POST GET
        type:"POST",
        //提交的网址
        url:ajaxGetMessageUrl,
        //提交的数据
        //返回数据的格式
        datatype: "json",//"xml", "html", "script", "json", "jsonp", "text".
        //在请求之前调用的函数
        success:function(data){
            if(data.state=='ok'){
                $('#getmessage').html(data.msg);
                $('#nomesscount').html(data.count);
            }else{ 
            }
        }
    });

}