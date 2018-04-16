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
