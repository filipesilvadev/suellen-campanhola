// JavaScript Document
$(function() {
	$(".socialinsta, .socialface, .socialmail, .menuclinica, .menuservicos, .menucontato, .menudepoimentos, .menunoivas, .menuclipping, .menufaq, .homefone, .homelocal, .homedireitaimg, .homeesquerdaimg, .aclinicaimg01, .aclinicaimg02, .aclinicaimg03, .aclinicagaleria1, .aclinicagaleria2, .aclinicagaleria3, .imgservicos1, .imgservicos2, .imgservicos3, .imgservicos4, .imgservicos5, .imgservicos6, .imgservicos7, .plusservicos, .depoimentosimg01, .depoimentosimg02, .depoimentosimg03, .depoimentosimg04,")
	.find("span")
	.hide()
	.end()
	.hover(function() {
		$(this).find("span").stop(true, true).fadeIn();
	}, function() {
		$(this).find("span").stop(true, true).fadeOut();
	});
});