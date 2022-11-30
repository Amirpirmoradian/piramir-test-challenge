# Piramir Test Challenge
This is an test plugin that I deveolped as test challenge for Realtyna
## Features

- Add/Edit/Delete Movies.
- Add/Edit/Delete Genres for movies
- Add/Edit/Delete Movie Tags for movies
- Show list of movies in wordpress REST-API
    - I added default show_in_rest to custom post creation if you want me to add custom endpoints to WordPress API please raise an issue and I'll get it done
- Show list of of movies with a short-code in pages
    - You can use ```[movies_list orderby="id" order="ASC" posts_per_page="10" ]```
        - All parameters are optional
- Show details of movies in a separated page


## Explanation
The structure design that I choose is not the best for small plugins, but I Wanted to show you how I can handle big plugins with lots of classes. of course there is other options.


if there is gonna be a lots of custom post types or custom taxonomy or ... we can define an interface for them to maintain clean code then try loading all of them at once like what I did in ```Init.php```.


I used composer psr4 autoload to load all my classes in inc folder and add a helper file(see ```./inc/Helper.php```).


I created new taxonomy called movie tags, but I could use wordpress post-tag by adding ```'taxonomies' => array('post_tag')``` to custom post register args.

I developed a two functions in ```Helper.php``` that are responsible for finding right template files. it first tries to find them in child theme then parent theme and if it didn't find the template in either of them it will use plugins templates.

I created template file for movies single page(see ```./templates/movies/single.php```) but I did not make a beautifull cuase this job apply is for back-end developer not front-end developer
## Installation
Just copy plugin folder into ```wp-content/plugins``` or try installing using WordPress dashboard

## Thanks
**Thank you for giving me the opportunity to show my abilities.**