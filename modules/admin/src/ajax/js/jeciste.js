function listeJeciste() 
{
    $("#liste-jeciste").load('src/ajax/php/detail-jeciste.php');
}


function search(str) 
{
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            document.getElementById("liste-jeciste").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "src/ajax/php/detail-jeciste.php?nom=" + str, true);
    xmlhttp.send();
}