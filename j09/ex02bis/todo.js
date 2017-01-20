var count = 0;
$(document).ready(function()
{
	var cook = document.cookie;
	if (cook != undefined && cook != ""){
		var result = {};
		cook.split(';').forEach(function(x){
	    var arr = x.split('=');
	    arr[1] && (result[arr[0].trim()] = arr[1]);
		});
		count = result.count;
		for (key in result)
			add_task(result[key], key);
	}
});

function add_task(item, index){
	if (index !== 'count' && index !== 'null')
	{
		var ndiv = $('<div />', {text : item, id : index});
		var curent = $('#ft_list div');
		if (curent.length == 0 )
			$('#ft_list').append(ndiv);
		else
			curent.before(ndiv);
	}
}



$('#new').click(function()
{
	var todo = prompt('Nouvelle Tache').trim();
	if ( todo.length > 0)
	{
		ind = "t"+count.toString();
		console.log(ind);
		ndiv = $('<div />', {text : todo, id : ind});
		var curent = $('#ft_list div');
		if (curent.length == 0 )
			$('#ft_list').append(ndiv);
		else
			curent.first().before(ndiv);
		var ndate = new Date();
		ndate = ndate.setTime(ndate.getTime() + 8640000)
		document.cookie = 't'+count+'='+todo+";"+ndate.toLocaleString();
		count++;
		document.cookie = 'count='+count;
	}
});

$('#ft_list').on('click','div',function()
{
	var ans = confirm('Etes-vous sur de vouloir supprimer cette tâche ?');
	if (ans == true){
		document.cookie = $(this).attr('id')+"=;expires=Wed; 01 Jan 1970"
		$(this).remove();
	}
});
