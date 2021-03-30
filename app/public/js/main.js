
var count = 0;
var marginleft = 13;
var marginleft2 = 13;
var marginleft3 = 13;
var color_w = "#ffffff";
var color_g = "rgb(177,177,177)";
const subArr = document.querySelectorAll(".sub");
const btn = subArr[0].querySelector('.btn');
const btn1 = subArr[1].querySelector('.btn');
const btn2 = subArr[2].querySelector('.btn');
const liArr = document.querySelectorAll('.sub li');
const liArr1 = subArr[1].querySelectorAll('li');
const liArr2 = subArr[2].querySelectorAll('li');
console.log(btn);

setInterval(() => {
    btn1.style.width == "125px";
    // console.log(count);
    switch(count){
        case 0:{
            marginleft=493;
            marginleft2 = 333;
            marginleft3 = 173;
            liArr[3].style.color=color_w;
            liArr1[2].style.color=color_w;
            liArr2[1].style.color=color_w;
            
            liArr[1].style.color=color_g;
            liArr1[0].style.color=color_g;
            liArr2[2].style.color=color_g;

            count++;
            break;
        } 
        case 1: {
            marginleft=13;
            marginleft2=173;
            marginleft3=13;
            
            liArr[0].style.color=color_w;
            liArr1[1].style.color=color_w;
            liArr2[0].style.color=color_w;
            
            
            liArr[3].style.color=color_g;
            liArr1[2].style.color=color_g;
            liArr2[1].style.color=color_g;


            count++;
            break;
        }
        case 2: {
            marginleft=333;
            marginleft2=470;
            marginleft3=493;

            liArr[2].style.color=color_w;
            liArr1[3].style.color=color_w;
            liArr2[3].style.color=color_w;
            
            
            liArr[0].style.color=color_g;
            liArr1[1].style.color=color_g;
            liArr2[0].style.color=color_g;
            count++;
            break;
        }
        case 3: {
            marginleft=173;
            marginleft2=-2;
            marginleft3=318;

            liArr[1].style.color=color_w;
            liArr1[0].style.color=color_w;
            liArr2[2].style.color=color_w;
            
            
            liArr[2].style.color=color_g;
            liArr1[3].style.color=color_g;
            liArr2[3].style.color=color_g;
            count=0;
            break;
        }
    }
    btn.style.marginLeft = marginleft+"px";

    btn1.style.marginLeft = marginleft2+"px";
    if(count == 3){
        btn1.style.width = "140px";
    }else if(count == 0){
        btn1.style.width = "125px";
    }else{
        btn1.style.width="95px";
    }

    btn2.style.marginLeft = marginleft3+"px";
    if(count == 0){
        btn2.style.width = "125px";
    }else{
        btn2.style.width = "95px";
    }
}, 1800);


const categoryArr = document.querySelectorAll(".categore li");
const tab_imgArr = document.querySelectorAll(".tab li");
const under_var = document.querySelector(".under_var");
var marginright = 1;
tab_imgArr[0].style.opacity = 1;
categoryArr.forEach((img, index) => {
    img.addEventListener("click", function() {
        console.log(index);
        switch(index){
            case 0:{
                under_var.style.left = "24px";
                tab_imgArr[0].style.opacity = 1;
                tab_imgArr[1].style.opacity = 0;
                tab_imgArr[2].style.opacity = 0;
                tab_imgArr[3].style.opacity = 0;
                break;
            }
            case 1:{
                under_var.style.left = "124px";
                tab_imgArr[0].style.opacity = 0;
                tab_imgArr[1].style.opacity = 1;
                tab_imgArr[2].style.opacity = 0;
                tab_imgArr[3].style.opacity = 0;
                break;
            }
            case 2:{
                under_var.style.left = "224px";
                tab_imgArr[0].style.opacity = 0;
                tab_imgArr[1].style.opacity = 0;
                tab_imgArr[2].style.opacity = 1;
                tab_imgArr[3].style.opacity = 0;
                break;
            }
            case 3:{
                under_var.style.left = "324px";
                tab_imgArr[0].style.opacity = 0;
                tab_imgArr[1].style.opacity = 0;
                tab_imgArr[2].style.opacity = 0;
                tab_imgArr[3].style.opacity = 1;
                break;
            }
        }
        
    })
});

//scroll 이벤트
var temp_scroll = 0;
const job_img = document.querySelector(".job_box img");
window.addEventListener('scroll', () => {
    let Y=document.documentElement.scrollTop;// 현재 스크롤바 위치
	let windowHeight = window.innerHeight; // 스크린 창
	let fullHeight = document.body.scrollHeight; //  margin 값은 포함 x
    console.log(temp_scroll);

    if(temp_scroll>Y){
        temp_scroll-(temp_scroll-Y);
    }else{
        temp_scroll = Y;
    }

    if(Y>= 1600){    
        job_img.style.top="300px";
        job_img.style.opacity= "1";
    }else{
        job_img.style.top="1200px";
        job_img.style.opacity= "0";
    }

    // if(temp_scroll<100){
    //     document.documentElement.scrollTop = 0;
    // }else if(temp_scroll<=200){
    //     document.documentElement.scrollTop = 940;
    // }else if(temp_scroll>=1040){
    //     document.documentElement.scrollTop = 1680;
    // }
});






