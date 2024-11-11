const API_KEY = 'd43a0685062d4ec3a3fd2fbd9e88032d';
const NEWS_URL = 'https://newsapi.org/v2/everything?q=Tokyo&language=ja&apiKey=${API_KEY}';

fetch(NEWS_URL)
    .then(response => response.json())
    .then(data => {
        const newsList = document.getElementById('news-list');
        newsList.innerHTML = '';
        data.articles.slice(0, 5).forEach(article => {
            const listItem = document.createElement('li');
            listItem.innerHTML = '<a href="${article.url}" target="_blank">${article.title}</a>';
            newsList.appendChild(listItem);
        });
    })
    .catch(error => console.error('Error fetching news:', error));
