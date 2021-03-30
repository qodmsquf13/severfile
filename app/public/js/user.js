
slide_review_pop();

function slide_review_pop(){
    const company_view_btn = document.querySelector('.company_view_btn');
    const company_view_close = document.querySelector('.close');
    const review_detail_pop = document.querySelector('#review_detail_pop');

    company_view_btn.addEventListener("click",function(){
        review_detail_pop.style.visibility="visible";
    })
    company_view_close.addEventListener("click",function(){
        review_detail_pop.style.visibility="hidden";
    })

}

