# Notes API

This project is a simple REST API application built with Laravel. It allows CRUD operations for personal notes, including features like storing, updating, and deleting notes.

## Features
- Store notes with title, author, date/time, body, and classification.
- Fully functional CRUD API.
- Built with Laravel and MySQL.

## How to Install
- Clone the repository.
- Run `composer install`.
- Configure `.env` file.
- Run `php artisan migrate`.

## Endpoints
- `GET /api/notes` - List all notes.
- `POST /api/notes` - Create a note.
- `GET /api/notes/{id}` - View a specific note.
- `PUT /api/notes/{id}` - Update a note.
- `DELETE /api/notes/{id}` - Delete a note.
