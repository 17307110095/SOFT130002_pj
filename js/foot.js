var trace = document.getElementById("trace")
var duplicateNum = 0;
var tmp = JSON.parse(localStorage.getItem('tmp')) || [];

function check(item) {
    return (item.title == document.title);
}
function change(item) {
	return `<a href=${item.url}>${item.title}</a>`;
}
function duplicate(item, i){
	if(item.title==document.title)
		duplicateNum = i + 1;	
}
function add() {
	const current = {
		title:document.title,
		url:document.URL
	}
	tmp.push(current);
}

function show(tmp = [], trace) {
	localStorage.setItem('tmp', JSON.stringify(tmp));
	trace.innerHTML = tmp.map(change).join(' > ');
}

if (!tmp.some(check)) {
	add();
	if (tmp.length > 3) {
		tmp = tmp.slice(-3);
	}
	show(tmp,trace);
} else {
	tmp.forEach(duplicate);
	tmp = tmp.slice(0, duplicateNum);
	show(tmp,trace)
}

