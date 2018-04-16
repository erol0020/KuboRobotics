function getHardcodedList(){
  var forumList = {
    1 : {
      'title'    : 'HJÆLP! Jeg kan ikke finde ud af det',
      'content'  : 'Aenean massa leo, suscipit in posuere id, elementum eu dolor. Fusce vitae metus ac est suscipit condimentum non eget orci. Ut maximus tortor quis eros lacinia, ut condimentum urna porttitor. Aliquam faucibus ante non libero volutpat aliquet. Proin a ex elit. Nunc cursus tristique gravida. Quisque iaculis leo a eleifend interdum.',
      'date'     : '2018-04-02 14:26',
      'emoticon' : 2,
      'avatar'   : 'flemmingdibs.jpg',
      'name'     : 'Flemming Dibs',
      'school'   : 'Rosenvængets Skole'
    },
    2 : {
      'title'    : 'Jeg har nogle spørgsmål, jeg gerne vil stille jer',
      'content'  : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec purus mi, egestas vitae consectetur non, rhoncus non neque. Etiam tortor risus, tempor pellentesque malesuada nec, facilisis ac mi. Ut eu condimentum ante. Nulla finibus, lacus feugiat luctus viverra, arcu quam scelerisque mi, eget convallis lacus nisi sit amet risus. Fusce ultrices sodales hendrerit. Morbi blandit maximus libero, a accumsan erat tempor non. In eleifend sodales pretium. Duis sed sodales enim. Pellentesque aliquam ex eget neque hendrerit, quis facilisis sem molestie. Praesent quam ligula, porta vitae pretium quis, dapibus ut leo. Donec sed auctor massa.',
      'date'     : '2018-04-06 16:16',
      'emoticon' : 1,
      'avatar'   : 'jyttesteenphilipsen.jpg',
      'name'     : 'Jytte Steen Philipsen',
      'school'   : 'Nordre Skole'
    },
    3 : {
      'title'    : 'Hej alle sammen!',
      'content'  : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec purus mi, egestas vitae consectetur non, rhoncus non neque. Etiam tortor risus, tempor pellentesque malesuada nec, facilisis ac mi. Ut eu condimentum ante. Nulla finibus, lacus feugiat luctus viverra, arcu quam scelerisque mi, eget convallis lacus nisi sit amet risus. Fusce ultrices sodales hendrerit. Morbi blandit maximus libero, a accumsan erat tempor non. In eleifend sodales pretium. Duis sed sodales enim. Pellentesque aliquam ex eget neque hendrerit, quis facilisis sem molestie. Praesent quam ligula, porta vitae pretium quis, dapibus ut leo. Donec sed auctor massa.',
      'date'     : '2018-04-10 16:16',
      'emoticon' : 1,
      'avatar'   : 'ullapedersen.jpg',
      'name'     : 'Ulla Pedersen',
      'school'   : 'Rosenvængets Skole'
    }
  }
  localStorage.setItem('threads', JSON.stringify(forumList));
  location.reload();
}

document.getElementById('refresh-list').addEventListener('click', function(event){
  getHardcodedList();
});

document.getElementById('create-new').addEventListener('click', function(event){
  event.stopPropagation();
});

forumList = JSON.parse(localStorage.getItem('threads'));

// Function - get emoticon type
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

// Function - get date string danish format
function getDate(date){
  var string = new Date(date);
      string = string.getDate() + '/' + (string.getMonth() + 1) + '-' + string.getFullYear() + ' - ' + string.getHours() + ':' + string.getMinutes();
  return string;
}

for(var list in forumList){
  var imgDataArr = getType(forumList[list]['emoticon']);
  var dateString = getDate(forumList[list]['date']);

  var output  = '<li>';
        output += '<div class="forum-emoticon">';
          output += '<img class="forun-emoticon-icon" src="img/emoticons/' + imgDataArr['dir'] + '" alt="' + imgDataArr['alt'] + '">';
        output += '</div>';

        output += '<div class="forum-title">';
          output += '<a href="forum/post-' + list + '">' + forumList[list]['title'] + '</a>';
          output += '<time datetime="' + forumList[list]['date'] + '">' + dateString + '</time>';
        output += '</div>';

        output += '<div class="forum-member">';
          output += '<figure class="forum-avatar">';
            output += '<img src="img/avatar/' + forumList[list]['avatar'] + '" alt="' + forumList[list]['name'] + ' Dibs">';
          output += '</figure>';

          output += '<div class="forum-author">';
            output += '<p class="name">' + forumList[list]['name'] + '</p>';
            output += '<p class="school">' + forumList[list]['school'] + '</p>';
          output += '</div>';
        output += '</div>';

      output += '</li>';

  var ul = document.getElementById('list-target');
      ul.insertAdjacentHTML('beforeend', output);
}
