var $_GET = (function(){
    var url = window.document.location.href.toString();
    var u = url.split("?");
    if(typeof(u[1]) == "string"){
        u = u[1].split("&");
        var get = {};
        for(var i in u){
            var j = u[i].split("=");
            get[j[0]] = j[1];
        }
        return get;
    } else {
        return {};
    }
})();
layui.use('form', function(){
	var form = layui.form;
	form.on('select', function(data){
		$("#cid").change();
	});
});
layui.use('element', function(){
	var element = layui.element;
});
function activeselect(a){
	$('.active').removeClass('active');
	$(a).addClass('active')
}