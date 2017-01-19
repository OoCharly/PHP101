var new_req = document.getElementById('new');
var ft_list = document.getElementById('ft_list');
var count = 0;
$(window).load(function()
{
	var cook = $(document).cookie;
	if (cook != undefined){
		var result = {};
		cook.split(';').forEach(function(x){
	    var arr = x.split('=');
	    arr[1] && (result[arr[0].trim()] = arr[1]);
		});
		count = ++(result.count);
		for (key in result)
			add_task(result[key], key);
	}
});

function add_task(item, index){
	if (index !== 'count' && index !== 'null')
	{
		var ndiv = document.createElement('div');
		ndiv.setAttribute('onclick', 'list_delete(this)');
		ndiv.setAttribute('id', index);
		var ntext = document.createTextNode(item);
		ndiv.appendChild(ntext);
		ft_list.insertBefore(ndiv, ft_list.children[0]);
	}
}



function get_new()
{
	var todo = prompt('Nouvelle Tache').trim();
	if ( todo.length > 0)
	{
		var ndiv = document.createElement('div');
		ndiv.setAttribute('onclick', 'list_delete(this)');
		ndiv.setAttribute('id', 't'+count);
		var ntext = document.createTextNode(todo);
		ndiv.appendChild(ntext);
		console.log($('#ft_list:first-child'));
		var curent = $('#ft_list:first-child');
		if (curent === undefined)
			$('#ft_list').append(ndiv);
		else
			curent.before(ndiv);
		count++;
		todo = todo.replace(';', '%%');
		var ndate = new Date();
		ndate = ndate.setTime(ndate.getTime() + 8640000)
		document.cookie = 't'+count+'='+todo+";"+ndate.toLocaleString();
		document.cookie = 'count='+count;
	}
}

function list_delete(elem)
{
	var ans = confirm('Etes-vous sur de vouloir supprimer cette tâche ?');
	if (ans == true){
		var kill = elem.getAttribute('id');
		elem.remove(elem);
		document.cookie = kill+"=;expires=Wed; 01 Jan 1970"
	}
}
