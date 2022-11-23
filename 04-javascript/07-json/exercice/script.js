/**
 * 1. Créer une todo list. à chaque appui sur le bouton ajout,
 * créer un nouvel élément dans la liste.
 * cet élément doit contenir la valeur de l'input et une croix.
 * On en profitera pour vider l'input.
 * 2. le clique sur un élément de la liste lui ajoutera une classe qui aura pour 
 * effet de barrer l'élément.
 * 3. le clique sur la croix supprimera l'élément concerné.
 * 4. sauvegarder la liste en localstorage.
 * 5. afficher la liste sauvegardé au chargement de la page.
 * 6. éditer la liste lorsque l'on coche ou supprime un élément.
 * Bonus : Utiliser le drag and drop pour déplacer nos éléments dans la liste. il faudra penser à sauvegarder les éléments déplacé.
*/
const ulTodo = document.querySelector('#list');
const btnTodo = document.querySelector('.addBtn');
const inputTodo = document.querySelector('#addTodo');
let listInfo = {};

btnTodo.addEventListener("pointerdown", addLi);

function addClose(div)
{
    const span = document.createElement("span");
    span.textContent = "\u00D7";
    span.classList.add("close");
    div.append(span);
    span.addEventListener("pointerdown", closeLi);
    div.addEventListener("click", checkLi);
}
function closeLi(e)
{
    e.stopPropagation();
    let div = e.target.parentElement;
    delete listInfo[div.dataset.time];
    localStorage.setItem("todoList", JSON.stringify(listInfo));
    div.parentElement.remove();
}
function checkLi(e)
{
    this.classList.toggle("checked");
    listInfo[this.dataset.time].checked = this.classList.contains("checked");
    localStorage.setItem("todoList", JSON.stringify(listInfo));
}
function addLi()
{
    if(inputTodo.value === "")
    {
        alert("Ne laisse pas ce champ vide !");
        return;
    }
    const li = document.createElement("li");
    const div = document.createElement("div");
    div.textContent = inputTodo.value;
    div.dataset.time = Date.now();
    li.append(div);
    ulTodo.append(li);
    addClose(div)
    listInfo[div.dataset.time] = {value: inputTodo.value, checked: false};
    localStorage.setItem("todoList", JSON.stringify(listInfo));
    inputTodo.value = "";
    inputTodo.focus();
    // console.log(listInfo);
    // bonus uniquement :
    addEventDragAndDrop(div);
}
function firstLoad()
{
    listInfo = JSON.parse(localStorage.getItem("todoList"))??{};
    for(let id in listInfo)
    {
        const el = listInfo[id];
        const div = document.createElement("div");
        const li = document.createElement("li");
        div.textContent = el.value;
        div.dataset.time = id;
        div.classList.toggle("checked", el.checked);
        li.append(div);
        ulTodo.append(li);
        addClose(div);
        // bonus uniquement :
        addEventDragAndDrop(div);
    }
}

firstLoad();
// Bonus :

function dragStart(e)
{
    this.style.opacity = 0.4;
    // On indique quel type d'évènement est permit par le drag&drop
    e.dataTransfer.effectAllowed = "move";
    e.dataTransfer.setData("text", this.dataset.time);
}
function dragEnter(e)
{
    this.classList.add("over");
}
function dragLeave(e)
{
    e.stopPropagation()
    this.classList.remove("over");
}
function dragOver(e)
{
    e.preventDefault();
    e.dataTransfer.dropEffect = "move";
    return false;
}
function dragDrop(e)
{
    // Je récupère ce que j'ai sauvegardé au début de mon drag and drop
    let time = e.dataTransfer.getData("text");
    let dragSrcEl = document.querySelector(`[data-time="${time}"]`);
    if(dragSrcEl != this)
    {
        // Je déplace mes divs dans leurs li.
        let parent = dragSrcEl.parentElement;
        this.parentElement.append(dragSrcEl);
        parent.append(this);
        // J'échange mes éléments dans la liste.
        let tmp = listInfo[this.dataset.time];
        listInfo[this.dataset.time] = listInfo[dragSrcEl.dataset.time];
        listInfo[dragSrcEl.dataset.time] = tmp;
        localStorage.setItem("todoList", JSON.stringify(listInfo));
        // J'échange les data-time de mes éléments :
        [this.dataset.time, dragSrcEl.dataset.time] = [dragSrcEl.dataset.time, this.dataset.time];
    }
}
function dragEnd(e)
{
    const listItems = document.querySelectorAll('#todo ul div');
    listItems.forEach(it=>it.classList.remove("over"));
    this.style.opacity = "1";
}
function addEventDragAndDrop(el)
{
    el.draggable = true;
    // au début du drag and drop
    el.addEventListener("dragstart",dragStart);
    // lorsque pendant un drag and drop on entre sur un autre élément html.
    el.addEventListener("dragenter",dragEnter);
    // lorsqu'on se déplace lors du drag and drop sur un élément html
    el.addEventListener("dragover",dragOver);
    // lorsque l'on quitte un élément html
    el.addEventListener("dragleave",dragLeave);
    // lorsque que l'on relâche l'élément draggable.
    el.addEventListener("drop",dragDrop);
    // lors de la fin du drag and drop.
    el.addEventListener("dragend",dragEnd);
}
