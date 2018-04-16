<div id="<?php echo $id ?>" class="forum-view-container">
  <div class="forum-view-content">
    <main class="forum-view-main" id="append-after">
      <h1 id="view-title" class="title">Title</h1>
      <time id="view-date" class="subtitle" datetime="2018-04-12">01/01-2000 - 00:00</time>

      <div id="view-content" class="content">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec purus mi, egestas vitae consectetur non, rhoncus non neque. Etiam tortor risus, tempor pellentesque malesuada nec, facilisis ac mi. Ut eu condimentum ante. Nulla finibus, lacus feugiat luctus viverra, arcu quam scelerisque mi, eget convallis lacus nisi sit amet risus. Fusce ultrices sodales hendrerit. Morbi blandit maximus libero, a accumsan erat tempor non. In eleifend sodales pretium. Duis sed sodales enim. Pellentesque aliquam ex eget neque hendrerit, quis facilisis sem molestie. Praesent quam ligula, porta vitae pretium quis, dapibus ut leo. Donec sed auctor massa.
        </p>
      </div>
    </main>

    <section class="forum-comment-container">
      <h2 class="title">
        Opret kommentar
        <span>
          Flemming Dibs
          <img src="img/avatar/flemmingdibs.jpg" alt="Flemming Dibs">
        </span>
      </h2>
      <form id="target-form" action="index.php" method="post">
        <textarea id="target-textarea" class="comment-textarea" name="post-comment"></textarea>
        <input type="submit" class="post-submit" value="Opret kommentar">
      </form>
    </section><!--/.forum-comment-container-->

  </div><!--/.forum-view-content-->


  <div class="forum-content-author">
    <div class="forum-content-username">
      <section>
        <h2 id="view-name" class="title">Navn</h2>
        <p id="view-school" class="subtitle">Skole</p>
      </section>

      <img id="view-emoticon" src="img/emoticons/happy.png" alt="Happy Emoticon">
    </div>

    <figure class="forum-view-profile">
      <img id="view-avatar" src="img/avatar/flemmingdibs.jpg" alt="Flemming Dibs">
    </figure>
  </div>
</div><!--/.forum-view-container-->

<script>
  var id = document.getElementsByClassName('forum-view-container')[0].id;

  var list = localStorage.getItem('threads');
      list = JSON.parse(list);

  // Get fate function
  function getDate(date){
    var string = new Date(date);
        string = string.getDate() + '/' + (string.getMonth() + 1) + '-' + string.getFullYear() + ' - ' + string.getHours() + ':' + string.getMinutes();
    return string;
  }

  // Get type function
  function getType(id){
    var imageData = {
      1 : {
        'dir' : 'happy.png',
        'alt' : 'Emoticon type happy'
      },
      2 : {
        'dir' : 'sad.png',
        'alt' : 'Emoticon type sad'
      },
      3 : {
        'dir' : 'surprised.png',
        'alt' : 'Emoticon type surprised'
      }
    }
    return imageData[id];
  }

  // Fetch data from array
  for(var key in list){
    if(key === id){
      var date = getDate(list[id]['date']);
      var arr  = getType(list[id]['emoticon']);

      // Title
      document.getElementById('view-title').innerHTML = list[id]['title'];

      // Date
      document.getElementById('view-date').innerHTML = date
      document.getElementById('view-date').setAttribute('datetime', list[id]['date']);

      // Content
      document.getElementById('view-content').innerHTML = list[id]['content']

      // Emoticon
      document.getElementById('view-emoticon').setAttribute('src', 'img/emoticons/' + arr['dir']);
      document.getElementById('view-emoticon').setAttribute('alt', arr['alt']);

      // Member
      document.getElementById('view-name').innerHTML = list[id]['name'];
      document.getElementById('view-school').innerHTML = list[id]['school'];
      document.getElementById('view-avatar').setAttribute('src', 'img/avatar/' + list[id]['avatar']);
      document.getElementById('view-avatar').setAttribute('alt', list[id]['name']);
    }
  }

  // Fetch comments from array
  var comments = JSON.parse(localStorage.getItem('comments'));

  if(comments != null){
    var referenceNode = document.querySelector('#append-after');
    var output = '<div class="the-comments">';

    for(var key in comments){
      if(id == comments[key]['target']){

        output  += '<div class="forum-comment">';
          output += '<div class="forum-comment-main">';
            output += '<p>' + comments[key]['comment'] + '</p>';
          output += '</div>';

          output += '<figure class="forum-comment-user">';
            output += '<figcaption>' + comments[key]['name'] + '</figcaption>';
            output += '<img src="img/avatar/' + comments[key]['avatar'] + '" alt="Flemming Dibs">';
          output += '</figure>';
        output += '</div>';
      }
    }

    output += '</div>';
    referenceNode.insertAdjacentHTML("afterend", output);
  }

  // Create comment script
  document.getElementById('target-form').addEventListener('submit', function(event){
    event.preventDefault();

    var content = document.getElementById('target-textarea').value;

    if(content == ''){
      alert('Du kan ikke oprette en tom kommentar!');
    } else {
      content = '<p>' + content.replace(/\n/g, "</p>\n<p>") + '</p>';
      content = content.replace('<p></p>', '');

      if(comments == null){
        comments = {
          1 : {
            'name'    : 'Flemming Dibs',
            'avatar'  : 'flemmingdibs.jpg',
            'target'  : id,
            'comment' : content
          }
        }

      } else {

        for(var key in comments){
          var newId = (parseInt(key) + 1);
        }

        comments[newId] = {
          'name'    : 'Flemming Dibs',
          'avatar'  : 'flemmingdibs.jpg',
          'target'  : parseInt(id),
          'comment' : content
        }
      }

      localStorage.setItem('comments', JSON.stringify(comments));
      location.reload();
    }
  });
</script>
