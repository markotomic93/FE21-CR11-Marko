# FE21-CR11-Marko

Admin INFO:

email:marko@admin.com
password:password

User INFO:

email:marko@user.com
password:password

110 Points Reached

Create a GitHub Repository named: FE21-CR11-YourName. Push the files into it and send the link through the learning management system (LMS). Set your repository to private. Add codefactorygit as a collaborator. See an example of a GitHub link below:

https://github.com/JohnDoe/repositoryname.git.

Your MySQL database MUST be named: fswd13_cr11_petadoption_yourname

For this CodeReview, the following criteria will be graded:

 
(5) Create a database ( fswd13_cr11_petadoption_yourname) initially with 2 tables: users and animals. Add sufficient test data in the animals table: at least 10 records in total between small animals and large animals. Remember that animals have their age so make sure there are at least 4 senior animals in the DB (older than 8 years old).

(20) Display all animals on a single web page (home.php). Make sure a nice GUI is presented here(backenders exempt)

(15) Display all senior animals. Here you can decide whether to create a filter on the home page or create a new page senior.php

(15) Create a show more/show details button that will lead to a new page with only the information from that specific record/animal.

(15) Create a registration and login system.

Create separate sessions for normal users and administrators.

(15)Normal Users:

They will be able to ONLY see(read) and access all data. No action buttons (create, edit or delete) should be available.

(15) Admin:

Only the admin is able to create, update and delete data about animals (not users) within the admin panel, therefore an Admin Panel/Dashboard  should be created.

Bonus points
(20)Pet Adoption

In order to accomplish this task, a new table pet_adoption will need to be created. This table should hold the userId and the petId (as foreign keys) plus other information that you may think is relevant i.e: adoption_date. 

Each Pet information/card should have a button "Take me home" that when clicked, will "adopt" the pet. When it does, a new record should be created in the table pet_adoption.

Hint: if you use the POST method to create the adoption, you will need a form. Get method won't need it. You can expand on it creating a status for the pet and it only shows to be adopted according to its status. Not required though.

