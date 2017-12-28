function removeDummy() 
{
	var elem = document.getElementById('dummy');
	elem.parentNode.removeChild(elem);
 }
function checkout()
{
	window.location.href="Summary.php";
}
function next()
{
	window.location.href="homePage.php";
}