<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FAQ - Euphoric 2025</title>
  <link rel="stylesheet" href="./assets/css/styles.css">
  <link rel="stylesheet" href="./assets/css/faq.css">
  <link rel="stylesheet" href="./assets/css/dark-mode.css">

</head>
<body>

  <!-- ✅ Navbar Include -->
  <?php include './navbar.php'; ?>

  <main class="faq-container">
    <h1>Frequently Asked Questions</h1>

    <div class="faq-section">
      <h2>General</h2>
      <div class="faq-question">Is there any registration fee?</div>
      <div class="faq-answer"><p>No, all events are free for registered students.</p></div>

      <div class="faq-question">Who should I contact if I face issues?</div>
      <div class="faq-answer"><p>You can contact the event coordinator. Their details are on the coordinators page.</p></div>
    </div>

    <div class="faq-section">
      <h2>Registration</h2>
      <div class="faq-question">How do I register for multiple events?</div>
      <div class="faq-answer"><p>You can fill separate forms for each event or use the multi-event registration option.</p></div>

      <div class="faq-question">What are the rules for team participation?</div>
      <div class="faq-answer"><p>Teams can have 2-5 members. Each member must register individually and then link to the team.</p></div>
    </div>

  </main>

 <!-- ✅ Footer Include -->
  <?php include 'includes/footer.php'; ?>
  <script>
    <script>
  document.querySelectorAll(".faq-question").forEach((q) => {
    q.addEventListener("click", () => {
      q.classList.toggle("active");
      const answer = q.nextElementSibling;
      if (q.classList.contains("active")) {
        answer.style.maxHeight = answer.scrollHeight + "px";
        q.querySelector(".icon");
      } else {
        answer.style.maxHeight = null;
      }
    });
  });
</script>

  </script>
  <script src="assets/js/faq.js"></script>
</body>
</html>
