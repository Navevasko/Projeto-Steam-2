"use strict"
const images = [
	{'id' : '1', 'url':'./img/game-img/Hades.png'},
	{'id' : '2', 'url':'./img/game-img/KatanaZero.jpg'},
	{'id' : '3', 'url':'./img/game-img/psyconauts.jpg'},
];

const containerItems = document.querySelector("#container-items");
const loadImages =(images)=>{
	images.forEach(image =>{
		containerItems.innerHTML += `
			<div class='item'>
				<img src='${image.url}'>
			</div>
		`
	})
}


loadImages(images, containerItems);

let items = document.querySelectorAll(".item");

const previous = () =>{
	const lastItem = items[items.length - 1];
	containerItems.insertBefore(lastItem, items[0]);
	items = document.querySelectorAll(".item");
}
const next = () =>{
	const lastItem = items[items.length];
	containerItems.insertBefore(items[0], lastItem);
	items = document.querySelectorAll(".item");
}

document.querySelector("#previous").addEventListener("click", previous)
document.querySelector("#next").addEventListener("click", next)