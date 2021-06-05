# Personal

return json data about personal

## Get personals

get all personals from database

### URL

```http
GET /api/personals
```

### Header

```

```

### Responses

```javascript
{
    "success": true,
    "data": {
        "id": 1,
        "name": "สิรินาถ จริยพันธ์",
        "email": "jariyapun17@gmail.com",
        "phone": "0610766798",
        "role": 1
    },
    "message": "Personal retrieved successfully."
}
```

## Get personal

get single data from personal id

### URL

```http
GET /api/personals/{id}
```

### Header

```
'headers' => [
    'Accept' => 'application/json',
    'Authorization' => 'Bearer '.$accessToken,
    ]
```

### Responses

```javascript
{
    "success": true,
    "data": {
        "id": 1,
        "name": "สิรินาถ จริยพันธ์",
        "email": "jariyapun17@gmail.com",
        "phone": "0610766798",
        "role": 1
    },
    "message": "Personal retrieved successfully."
}
```