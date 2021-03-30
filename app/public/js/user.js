
slide_review_pop();
company_pop();

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

function company_pop(){
    const c_view_btn = document.querySelector('.view');
    const company_pop_close = document.querySelector('.company_pop_close');
    const company_info_pop = document.querySelector('#company_info_pop');

    c_view_btn.addEventListener("click",function(){
        company_info_pop.style.visibility="visible";
    })
    company_pop_close.addEventListener("click",function(){
        company_info_pop.style.visibility="hidden";
    })

}


