function fetchPage(page)
{
    var ajax = new XMLHttpRequest();

    ajax.onreadystatechange = function ()
    {
        if (ajax.readyState == 4 && ajax.status == 200)
        {

            document.getElementById("content").innerHTML = ajax.responseText;
            return true;
        }
        
    }
    ajax.open("GET", page, true);
    ajax.send();
}