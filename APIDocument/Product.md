# Product

return json data about product

## Get products

get all prooducts from database

### URL

```http
GET /api/products
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
    "success": boolean,
    "data": array[
        {
            "id": integer,
            "product_name": string,
            "product_detail": string,
            "type_id": integer,
            "type_name": string,
            "shop_id": integer,
            "shop_name": string,
            "detail": string,
            "cost": integer,
            "status": integer,
            "saleprice": integer,
            "imagename" : string
        }
    ],
    "message": string
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
    "success": boolean,
    "data":
        {
            "id": integer,
            "type_id": integer,
            "type_name": string,
            "shop_id": integer,
            "shop_name": string,
            "product_name": string,
            "detail": string,
            "cost": integer,
            "saleprice": integer,
            "status": integer,
        }
    "message": string
}
```
