var new_req = document.getElementById('new');
var ft_list = document.getElementById('ft_list');
var count = 0;
window.onload = get_cookie();
function get_cookie()
{
  var cook = document.cookie;
  if (cook != undefined)
  {
    var patt = / t[0-9]+=(.*)$/;
    var tab = cook.split(";");
    for (key in tab){
      if ((var str = tab[key].toString(patt) != undefined) 
      ins_list(str);
      else {
        count
      }
    }
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
    ft_list.insertBefore(ndiv, ft_list.children[0]);
    count++;
    todo = todo.replace(';', '%%');
    document.cookie = 't'+count+'='+todo;
    document.cookie = 'count='+count;
    alert(document.cookie);
  }
}

function list_delete(elem)
{
  var ans = confirm('Etes-vous sur de vouloir supprimer cette t&#226che ?');
    if (ans == true){
      var kill = elem.getAttribute('id');
      elem.remove(elem);
      document.cookie = kill+"=;expires=Wed; 01 Jan 1970"
    }
}
