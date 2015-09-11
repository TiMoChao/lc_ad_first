//初始化editArea 的一些配置，如：类型，语言

var init_lan = 'zh';

editAreaLoader.init({
	id : "textarea_1"		// textarea id
	,syntax: init_syn			// syntax to be uses for highgliting
	,start_highlight: true		// to display with highlight mode on start-up
	,language : init_lan
});