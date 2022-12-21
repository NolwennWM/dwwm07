let position, target, response, game, theme;
const img = document.querySelector("#img"),
keyboardZone = document.querySelector("#keyboard"),
wordZone = document.querySelector("#word"),
maxFail = 6,
// listWords = ["bonjour", "anticonstitutionnellement", "javascript", "mysql", "pokemon", "chaussette"],
alphabet = "azertyuiopqsdfghjklmwxcvbn";
// TODO: afficher le thème.
init();
document.addEventListener("keydown", realKeyboard);
// initialise la partie
function init(){
	game = true;
	position = 0;
	img.style.backgroundPositionX = position +"px";	
	response = "";
	fetch("./theme.json").then(res=>{
		if(res.ok){
			res.json().then(arr=>{
				target = getRandom(arr);
				word();
				keyboard();
			})
		}	
	})
}
function getRandom(a){
    let alph = a[Math.floor(Math.random()*a.length)],
    words = alph.Listes[Math.floor(Math.random()*alph.Listes.length)],
	mot = words.Mots[Math.floor(Math.random()*words.Mots.length)];
	theme = alph.Thème_;
	console.log(theme);
	console.log(mot);
    if(mot){
		return mot.toLowerCase();
    }
    else{
        return getRandom(a);
    }
}
function word(){
	wordZone.textContent = "";
	// target = listWords[Math.floor(Math.random()*listWords.length)];
	for(let i = 0; i<target.length; i++){
		// response +="_";
		response += /^[a-zA-Z]+$/.test(target[i])? "_":target[i];
	}
	let size = wordZone.clientWidth / target.length;
	wordZone.style.fontSize = size < 80 ? size+"px": "4rem"; 
	insertElement(response, wordZone, "span");
}
// Affiche le clavier.
function keyboard(){
	keyboardZone.textContent = "";
	insertElement(alphabet, keyboardZone, "button");
	const keys = keyboardZone.querySelectorAll("button");
	keys.forEach(k=>{
		k.addEventListener("click", checkTry);
	})
}
function realKeyboard(e){
	if(game && alphabet.includes(e.key)){
		let btn = keyboardZone.querySelector("#"+e.key);
		if(!btn.disabled){
			checkTry({target:btn});
		}
	}else if(!game){
		init();
	}
	
}
function checkTry(e){
	e.target.disabled = true;
	if(target.includes(e.target.textContent)){
		for(let i = 0; i< target.length; i++){
			if(target[i] == e.target.textContent){
				wordZone.querySelector(`span:nth-child(${i+1})`).textContent = target[i];
				response = response.substring(0,i) + target[i] + response.substring(i+1);
			}
		}
		if(!response.includes("_")){
			end(true);
		}
		return;
	}
	nextMove();
}

function insertElement(text, parent, child, id=false){
	[...text].forEach(c=>{
		let ele = document.createElement(child);
		ele.textContent = c;
		ele.id = id ? "":c;
		parent.append(ele);
	})
}
// Déplace l'image.
function nextMove(){
	if(position > (-1*maxFail * img.clientWidth)){	
		position -=img.clientWidth;
		img.style.backgroundPositionX = position +"px";	
	}
	if(position <= (-1*maxFail * img.clientWidth)){
		end(false);
	}
}
function end(victoire){
	game = false;
	wordZone.textContent = victoire? "VOUS ÊTES VICTORIEUX !": "VOUS AVEZ PERDU !";
	let div = document.createElement("div");
	div.innerHTML = `Le mot était "<a href="https://www.google.com/search?q=${target}" target="_blank">${target}</a>"<br>`;
	let restart = document.createElement("button");
	restart.textContent = "Recommencer ?";
	restart.id = "restart";
	div.append(restart);
	keyboardZone.textContent = "";
	keyboardZone.append(div);
	restart.addEventListener("click", init);
}
