/**
 * Activation et désactivation du filtre mbile
 */

let activeFliter = document.querySelector('.active-filter-mobile');
let filter = document.querySelector('.filter');
let filterFond = document.querySelector('.filter-fond');
let masqueFilter = document.querySelector('.masque-filter') 

activeFliter.addEventListener('click', function(){
    filter.classList.remove('max-md:hidden');
    filter.classList.add('filter-mobile');
    filterFond.classList.add('active-filter');
})

masqueFilter.addEventListener('click', function(){
    filter.classList.add('max-md:hidden');
    filter.classList.remove('filter-mobile');
    filterFond.classList.remove('active-filter');
})

filterFond.addEventListener('click', function(){
    filter.classList.add('max-md:hidden');
    filter.classList.remove('filter-mobile');
    filterFond.classList.remove('active-filter');
})