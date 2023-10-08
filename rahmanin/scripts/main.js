// const btns = document.querySelectorAll('.btn');
// const modalOverlay = document.querySelector('.modal-overlay ');
// const modals = document.querySelectorAll('.modal');
// const closeBtn = document.querySelector('#close-my-modal-btn');

// btns.forEach((el) => {
// 	el.addEventListener('click', (e) => {
// 		let path = e.currentTarget.getAttribute('data-path');

// 		modals.forEach((el) => {
// 			el.classList.remove('modal--visible');
// 		});
		

// 		document.querySelector(`[data-target="${path}"]`).classList.add('modal--visible');
// 		modalOverlay.classList.add('modal-overlay--visible');
		
// 	});
// });

// document.getElementById("close-my-modal-btn").addEventListener('click', function(){
// 	document.getElementById("modal-overlay--visible").classList.remove("modal--visible")
// });

// modalOverlay.addEventListener('click', (e) => {
// 	console.log(e.target);

// 	if (e.target == modalOverlay) {
// 		modalOverlay.classList.remove('modal-overlay--visible');
// 		modals.forEach((el) => {
// 			el.classList.remove('modal--visible');
// 		});
// 		// modalOverlay.classList.remove(closeBtn);
// 	}
// });

// поиск 
let book=[];
const booklist=document.querySelector(".booklist-wrapper");
let searchbarList= document.getElementsByClassName("searchbar-list")[0];
const searchbar=document.getElementById("searchbar");

searchbar.addEventListener('keyup', (e) => {
     e.preventDefault;
     console.log(e);
     const searchTarget =e.target.value.toLowerCase();
     const filteredBook= book.filter(b=>{
    return  b.books_title.toLowerCase().includes(searchTarget) || b.genre.toLowerCase().includes(searchTarget);

  });
  activeBar();
    if(!searchTarget){
        searchbarList.classList.remove('active');
    }
  displayBooks(filteredBook);
});

  function activeBar(){
      searchbarList.classList.add('active');
  }


const loadBooks= async ()=>{
    try{
     const response=await fetch('http://rahmanin/api/apibook/posts');
      book=await response.json();
      displayBooks(book);
    }
    catch (err){
        console.log(err);
    }
}
const displayBooks=(books)=>{
    const displayingBooks=books.map((book)=>{
        return `
        <div class="books-list">
        <img src="${book.image}">
        <div class="books_desc">
        <h1 class="books_title">${book.books_title}</h1>
        <p class="author_name">${book.author}</p>
        <p class="genre_title">${book.genre}</p>
        </div>
        </div>
        `;
    })
        .join('');
    booklist.innerHTML=displayingBooks;

}
loadBooks();

// exit что это блять такое?
function openbox(id){
    display = document.getElementById(id).style.display;

    if(display=='none'){
       document.getElementById(id).style.display='block';
    }else{
       document.getElementById(id).style.display='none';
    }
}


console.log("даша убери свои руки нвхуй");