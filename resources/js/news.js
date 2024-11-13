const NEWS_URL = `https://newsapi.org/v2/everything?q=Tokyo&language=ja&from=${new Date().toISOString().split('T')[0]}&sortBy=popularity&apiKey=d43a0685062d4ec3a3fd2fbd9e88032d`;

fetch(NEWS_URL)
    .then(response => response.json())
    .then(data => {
        console.log(data); // 检查返回的完整数据

        const newsList = document.getElementById('news-list');
        newsList.innerHTML = '';

        if (data.articles && data.articles.length > 0) {
            data.articles.slice(0, 5).forEach(article => {
                const listItem = document.createElement('li');
                listItem.innerHTML = `<a href="${article.url}" target="_blank">${article.title}</a>`;
                newsList.appendChild(listItem);
            });
        } else {
            newsList.innerHTML = '<li>No news articles found for today.</li>';
        }
    })
    .catch(error => {
        console.error('Error fetching news:', error);
        document.getElementById('news-list').innerHTML = `<li>Unable to load news data. Error: ${error.message}</li>`;
    });
