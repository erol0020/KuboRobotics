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
        output += '<section class="forum-comment-main">';
          output += '<h2>' + comments[key]['name'] + '</h2>';
          output += '<p>' + comments[key]['comment'] + '</p>';
          output += '<button class="delete-comment" value="' + key + '">Slet kommentar</button>';
        output += '</section>';

        output += '<figure class="forum-comment-user">';
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

    if(comments == null || Object.keys(comments).length < 1){
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

var deleteBtn = document.getElementsByClassName('delete-comment');
for(var deleteId in deleteBtn){
  deleteBtn[deleteId].addEventListener('click', function(){
    var deleteTarget = this.value;
    delete comments[deleteTarget];

    if(confirm('Er du sikker på du vile slette din kommentar?')){
      localStorage.setItem('comments', JSON.stringify(comments));
      location.reload();
    }
  });
}
