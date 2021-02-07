// JavaScript Document
function lo(th,url)
{
	$.ajax(url,{cache:false,success: function(x){$(th).html(x)}})
}
function good(news,acc,type)
{
	$.post("api/good.php",{news,acc,type},function(res)
	{
		console.log(res);
		if(type=="1")
		{
			$("#vie"+news).text($("#vie"+news).text()*1+1)
			$("#news"+news).text("收回讚").attr("onclick","good('"+news+"','"+acc+"','2')")
		}
		else
		{
			$("#vie"+news).text($("#vie"+news).text()*1-1)
			$("#news"+news).text("讚").attr("onclick","good('"+news+"','"+acc+"','1')")
		}
	})
}