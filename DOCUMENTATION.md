# Person API Documentation
## Table of Contents
- <a href="#introduction">Introduction</a>
- <a href="#endpoints">Endpoints</a>
    - <a href="#create">Create New Person</a>
    - <a href="#read">Read A Person</a>
    - <a href="#update">Update A Person</a>
    - <a href="delete">Delete A Person</a>
- <a href="#errors">Error Handling</a>


<span id="introduction"></span>

## Introduction
This documentation provides details about the endpoints and responses for the Person API. The API allows you to manage information about individuals.

<span id="endpoints"></span>

## Endpoints
<span id="create"></span>

### Create New Person
- **URL:** `base_url/api`
- **Method:** POST
- **Description:** Create a new person.

#### Request
```json
{
    "name": "jane doe"
}
```

#### Response
HTTP status code: 201 (Created)
```json
{
    "data": [
        {
            "id": 1,
            "name": "John Doe"
        }
    ]
}
```

<span id="read"></span>

### Read A Person
- **URL:** `base_url/api/{id|name}`
- **Method:** GET
- **Description:** Retrieve a specific user by ID or name.

#### Request
No request body is required for this endpoint.

#### Response
HTTP status code: 200 (OK)
```json
{
    "data": [
        {
            "id": 1,
            "name": "John Doe"
        }
    ]
}
```

<span id="update"></span>

### Update A Person
- **URL:** `base_url/api/{id|name}`
- **Method:** PUT
- **Description:** Update an existing person's data by Person's ID or name

#### Request
```json
{
    "name": "new jane doe"
}
```

#### Response
HTTP status code: 200 (OK)
```json
{
    "data": [
        {
            "id": 1,
            "name": "new jane doe"
        }
    ]
}
```

<span id="delete"></span>

### Delete A Person
- **URL:** `base_url/api`
- **Method:** DELETE
- **Description:** Delete a person.

#### Request
No request body is required for this endpoint.

#### Response
HTTP status code: 204 (No content)

<span id="errors"></span>

## Error Handling
The API may return error responses with appropriate HTTP status codes and error details in the response body.

- 422 - Unprocessable content: Invalid request format or missing required fields.
- 404 - Not Found: Request person or endpoint not found
- 500 - Internal Server Error: An internal server error occurred.

Sample response
```json
{
    "error": "error message goes here"
}
```