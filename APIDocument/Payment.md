# Payment

return json data about payment

## Get payments

get all payments from database

### URL

```http
GET /api/payments
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
            "success": true,
    "data": [
        {
            "id": 1,
            "order_id": 1,
            "image": "https://ase.kku.ac.th/api/v1/002.jpg",
            "status": 1
        }
    ],
    "message": "Payments retrieved successfully."

}
```

## Get payment

get single data from payment id

### URL

```http
GET /api/payments/{id}
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
        "order_id": 1,
        "image": "https://ase.kku.ac.th/api/v1/002.jpg",
        "status": 1
    },
    "message": "Payment retrieved successfully."
}
```