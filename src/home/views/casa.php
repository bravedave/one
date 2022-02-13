<article>
  <h1>Ciao World !</h1>

  <p>This is my basic have a shot at slim (https://www.slimframework.com/)</p>

  <p>I've jazzed it up with the bootstrap framework, hardly ... bit of copy paste</p>

  <ol>
    <li>Started with empty folder</li>
    <li>added this composer file, note that the update command pulls in bootstrap and jQuery
      <div class="bg-light py-2 px-4 mb-2 font-monospace" style="white-space: pre-wrap; font-size: 10pt;">
{
  {
  "autoload": {
    "psr-4": {
      "": "src/"
    }
  },
  "scripts": {
    "post-update-cmd": [
      "[ -d public/css ] || mkdir -p public/css",
      "[ -d public/js ] || mkdir -p public/js",
      "cp vendor/twbs/bootstrap/dist/css/bootstrap.min.css public/css/",
      "cp vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js public/js/",
      "[ -f public/js/jquery.js ] || curl -o public/js/jquery.js https://code.jquery.com/jquery-3.6.0.min.js"
    ]
  }
}
      </div>
    </li>
    <li>then...<br>
    composer req slim/slim slim/psr7 slim/php-view twbs/bootstrap</li>

  </ol>

  <p>of importance to me is:</p>
  <ul>
    <li><strong>authentication</strong>
      <ul>
        <li>if has to be global and session/form based<br>
          checking out <em>\Application</em>, it pulls in the <em>\middleware\auth</em><br>
          we see
          <ul>
            <li>if it's not session authenticated, it halts progress and shows a form</li>
            <li>unless the method is post in which case
              <ul>
                <li>it looks for the logon</li>
                <li>if if that is not validated it presents a json response</li>
              </ul>
            </li>
            <li>see <em>dao\users</em> for a really crude and simple
              data access object which returns an array of 1 user
              - use your imagination and lookup a database etc ..</li>
          </ul>
        </li>
      </ul>
    </li>

    <li><strong>views</strong>
      <ul>
        <li>this is using PHP-View as recommende from https://www.slimframework.com/docs/v4/features/templates.html,
          I've wrapped that in <em>\view</em> to give it some standard layout
        </li>
        <li>I'm a Model-View-Controller type guy, DAO are my Data Access Objects where I do my modelling,
          see the <em>\home folder/namespace</em> for a controller and note the views folder
          - thats my View/Controller space<br>
          <br>
          and I think this thing gets going...</li>
      </ul>
    </li>

  </ul>

</article>
