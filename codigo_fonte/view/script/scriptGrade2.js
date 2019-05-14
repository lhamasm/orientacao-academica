function expandir_botao(id, obj){
	botao = document.getElementById(id);
	
	if(botao.style.display == "block"){
		botao.style.display = "none";
		obj.style.backgroundColor = "#B7B7B7";
		obj.style.color = "black";
		obj.style.fontWeight = "normal";
		$(".materias").hover(function(){
			$(this).css("background-color", "#68BBF1");
		}, function(){
			$(this).css("background-color", "#B7B7B7");
		});
	}
	else{
		botao.style.display = "block";
		obj.style.backgroundColor = "#68BBF1";
		obj.style.color = "#2b4654";
		obj.style.fontWeight = "bold";
		$(".materias").hover(function(){
			$(this).css("background-color", "#68BBF1");
		}, function(){
			$(this).css("background-color", "#68BBF1");
		});		
	}
}

function redirectMsg(){
	 location.href="../telas/inbox.html" 
}

function redirectHome(){
	 location.href="../telas/homepageAluno.html" 
}