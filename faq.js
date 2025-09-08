const questions = document.querySelectorAll('.faq-question');

questions.forEach(q => {
  q.addEventListener('click', () => {
    // Toggle active class
    q.classList.toggle('active');

    // Toggle the answer
    const answer = q.nextElementSibling;
    if (q.classList.contains('active')) {
      answer.style.maxHeight = answer.scrollHeight + 'px';
    } else {
      answer.style.maxHeight = '0';
    }
  });
});
