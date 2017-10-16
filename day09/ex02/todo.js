
function create(text, type) {
	if (text)
	{
		if (text.indexOf(",") !== -1)
			alert("to work properly, todo should not contain coma (\",\")");
		else
		{
			var todo = document.createElement('DIV');
			todo.id = 'todo';
			todo.setAttribute('class', 'todo');
			
			var name = document.createTextNode(text);
			todo.onclick = function() {
				var ans = confirm('Job done ?');
				
				if (ans == true)
					this.parentNode.removeChild(this);
			}
			todo.appendChild(name);
			var li = document.getElementById('ft_list');
			if (type == 1)
			{
				var li = document.getElementById('ft_list');
				li.appendChild(todo);
			}
			else
				li.insertBefore(todo, li.childNodes[0]);
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
