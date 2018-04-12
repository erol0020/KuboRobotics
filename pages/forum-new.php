<main class="main-content">
  <h1 class="title">Opret ny indlæg</h1>

  <form class="post-form" action="index.html" method="post">
    <div class="post-main-container">
      <label>Titel
        <input type="text" name="post-title" required>
      </label>

      <label class="label-block">Indhold
        <textarea name="post-content"></textarea>
      </label>

      <input class="post-submit" type="submit" value="Opret">
    </div>

    <div class="post-type-container">Tråd type ikon
      <div>
        <input type="radio" name="post-type" value="1"> <img src="img/emoticons/happy.png" alt="Happy"> Glad
      </div>

      <div>
        <input type="radio" name="post-type" value="2"> <img src="img/emoticons/sad.png" alt="Sad"> Ked af det
      </div>

      <div>
        <input type="radio" name="post-type" value="3"> <img src="img/emoticons/surprised.png" alt="Surprised"> Overrasket
      </div>
    </div>
  </form>
</main>
