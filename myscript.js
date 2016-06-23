var books;

function callPage(url){
	var ajax = new XMLHttpRequest();
	ajax.onload = function(){
		if (ajax.readyState==4 && ajax.status==200) {
			books=JSON.parse(ajax.responseText);
			loadBooks();
		}
	};
	ajax.open("get",url,true);
	ajax.send();
}
addEventListener("load", function(){
	callPage("db.php");
});

addEventListener("load", function(){
	document.getElementById("addBook").onclick=function(){
		document.getElementById("bookDetailsContainer").style.display = 'none';
		document.getElementById("addBookContainer").style.display = 'block';
	}
});

function loadBooks() {
	var htmlOut="";
	for(var i=0;i<books.length;i++) {
		htmlOut+= '<li><a onclick="return viewBook(\'' + books[i].isbn + '\')">' + books[i].name + '</a></li>' + '<hr>';
	}
	document.getElementById("lists").innerHTML = htmlOut;
}

function viewBook(ISBN){
	document.getElementById("bookDetailsContainer").style.display = 'block';
	document.getElementById("addBookContainer").style.display = 'none';

	for(var i=0;i<books.length;i++){
		if(books[i].isbn === ISBN) {
			var htmlBookDetails = 'NAME: ' + books[i].name  + '<br>' + 'AUTHOR: ' + books[i].author + '<br>' + 'PRICE: &#8377;' + books[i].price + '<br>' + 'ISBN: ' + books[i].isbn + '<br>' ;
			document.getElementById("bookDetails").innerHTML = htmlBookDetails ;
			break;
		}
	}
	return false;
}
