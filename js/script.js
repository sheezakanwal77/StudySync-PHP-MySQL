window.addEventListener("scroll",function(){

let header=document.querySelector("header");

if(window.scrollY>50){

header.style.background="#0b1225";

}

else{

header.style.background="rgba(8,13,30,.85)";

}

});
// FAQ Accordion

// =========================
// FAQ Accordion
// =========================

document.addEventListener("DOMContentLoaded", function () {

    const faqItems = document.querySelectorAll(".faq-box");

    faqItems.forEach(item => {

        const question = item.querySelector(".faq-question");
        const answer = item.querySelector(".faq-answer");
        const icon = question.querySelector("span");

        question.addEventListener("click", function () {

            // Close all other FAQs
            faqItems.forEach(faq => {

                if (faq !== item) {
                    faq.classList.remove("active");
                    faq.querySelector(".faq-answer").style.maxHeight = null;
                    faq.querySelector(".faq-question span").textContent = "+";
                }

            });

            // Toggle current FAQ
            item.classList.toggle("active");

            if (item.classList.contains("active")) {
                answer.style.maxHeight = answer.scrollHeight + "px";
                icon.textContent = "−";
            } else {
                answer.style.maxHeight = null;
                icon.textContent = "+";
            }

        });

    });

});