# Adventure into a Slim Framework

This is my basic have a shot at slim (<https://www.slimframework.com/>)

I've jazzed it up with the bootstrap framework, hardly ... bit of copy paste

I'm really just trying to understand Slim, I like the look of Lumen, Laravel - wow
that's a bit heavy handed, Slim seems lightweight, but needs to do what I want

## Recipe

1. Start with empty folder
2. Start with this composer file, note that the update command pulls in bootstrap and jQuery
    ```json
    {
      {
        "autoload": {
          "psr-4": {
          "": "src/",
          "home\\": "src/home"
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
    ```
1. composer req slim/slim slim/psr7 slim/php-view twbs/bootstrap

of importance to me is

## authentication

* if has to be global and session/form based
  * checking out _\Application_, it pulls in the _\middleware\auth_ - we see
    * if it's not session authenticated, it halts progress and shows a form
      * unless the method is post in which case
        * it looks for the logon
        * if if that is not validated it presents a json response
  * see _dao\users_ for a really crude and simple data access object which returns an
  array of 1 user - use your imagination and lookup a database etc ..

## views

* this is using PHP-View as recommende from [https://www.slimframework.com/docs/v4/features/templates.html], I've wrapped that in \view to give it some standard layout
* I'm a Model-View-Controller type guy
  * DAO are my Data Access Objects where I do my modelling, see the _\home_ folder/namespace
  for a controller and note the views folder - thats my View/Controller space

and I think this thing gets going
