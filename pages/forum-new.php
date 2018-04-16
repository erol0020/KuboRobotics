<main class="main-content">
  <h1 class="title">Opret ny indlæg</h1>

  <form id="target-form" class="post-form" onsubmit="event.preventDefault()" action="index.html" method="post">
    <div class="post-main-container">
      <label>Titel
        <input id="target-title" type="text" name="post-title" required>
      </label>

      <label class="label-block">Indhold
        <textarea id="target-textarea" name="post-content"></textarea>
      </label>

      <input class="post-submit" type="submit" value="Opret">
    </div>

    <div class="post-type-container">Tråd type ikon
      <div>
        <input type="radio" name="post-type" required value="1"> <img src="img/emoticons/happy.png" alt="Happy"> Glad
      </div>

      <div>
        <input type="radio" name="post-type" required value="2"> <img src="img/emoticons/sad.png" alt="Sad"> Ked af det
      </div>

      <div>
        <input type="radio" name="post-type" required value="3"> <img src="img/emoticons/surprised.png" alt="Surprised"> Overrasket
      </div>
    </div>
  </form>
</main>

<script src="js/forum-new.js"></script>
