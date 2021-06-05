# Promotion

return json data about product

## Get products

get all prooducts from database

### URL

```http
GET /api/promotions
```

### Header

```

```

### Responses

```javascript
{
    "success": true,
    "data": [
        {
            "id": 1,
            "name": "asdasd",
            "product_id": 1,
            "cost_product": 42,
            "promotion_price": 24
        },
        {
            "id": 2,
            "name": "asdasd",
            "product_id": 1,
            "cost_product": 42,
            "promotion_price": 24
        }
    ],
    "message": "Promotions retrieved successfully."
}
```

## Get product

get single data from product id

### URL

```http
GET /api/products/{id}
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
        "name": "asdasd",
        "product_id": 1,
        "cost_product": 42,
        "promotion_price": 24
    },
    "message": "Promotion retrieved successfully."
}
```
