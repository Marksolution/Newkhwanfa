# API

-   [Register](#Register)
-   [Login](#Login)
-   [Product](Product.md)
- [Shop](Shop.md)
- [Cart](Cart.md)
- [Profile](Profile.md)
- [Order](Order.md)

### Create to personal access client not found

for fix RuntimeException use this command to fix `RuntimeException: Personal access client not found. Please create one.`

```batch
php artisan passport:install
```

# Register

### URL

```http
POST /api/register
```

### Parametter

| Parameter    | Type     | Description   |
| :----------- | :------- | :------------ |
| `name`       | `string` | **Required**. |
| `email`      | `string` | **Required**. |
| `phone`      | `string` | **Required**. |
| `password`   | `string` | **Required**. |
| `c_password` | `string` | **Required**. |

### Responses

```javascript
{
    "success": bool,
    "data": {
        "token": string,
        "name": string
    },
    "message": string
}
```

# Login

### URL

```http
POST /api/login
```

### Parametter

| Parameter  | Type     | Description   |
| :--------- | :------- | :------------ |
| `email`    | `string` | **Required**. |
| `password` | `string` | **Required**. |

### Responses

```javascript
{
    "success": bool,
    "data": {
        "token": string,
        "name": string
    },
    "message": string
}
```
