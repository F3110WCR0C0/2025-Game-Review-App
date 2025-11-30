This is my Advanced Web Development Project, and I will go through everything I did each day.

Day-1:

I initially made a ERD with foreign keys and 5 tables i then gathered the default Laravel tamplate then installed tailwind and breeze, I the edited my game controller, migrations and my seeder to have (statistics_id, review_id, genre_id id, name, release_date, price, discounts) i also ammended the welcome page to have information about who i am and got the login/register pages working.

Day-2:

I changed my ERD to 1 table since, for CA1, it would be simpler, and we should tackle this in CA2. I also changed my game controller, model, migrations, and seeder to have now (image). I made an image folder, and I made a create, edit, index, and show page. I also edited my web.php to have routes to other pages and forms and allow access to CRUD.

Day-3:

I finally got the show page to work. I added another game. Ammended the welcome page to have links to the login/register. I added links on the navigation bar so people can go to the view all game page. I also deleted some files that weren't doing anything to clean the folder. I refreshed my database and added a store function in the game controller. I also added create, show, alert success, so when u edit or delete, it gives a success text. I also deleted (statistics_id, review_id, genre_id) as they were not needed.

Day-4

I had some issues with the layout of the show page, as there was a huge empty space. Turns out it was due to a link error, so I fixed that, then I made it so the images were being displayed properly. Made a mistake in gameController with the edit and destroy function. In web.php, I added more routes to allow for full CRUD functionality, added a create a game link into the navigation bar with a mostly working create form, and made buttons for delete and edit in the show all page that caused the previous problem.

Day-5:

Fixed an issue where discounted prices were given in decimal(10,10) instead of decimal(10,2). Fixed an issue where images were not getting accepted in forms. Messed around with the welcome page again. Made a Game details section. Finally got Create, Store, Edit, and Delete all working, added timestamps into the migration, seeder, etc, to allow delete and other to work.

Day-6:

Simply made a way to get back to the welcome page and did some testing to ensure that no errors were coming and that the forms didn't accept any incorrect data.

Day-7:

I fixed issues that I had with images not appearing in the edit form. Added a non-functioning search bar, edited the welcome page more to show my experience. Fixed GitHub issues and readme, also made the success message after editing display the correct message sent to the professor.

Day-8:

Went through all the code and added comments demonstrating my understanding

Day-9:

I went through all my edit and delete buttons and created a new game page to only be accessed by admins, and when a user comes on, they don't see these options, and added a select option when creating an account to choose whether to be an admin or user.

Day-10:

I made the User Interface on the page a lot better and refined the admin options since I had a few issues on day 9

Day-11:

I started making a feedback controller so I can have a one-to-many relationship where one game has many feedbacks. I edited my game controller to allow feedback, made a model, migration, made it so only admins can edit/delete all the feedback; ever, a user can change their own. I also made a user interface for the feedback section on each game, and finally edited the routes so they can all connect, and made the game have a one-to-many relationship with feedback. 

Day-12:

I made a developer controller to have my first many-to-many relationship, where many games can have many developers. I also cleaned up and fixed a few errors in my feedback tables. Made the model for developers, made the game have a many-to-many relationship with developers. Made the migration for developers and had a seeder with about 8 developers with first_name, last_name, and company. I also fixed my database seeder. Previously, I had to call each seeder individually, but then I learned u can call them all inside the database seeder, saving time and efficiency, and finally added the correct links to web.php.

Day-13:

Started off by fixing some issues in my developer controller. I also had an issue with the delete function in feedback, but got that fixed. And I added a description to every game, so I had to edit the migration and seeder and change blade. Show and all that accordingly, I did a bit of testing to see if my new changes have worked correctly, made a developer card and a developer details page with a form so new developers can be created/edited.

Day-14:

Started off by changing where my submit buttons brought me after submitting to improve user experience, and did a bit more testing with images of all different sizes to see if the UI would adapt. I also changed the developer form so that there is a checklist of games that you can choose from to connect to the many-to-many relationship with the developer.

Day-15:

I decided I had too little information and data to show on developers, so I added bio and image, so on the index page, it just shows the image first and last name, then when you click for details, it shows everything else. I also gathered all my data and imagery with the corresponding developers of the games. I changed the preset values in both form inputs to make it look more appealing.

Day-16:

Did a bit of testing and fixed some UI problems

Day-17:

Decided to finally implement my search function. I had the visual of a search bar, but haven't done anything till now, so I made it so that when inputting a name of a developer or game, it would filter out everything but that, including new games or developers that have been added.

Day-18:

Made it so that when you view games or when you view developers, you can see what games they made and vice versa. Did some testing again, added a checkbox to the game-form.

Day-19:

Went through all my code to make it look cleaner and easier to read with better indentation, less visual clutter, etc. Also went through to add some comments, as I accidentally deleted a bunch and made a video explaining the code. I also went through this file to fix a lot of grammatical mistakes.
