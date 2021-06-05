# Address

return json data about product

## Get address

get all address from database

### URL

```http
GET /api/address
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
            "id": 1,
            "address_name": "ที่อยู่ร้าน",
            "address": "Apple Headquarter",
            "address2": null,
            "province_id": 1,
            "district_id": 1,
            "firstname": null,
            "lastname": null,
            "telephone": "000-000-0000"
        },
        {
            "id": 2,
            "address_name": "บ้านหนองเดิ่น",
            "address": "112 ม.7",
            "address2": null,
            "province_id": 2,
            "district_id": 2,
            "firstname": "สิรินาถ",
            "lastname": "จริยพันธ์",
            "telephone": "0610766798"
        }
    ],
    "message": "Address retrieved successfully."
}
```

## Get Address

get single data from address id

### URL

```http
GET /api/address/{id}
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
        "address_name": "ที่อยู่ร้าน",
        "address": "Apple Headquarter",
        "address2": null,
        "province_id": 1,
        "district_id": 1,
        "firstname": null,
        "lastname": null,
        "telephone": "000-000-0000"
    },
    "message": "Address retrieved successfully."
}
```