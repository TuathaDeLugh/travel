let addPostBtn = document.querySelector('.create-post-btn');
addPostBtn.addEventListener('click', function(){
    let articlesTab = document.getElementById('v-pills-articles');
    articlesTab.classList.remove('show');
    articlesTab.classList.remove('active');

    let createTab = document.getElementById('v-pills-create-post');
    createTab.classList.add('show');
    createTab.classList.add('active');
})