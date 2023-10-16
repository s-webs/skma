const faqQuestionHeaders = [...document.querySelectorAll(".faq_question_header")];
const faqModal = document.querySelector(".faq_modal");
const faqModalClose = document.querySelector(".faq_modal_close");
const faqAdd = document.querySelector(".faq_add");

const closeFaqModal = () => {
    faqModal.classList.add("d-none");
}

const addFaq = () => {
    faqModal.classList.remove("d-none");
    faqModal.classList.add("d-flex");
}

const questionListener = (question) => {
    question.nextElementSibling.classList.toggle("d-flex");
}

faqQuestionHeaders.map(question => {
    question.addEventListener('click', () => questionListener(question));
});

faqModalClose.addEventListener("click", closeFaqModal);
faqAdd.addEventListener("click", addFaq);