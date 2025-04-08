 // Your Unsplash Access Key
 const accessKey = 'ZlpJzUuZUkqoJ1lqCZhG4Mr1ZRtzpd4iSlEKjYHLe2I';
    
 // Categories to fetch images for
 const categories = ['developer', 'coding', 'tech'];

 // Function to fetch random images for each category
 function fetchRandomImages() {
   const imageContainer = document.getElementById('image-container');
   imageContainer.innerHTML = ''; // Clear previous images

   categories.forEach(category => {
     const url = `https://api.unsplash.com/photos/random?query=${category}&client_id=${accessKey}`;

     fetch(url)
       .then(response => response.json())
       .then(data => {
         const img = document.createElement('img');
         img.src = data.urls.regular;
         img.alt = data.alt_description || `${category} image`;
         img.classList.add('unsplash-image');

         imageContainer.appendChild(img);
       })
       .catch(error => console.error(`Error fetching image for ${category}:`, error));
   });
 }

 // Fetch random images on page load
 window.onload = fetchRandomImages;