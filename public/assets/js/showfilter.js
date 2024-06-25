const showBtn = document.getElementById('show-filters');
const filters = document.getElementById('filters');
const closeBtn = document.getElementById('close-filters')

showBtn.addEventListener('click', () => {
    filters.classList.remove('hidden');
    showBtn.classList.add('no-visibility');
    closeBtn.classList.remove('no-visibility')
});

closeBtn.addEventListener('click', () => {
    showBtn.classList.remove('no-visibility');
    filters.classList.add('hidden');
    closeBtn.classList.add('no-visibility')
})