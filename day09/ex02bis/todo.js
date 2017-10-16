function create(text, type) {
	if (text)
	{
		if (text.indexOf(",") !== -1)
			alert("to work properly, todo should not contain coma (\",\")");
		else
		{
			if (type == 1)
				$('<div id="todo" class="todo">' + text + '</div>').appendTo('#ft_list');
			else
				$('<div id="todo" class="todo">' + text + '</div>').prependTo('#ft_list');
		}
	}
}

function add() {
	var text = prompt('New todo :');

	if (text)
		create(text, 0);
}

function store() {
	var s = "list=";
	var node = document.getElementById('ft_list').childNodes;
	for (i in node)
	{
		if (typeof node[i].textContent != 'undefined' && node[i].textContent != '\n')
		{
			var text = node[i].textContent;
			text = text.match(/^\s*(.*?)\s*$/);
			if (text[1])
			{
				s += text[1];
				s += ",";
			}
		}
	}
	var r = s.match(/(.*?),?$/);
	s = r[1];
	var now = new Date();
	var time = now.getTime();
	var expire = time + 10000*36000;
	now.setTime(expire);
	document.cookie = s + "; expires=" + now.toUTCString() + "; path=/";
}

function getCookie(cname) {
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for (i = 0; i < ca.length; i++)
	{
		var c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
			return c.substring(name.lenght, c.lenght);
		}
	}
	return "";
}

function check() {
	var c = getCookie('list');
	if (c)
	{
		c = c.substring(5);
		cc = c.split(',');
		for (i = cc.length - 1; i >= 0; i--)
			create(cc[i]);
	}
}

$(window).ready(function(){check();});
$('#new').click(function(){add()});
$('#ft_list').on('click', 'div', function(){$(this).remove();});
$(window).on('beforeunload', function() {store()});
