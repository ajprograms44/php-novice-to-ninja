
<p><?=$variables['total']?> jokes have been submitted to the Internet Joke Database</p>
  <?php foreach ($jokes as $joke): ?>
    <blockquote>
      <p>
        <?=htmlspecialchars($joke['joketext'], ENT_QUOTES, 'UTF-8') ?>
        <br>

        (by <a href="mailto:<?=htmlspecialchars($joke['email'], ENT_QUOTES, 'UTF-8') ?>">
        <?=htmlspecialchars($joke['name'], ENT_QUOTES, 'UTF-8') ?>
        </a>
        on
        <?php
        $date = new DateTime($joke['jokedate']);
        echo $date->format('F jS Y');
        ?>
        )

        <a href="/joke/edit?id=<?=$joke['id']?>">Edit</a>
        
        <form action="/joke/delete" method="post">
          <input type="hidden" name="id" value="<?=$joke['id']?>">
          <input type="submit" value="Delete">
        </form>
      </p>
    </blockquote>
  <?php endforeach; ?>


<!-- Each joke will be displayed with a form, which if submitted, will delete that joke. We signal this to the new controller, 
deletejoke.php using the form's 'action' attribute

When we submit the form to delete this joke, we send along the ID of the joke to be deleted. 
To do this, we need a form field containing the joke’s ID, but we’d prefer to keep this field hidden from the user; 
that’s why we use a hidden form field (input type="hidden"). The name of this field is id, 
and its value is the ID of the joke to be deleted ($joke['id']).

****The form should really be outside of the blockquote element
