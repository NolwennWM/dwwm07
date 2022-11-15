"use strict";
/* 
    Les regex (ou Expression Régulière) permettent la recherche 
    dans un string, de charactères ou mots en particulier.

    Une regex commence et fini par "/"
    (On peut aussi retrouver après le "/" final, des "flag" voir plus bas dans le cours)
*/
// La méthode test() s'applique sur une regex et prend un string en argument. Elle retournera true ou false selon si la regex correspond ou non.
// Recherche la présence de "ou"
const r1 = /ou/;
// Recherche la présence de "o" ou "u"
const r2 = /[ou]/;
console.log(r1, r1.test("Bonjour"), r1.test("Salut"));
console.log(r2, r2.test("Bonjour"), r2.test("Salut"));
// Recherche la présence de "ou" en début de string.
const r3 = /^ou/;
console.log(r3, r3.test("Bonjour"), r3.test("outre"))
// Recherche la présence de "ou" en fin de string.
const r4 = /ou$/;
console.log(r4, r4.test("Bonjour"), r4.test("mou"))
// Recherche la présence de "ou" ou "oi"
const r5 = /ou|oi/;
console.log(r5, r5.test("Bonjour"), r5.test("Bonsoir"))
// Recherche les caractères entre a et z compris. (voir table unicode)
const r6 = /[a-z]/;
console.log(r6, r6.test("Bonjour"), r6.test("0630292827"))
// Recherche si le string ne contient pas ces caractères.
const r7 = /[^a-z]/;
console.log(r7, r7.test("bonjour"), r7.test("0630292827"))
// Recherche la présence de "ou" entre 0 et 1 fois.
const r8 = /(ou)?/;
console.log(r8, r8.test("Bonjour"), r8.test("Pizza"))
// Recherche la présence de "ou" 1 fois ou plus.
const r9 = /(ou)+/;
console.log(r9, r9.test("Bonjour"), r9.test("Pizza"))
// Recherche la présence de "ou" 0 fois ou plus.
const r10 = /(ou)*/;
console.log(r10, r10.test("Bonjour"), r10.test("Pizza"))
// Recherche la présence de "ou" dont "u" apparaît deux fois d'affilé.
const r11 = /ou{2}/;
console.log(r11, r11.test("Bonjour"), r11.test("Bonjouur"))
// Recherche la présence de "ou" deux fois d'affilé.
const r12 = /(ou){2}/;
console.log(r12, r12.test("Bonjour"), r12.test("Bonjouur"))
// Recherche la présence de "ou" entre 2 et 4 fois.
const r13 = /(ou){2,4}/;
console.log(r13, r13.test("Bonjour"), r13.test("Bonjouour"))
// Recherche la présence de "ou" deux fois ou plus.
const r14 = /(ou){2,}/;
console.log(r14, r14.test("Bonjour"), r14.test("Bonjouour"))
// Pour rechercher un caractère utilisé par la regex comme ayant un sens, il faut que je l'échappe (place un "\" avant)
const r15 = /\^/;
console.log(r15, r15.test("^^"), r15.test("Bonjour"))
// Inversement, des caractères normaux gagnent un sens si ils sont échappé.
// Ici "\s" signifie un espace.
const r16 = /\s/;
console.log(r16, r16.test("Hello World"), r16.test("Bonjour"))
// Recherche un chiffre, équivalent à [0-9]
const r17 = /\d/;
console.log(r17, r17.test("Hello World"), r17.test("Bonjour 8 fois"))
// "." recherche n'importe quel caractère.
// "\1" recherche le même résultat que la première parenthèse. (Et ainsi de suite avec \2, \3...)
const r18 = /(ou|oi).*\1/;
console.log(r18, r18.test("Coucou"), r18.test("Bonsoir 8 fois"), r18.test("Bonjour 8 fois"))

// ----------------------- Match -------------------
const phrase = "J'aime la pizza, les cannelés et les okonomiyakis";
// Match est une méthode de string qui retourne un tableau correspondant aux éléments retrouvé  par ma regex.
// Match prend en argument, un regex ou un string à rechercher.
console.log(phrase.match(/pizza/));
// par défaut, match s'arrête au premier élément retrouvé.
console.log(phrase.match(/les/));
// le flag "g" pour global permet de ne pas s'arrêter au premier résultat mais de fouiller le string en entier.
console.log(phrase.match(/les/g));
const phrase2 = "Vive les regex et vive javascript";
// Avec le flag "i", la regex devient insensible à la casse (minuscule ou majuscule)
console.log(phrase2.match(/vive/gi));
//------------------------ replace ----------------------------
// Replace est une méthode de string qui va remplacer le premier éléménent donné en argument, par le second. (là aussi il accepte string comme regex)

console.log(phrase.replace("pizza", "salade"));
// même résultat.
console.log(phrase.replace(/pizza/, "salade"));
// l'avantage d'une regex, c'est que l'on peut vérifier des cas plus complexe.
console.log(phrase.replace(/pizza|okonomiyakis|cannelés/gi,"salade(s)"));
console.log(phrase2.replace(/regex|javascript/gi,"******"));
// On peut avec "$&" garder l'élément recherché et lui accoler d'autres éléments.
console.log(phrase2.replace(/javascript/gi, "$& et CSS"));
console.log(phrase2.replace(/regex/gi, "'$&' (c'est faux)"));

// ----------- bonus ---------------
const phrase3 =
`1er : Maurice
2ème : Paul
3ème : Charli`;
// Avec le flag "m" chaque ligne sera testé comme un string séparé, donc ici il nous trouvera tous les chiffres.
console.log(phrase3.match(/^\d/gm));
// Cela fonctionne aussi avec la fin des lignes.
console.log(phrase3.match(/(\w+)$/gm));

// Attention, les accents ne sont pas prit en compte.
console.log(/^[a-z]+$/.test("paul"));
console.log(/^[a-z]+$/.test("élodie"));
// pas de magie, les accents comme les charactères spéciaux doivent être listé un à un.
console.log(/^[a-zéèàâê]+$/.test("élodie"));

// par défaut "." ne prend pas en compte les sauts à la ligne. Avec le flag "s" ils sont prit en compte.
console.log(phrase3.match(/1.+3/s));

// On peut aussi construire une regex via un string grâce au constructeur de regex "RegExp" qui prend en premier argument la regex et en second les flags.
const r19 = new RegExp("^[A-z]+$", "gi");
// Attention, de A majuscule à z minuscule, certains caractères sépciaux se cachent :
console.log(r19, r19.test("Hello_World"));
