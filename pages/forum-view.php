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

<script src="js/forum-view.js"></script>
