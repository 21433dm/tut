function search($value) {
	var xml;
	if(window.XMLHttpRequest) {
		xml = new XMLHttpRequest();
	}
}
	xml.open("GET","php/search.php?search="+$value);
	xml.send();