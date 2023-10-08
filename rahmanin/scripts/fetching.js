 const addBook=document.getElementById("addBook");
 console.log(addBook);
 addBook.onsubmit=async (e)=>{
    e.preventDefault();
    const bookname=document.getElementById("name").value,
    description=document.getElementById("description").value,
    bookimage=document.getElementById("book_image").value,
    author=document.getElementById("author").value,
    genre=document.getElementById("genre").value;
    let formData=new FormData(addBook);
    formData.append('bookname', bookname);
    formData.append('description', description);
    formData.append('bookimage', bookimage);
    formData.append('author', author);
    formData.append('genre', genre);
   
    const res =await fetch('http://rahmanin/api/apibook/posts',{
        method:'POST',
        body:formData
    });
    const data= await res.json();
          if (data.status===true){    
             await loadBooks();
              
             }

    addBook.reset();            
 }
 async function getGenres() {
    try {
        const response = await fetch('http://rahmanin/api/apiGenres/posts');
        if (!response.ok) {
            throw new Error('Failed to fetch genre data.');
        }
        const genres = await response.json();
        const selectElement = document.querySelector('#genre');

        selectElement.innerHTML = '';
        genres.forEach((genre) => {
            const option = document.createElement('option');
            option.textContent = genre.genre_title;
            selectElement.appendChild(option);
        });
    } catch (error) {
        console.log('Error:', error);
    }
}
getGenres();

const addGenre=document.getElementById("genres");
addGenre.onsubmit=async (e)=> {
    e.preventDefault();
    const inputGenre = document.getElementById("addGenre").value;
    let formData = new FormData(addGenre);
    formData.append('inputGenre', inputGenre);

    const res = await fetch(`http://rahmanin/api/apiGenres/posts`, {
        method: 'POST',
        body: formData
    });
    const data = await res.json();
    if (data.status === true) {
        await getGenres();
    }
    console.log(data);
}

///authors
async function getAuthors() {
    try {
        const response = await fetch('http://rahmanin/api/apiAuthors/posts');
        if (!response.ok) {
            throw new Error('Failed to fetch author data.');
        }
        const author = await response.json();
        const selectElement = document.querySelector('#author');

        selectElement.innerHTML = '';
        author.forEach((author) => {
            const option = document.createElement('option');
            option.textContent = author.name;
            selectElement.appendChild(option);
        });
    } catch (error) {
        console.log('Error:', error);
    }
}
getAuthors();
const addauthor=document.getElementById("authors");
addauthor.onsubmit=async (e)=> {
    e.preventDefault();
    const inputauthor = document.getElementById("addauthor").value;
    let formData = new FormData(addauthor);
    formData.append('inputauthor', inputauthor);

    const res = await fetch(`http://rahmanin/api/apiAuthors/posts`, {
        method: 'POST',
        body: formData
    });
    const data = await res.json();
    if (data.status === true) {
        await getAuthors();
    }
    console.log(data);
}

