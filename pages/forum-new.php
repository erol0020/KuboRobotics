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

<script>
  var list = localStorage.getItem('threads');
      list = JSON.parse(list);

  document.getElementById('target-form').addEventListener('submit', function(event){
    event.preventDefault();

    for(var key in list){
      var id = (parseInt(key) + 1);
    }

    var content = document.getElementById('target-textarea').value;
        content = '<p>' + content.replace(/\n/g, "</p>\n<p>") + '</p>';
        content = content.replace('<p></p>', '');

    var date = new Date();
        date = date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2) + ' ' + ('0' + date.getDate()).slice(-2) + ':' + ('0' + date.getMinutes()).slice(-2);

    var obj = {
      'title'    : document.getElementById('target-title').value,
      'content'  : content,
      'date'     : date,
      'emoticon' : document.querySelector('input[name="post-type"]:checked').value,
      'avatar'   : 'flemmingdibs.jpg',
      'name'     : 'Flemming Dibs',
      'school'   : 'Rosenvængets Skole'
    }

    list[id] = obj
    list = JSON.stringify(list);
    localStorage.setItem('threads', list);

    window.location.href = 'http://localhost/KuboRobotics/forum';
  });
</script>
