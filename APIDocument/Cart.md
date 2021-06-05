# Cart

return json data about product

## Get carts

get all carts from database

### URL

```http
GET /api/carts
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
    "data": [
        {
            "cart_id": 1,
            "product_id": 1,
            "name": "ขวัญฟ้า ใบเมี่ยงไรซ์เบอรี่ S",
            "detail": "",
            "amount": 12,
            "cost": 39,
            "saleprice": 39
        }
    ],
    "message": "cart item retrieved successfully."
}
```

## Get cart

get single data from cart id

### URL

```http
GET /api/carts/{id}
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
    "data": [
        {
            "cart_id": 1,
            "product_id": 1,
            "name": "ขวัญฟ้า ใบเมี่ยงไรซ์เบอรี่ S",
            "detail": "",
            "amount": 12,
            "cost": 39,
            "saleprice": 39
        }
    ],
    "message": "cart item retrieved successfully."
}
```