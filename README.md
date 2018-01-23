This is an InfyOmLabs / adminlte-generator fork with a few different purposes, see:

For launching products we have several options maybe even more efficient than Laravel, depending on your need. However, scheduling on something that is already customary helps a lot to be agile and validate ideas.

Because of this, I am grouping some facilities so that, with each new project, we can start from something already started, well structured and rapidly evolving.

For this, I rely on infyOm for the creation of the Scaffold (CRUD generator).
For this project, I put together a folder with several CRUD templates that are automatically created from a command. Perhaps none of them meets your need, but certainly the existing model can make your job faster.

## What can I get out of it, the way it is?

1. A basic functional application with AdminLTE;
2. Create each CRUD in less than 2 minutes;

## Use
Download the package
` git clone https://github.com/srdavidsilva/adminlte-generator.git `

Install dependencies;
` composer install `

Copy the .env.example to you;
`cp .env.example .env`

Configure your database;

Set the name of the application in .env;
