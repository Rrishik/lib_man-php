var books={"Books":[]};

function callPage(url){
	ajax = new XMLHttpRequest();
	ajax.onload=function(){
		if (ajax.readyState==4 && ajax.status==200) {
			books.Books=this.responseText;
		}
	};
	ajax.open("GET",url,true);
	ajax.send();
	loadBooks();
}
addEventListener("load", function(){
	callPage('db.php');
});

addEventListener("load", function(){
	document.getElementById("addBook").onclick=function(){
		document.getElementById("bookDetailsContainer").style.display = 'none';
		document.getElementById("addBookContainer").style.display = 'block';
	}
});

function loadBooks() {
	var htmlOut="";
	for(var i=0;i<books.Books.length;i++) {
		htmlOut+= '<li><a onclick="return viewBook(\'' + books.Books[i].isbn +'\')">' + books.Books[i].name + '</a></li>' + '<hr>';
	}
	document.getElementById("lists").innerHTML = htmlOut;
}

function viewBook(ISBN){
	document.getElementById("bookDetailsContainer").style.display = 'block';
	document.getElementById("addBookContainer").style.display = 'none';

	for(var i=0;i<books.Books.length;i++){
		if(books.Books[i].isbn === ISBN) {
			var htmlBookDetails = 'NAME: ' + books.Books[i].name  + '<br>' + 'AUTHOR: ' + books.Books[i].author + '<br>' + 'PRICE: &#8377;' + books.Books[i].price + '<br>' + 'ISBN: ' + books.Books[i].isbn + '<br>' ;
			document.getElementById("bookDetails").innerHTML = htmlBookDetails ;
			break;
		}
	}
	return false;
}
