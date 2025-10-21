This is my Advanced Web Development Project and i will go through everything i did between each day.

Day-1:

I initially made a ERD with foreign keys and 5 tables i then gathered the default Laravel tamplate then installed tailwind and breeze, I the edited my game controller, migrations and my seeder to have (statistics_id, review_id, genre_id id, name, release_date, price, discounts) i also ammended the welcome page to have information about who i am and got the login/register pages working.

Day-2:

I changed me ERD to have 1 table since for CA1 it would be less complicated and we should tackle this in CA2. I also changed my game controller, model, migrations and seeder to now have (image). I made an image folder and i made a create, edit, index and show page. I also eddited my web.php to have routes to other pages and forms and allow access to CRUD.

Day-3:

I finally got the show page to work. I added another game. Ammended the welcome page to have links to the login/register. I added links on the navigatiion bar so people can go to the view all game page. I also deleted some files that werent doing anything to clean the folder i refreshed my database added store function in game controller i also added create, show, alert success so when u edit or delete it gives a success txt, i also deleted (statistics_id, review_id, genre_id) as they were not needed.

Day-4

I had some issues with the layout of the show page as there was huge empty space turns out it was due to a link error so i fixed that then i made it so the images were being displayed properly. Made a mistake in gameController with the edit and destory function. In web.php i added more routes to allow for full CRUD functionality added a creat a game link into the navigation bar with a mostly working create form made buttons for delete and edit in the show all page that caused the previous problem.

Day-5:

Fixed an issue where discounted prices were given in decimal(10,10) instead of decimal(10,2) fixed an issue where images were not getting accepted in forms. Messed around with welcome page again. Made a Game details section. finally got Create, Store, Edit, Delete all working added timestamps into the migration, seeder etc.. to allow delete and other to work.

Day-6:

Simply made a way to get back to the welcome page and did some testing to ensure that no errors were coming and that the forms diddint accept any incorrect data.

Day-7:

I fixed issues that i had with images not appearing in edit form. Added a non-functining search-bar, edited the welcome page more to show my experience. Fixed Github issues and readme also made the success message after editing display the correct message sent project to professor.

Day-8:

Went Through all code and added comments deminstrating my understanding