# An expressive PHP wrapper for the Todoist API

**(WORK IN PROGRESS)**

This package provides an easy to work with PHP wrapper for the Todoist REST API.

## Requirements

Working with the Todoist API requires an API token, which you can get from https://todoist.com/prefs/integrations.

## Installation

The package can be installed via composer:
``` bash
composer require mediaboutique/todoist-api
```

## Usage

Here are some basic code examples of using this package.

Working with projects:

```php
use MediaBoutique\Todoist\Api\Todoist;

$todoist = new Todoist($token);

// Get all projects
$projects = $todoist->projects()->all();

// Create a new project
$project = $todoist->projects()->create([
    'name' => 'New project'
]);

// Update an existing project
$project->name = 'New project name';
$project->favorite = true;
$project->save();

// Get all active tasks for a project
$tasks = $project->tasks();

// Get all sections for a project
$sections = $project->sections();
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.