---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://condo-world-engine.com/docs/collection.json)

<!-- END_INFO -->

#BookingPal
<!-- START_7f9494f4782cdd228f9ac797e15996af -->
## Search Locations

> Example request:

```bash
curl -X GET -G "/api/1.0.0/bookingPal/locations/search/{term}" 
```

```javascript
const url = new URL("/api/1.0.0/bookingPal/locations/search/{term}");

    let params = {
            "Search": "z5fhurCJTEnuB8ve",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[
    {
        "ID": "88790",
        "label": "London, United Kingdom of GB",
        "isLocationParent": false
    },
    {
        "ID": "93865",
        "label": "London Camden \/ Kings Cross, United Kingdom of GB",
        "isLocationParent": false
    },
    {
        "ID": "184393",
        "label": "London Borough of Wandsworth, United Kingdom of GB",
        "isLocationParent": false
    },
    {
        "ID": "178049",
        "label": "Londonderry, VT, United States of America",
        "isLocationParent": false
    },
    {
        "ID": "179987",
        "label": "London Borough of Southwark, United Kingdom of GB",
        "isLocationParent": false
    },
    {
        "ID": "98033",
        "label": "London Islington, United Kingdom of GB",
        "isLocationParent": false
    },
    {
        "ID": "88793",
        "label": "London North West, United Kingdom of GB",
        "isLocationParent": false
    },
    {
        "ID": "88794",
        "label": "London South East, United Kingdom of GB",
        "isLocationParent": false
    }
]
```

### HTTP Request
`GET /api/1.0.0/bookingPal/locations/search/{term}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    Search |  optional  | Term required

<!-- END_7f9494f4782cdd228f9ac797e15996af -->

<!-- START_4a50bd96105c485ea457e74c10a5be1f -->
## Search Related Locations

> Example request:

```bash
curl -X GET -G "/api/1.0.0/bookingPal/locations/search/related/{term}" 
```

```javascript
const url = new URL("/api/1.0.0/bookingPal/locations/search/related/{term}");

    let params = {
            "Search": "l3RGWJuUv3Ji8wNd",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[
    {
        "locations_response": {
            "messageCode": "",
            "message": "",
            "is_error": false,
            "result_count": 1,
            "locations": [
                {
                    "ID": 13,
                    "label": "London, United Kingdom",
                    "type": null
                }
            ]
        }
    }
]
```

### HTTP Request
`GET /api/1.0.0/bookingPal/locations/search/related/{term}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    Search |  optional  | Term required

<!-- END_4a50bd96105c485ea457e74c10a5be1f -->

<!-- START_f6fd94a62280760caf31c56f40d74726 -->
## Locations Check

> Example request:

```bash
curl -X GET -G "/api/1.0.0/bookingPal/locations/check/{term}" 
```

```javascript
const url = new URL("/api/1.0.0/bookingPal/locations/check/{term}");

    let params = {
            "Search": "GPTW4yWsyUnaULSO",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[
    {
        "error": false,
        "error_message": "",
        "data": {
            "ID": "21980"
        }
    }
]
```

### HTTP Request
`GET /api/1.0.0/bookingPal/locations/check/{term}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    Search |  optional  | Term required

<!-- END_f6fd94a62280760caf31c56f40d74726 -->

<!-- START_288e31029e0eef17f8ce4c0a7366a1f6 -->
## All Locations

> Example request:

```bash
curl -X GET -G "/api/1.0.0/bookingPal/locations/{term}" 
```

```javascript
const url = new URL("/api/1.0.0/bookingPal/locations/{term}");

    let params = {
            "Search": "DCGwk59e3LULAnVc",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[
    {
        "ID": "21980",
        "label": "Paris, France",
        "isLocationParent": false
    },
    {
        "ID": "176628",
        "label": "Paris, ME, United States of America",
        "isLocationParent": false
    },
    {
        "ID": "92650",
        "label": "Paris\/17, France",
        "isLocationParent": false
    },
    {
        "ID": "115148",
        "label": "Parisot, France",
        "isLocationParent": false
    }
]
```

### HTTP Request
`GET /api/1.0.0/bookingPal/locations/{term}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    Search |  optional  | Term required

<!-- END_288e31029e0eef17f8ce4c0a7366a1f6 -->

<!-- START_2e9d17d169e78ca1c0294bfab40663ad -->
## Location Prices

> Example request:

```bash
curl -X GET -G "/api/1.0.0/bookingPal/locations/{locationID}/prices/from_date/{fromDate}/to_date/{toDate}" 
```

```javascript
const url = new URL("/api/1.0.0/bookingPal/locations/{locationID}/prices/from_date/{fromDate}/to_date/{toDate}");

    let params = {
            "LocationID": "EWnUdk2gIwrqYa0s",
            "fromDate": "fMcyofok3yXbLp6h",
            "toDate": "JCKmweDhiFmYoNA8",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "ranges": {
        "messageCode": "",
        "propertyId": 291358,
        "currency": "USD",
        "message": "",
        "is_error": false,
        "range": [
            {
                "week": 25,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2019-06-16"
            },
            {
                "week": 26,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2019-06-23"
            },
            {
                "week": 27,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2019-06-30"
            },
            {
                "week": 28,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2019-07-07"
            },
            {
                "week": 29,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2019-07-14"
            },
            {
                "week": 30,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2019-07-21"
            },
            {
                "week": 31,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2019-07-28"
            },
            {
                "week": 32,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2019-08-04"
            },
            {
                "week": 33,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2019-08-11"
            },
            {
                "week": 34,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2019-08-18"
            },
            {
                "week": 35,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2019-08-25"
            },
            {
                "week": 36,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2019-09-01"
            },
            {
                "week": 37,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2019-09-08"
            },
            {
                "week": 38,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2019-09-15"
            },
            {
                "week": 39,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2019-09-22"
            },
            {
                "week": 40,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2019-09-29"
            },
            {
                "week": 41,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2019-10-06"
            },
            {
                "week": 42,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2019-10-13"
            },
            {
                "week": 43,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2019-10-20"
            },
            {
                "week": 44,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2019-10-27"
            },
            {
                "week": 45,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2019-11-03"
            },
            {
                "week": 46,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2019-11-10"
            },
            {
                "week": 47,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2019-11-17"
            },
            {
                "week": 48,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2019-11-24"
            },
            {
                "week": 49,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2019-12-01"
            },
            {
                "week": 50,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2019-12-08"
            },
            {
                "week": 51,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2019-12-15"
            },
            {
                "week": 52,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2019-12-22"
            },
            {
                "week": 1,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2019-12-29"
            },
            {
                "week": 2,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2020-01-05"
            },
            {
                "week": 3,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2020-01-12"
            },
            {
                "week": 4,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2020-01-19"
            },
            {
                "week": 5,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2020-01-26"
            },
            {
                "week": 6,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2020-02-02"
            },
            {
                "week": 7,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2020-02-09"
            },
            {
                "week": 8,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2020-02-16"
            },
            {
                "week": 9,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2020-02-23"
            },
            {
                "week": 10,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2020-03-01"
            },
            {
                "week": 11,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2020-03-08"
            },
            {
                "week": 12,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2020-03-15"
            },
            {
                "week": 13,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2020-03-22"
            },
            {
                "week": 14,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2020-03-29"
            },
            {
                "week": 15,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2020-04-05"
            },
            {
                "week": 16,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2020-04-12"
            },
            {
                "week": 17,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2020-04-19"
            },
            {
                "week": 18,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2020-04-26"
            },
            {
                "week": 19,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2020-05-03"
            },
            {
                "week": 20,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2020-05-10"
            },
            {
                "week": 21,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2020-05-17"
            },
            {
                "week": 22,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2020-05-24"
            },
            {
                "week": 23,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2020-05-31"
            },
            {
                "week": 24,
                "minPrice": 356,
                "maxPrice": 356,
                "avgPrice": 356,
                "minstay": "4",
                "startDate": "2020-06-07"
            }
        ]
    }
}
```

### HTTP Request
`GET /api/1.0.0/bookingPal/locations/{locationID}/prices/from_date/{fromDate}/to_date/{toDate}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    LocationID |  required  | 
    fromDate |  required  | Start Date of the reservation
    toDate |  required  | End Date of the reservation

<!-- END_2e9d17d169e78ca1c0294bfab40663ad -->

<!-- START_b301d63ef776587230adcfc786282f0f -->
## Location Quote

> Example request:

```bash
curl -X GET -G "/api/1.0.0/bookingPal/locations/{locationID}/quotes/from_date/{fromDate}/to_date/{toDate}" 
```

```javascript
const url = new URL("/api/1.0.0/bookingPal/locations/{locationID}/quotes/from_date/{fromDate}/to_date/{toDate}");

    let params = {
            "LocationID": "erZCUNXBlrGpTeHo",
            "fromDate": "TZu8H5dXKFtsntzb",
            "toDate": "VTdREoxbSMjtGlRP",
            "children": "oYfdXVbIAeVnkk6s",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[
    {
        "quotes": {
            "agentCommission": 0.0005,
            "agentCommissionValue": 124.45,
            "available": true,
            "cancellationItems": [
                {
                    "cancellationAmount": 0,
                    "cancellationDate": "2019-07-06",
                    "cancellationNights": 0,
                    "cancellationPercentage": 100,
                    "cancellationType": 1,
                    "daysBeforeArrival": 14,
                    "transactionFee": 0
                },
                {
                    "cancellationAmount": 0,
                    "cancellationDate": "2019-07-15",
                    "cancellationNights": 0,
                    "cancellationPercentage": 80,
                    "cancellationType": 1,
                    "daysBeforeArrival": 5,
                    "transactionFee": 0
                },
                {
                    "cancellationAmount": 0,
                    "cancellationDate": "2019-07-18",
                    "cancellationNights": 0,
                    "cancellationPercentage": 100,
                    "cancellationType": 1,
                    "daysBeforeArrival": 2,
                    "transactionFee": 0
                },
                {
                    "cancellationAmount": 0,
                    "cancellationDate": "2019-07-20",
                    "cancellationNights": 0,
                    "cancellationPercentage": 0,
                    "cancellationType": 1,
                    "daysBeforeArrival": 0,
                    "transactionFee": 0
                }
            ],
            "currency": "USD",
            "firstPayment": 100,
            "fromTime": "11:30 AM",
            "imageUrl": "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/33175\/original_127320599.jpeg",
            "is_error": false,
            "message": "",
            "messageCode": "",
            "minstay": 4,
            "paymentSupported": true,
            "price": 2488.89,
            "product_id": 291358,
            "propertyManagerSupportCC": {
                "supportAE": false,
                "supportDINERSCLUB": false,
                "supportDISCOVER": false,
                "supportJCB": false,
                "supportMC": true,
                "supportVISA": true
            },
            "propertyName": "Bon Temps",
            "property_currency": "USD",
            "property_quote": 3578,
            "quote": 3577.68,
            "quote_details": {
                "quoteDetails": [
                    {
                        "amount": 45,
                        "currency": "USD",
                        "description": "Rental Damage Protection Coverage ($1,500)",
                        "entity": "FEE_MANDATORY",
                        "included": true,
                        "paymentInfo": "Mandatory",
                        "text": "",
                        "type": "GENERAL"
                    },
                    {
                        "amount": 295.41,
                        "currency": "USD",
                        "description": "Booking fee",
                        "entity": "FEE_MANDATORY",
                        "included": true,
                        "paymentInfo": "Mandatory",
                        "text": "",
                        "type": "GENERAL"
                    },
                    {
                        "amount": 298.39,
                        "currency": "USD",
                        "description": "STATE TAX",
                        "entity": "TAX",
                        "included": true,
                        "paymentInfo": "",
                        "text": "",
                        "type": ""
                    },
                    {
                        "amount": 450,
                        "currency": "USD",
                        "description": "Cleaning Fee",
                        "entity": "FEE_MANDATORY",
                        "included": true,
                        "paymentInfo": "Mandatory",
                        "text": "",
                        "type": "GENERAL"
                    },
                    {
                        "amount": 3577.68,
                        "currency": "USD",
                        "description": "Total quote",
                        "entity": "",
                        "included": false,
                        "paymentInfo": "",
                        "text": "",
                        "type": ""
                    }
                ]
            },
            "secondPayment": 3477.68,
            "secondPaymentDate": "2019-07-06",
            "termsLink": "https:\/\/www.google.com",
            "toTime": "10:30 AM"
        }
    }
]
```

### HTTP Request
`GET /api/1.0.0/bookingPal/locations/{locationID}/quotes/from_date/{fromDate}/to_date/{toDate}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    LocationID |  required  | 
    fromDate |  required  | Start Date of the reservation
    toDate |  required  | End Date of the reservation
    children |  optional  | Number of adults for the reservation

<!-- END_b301d63ef776587230adcfc786282f0f -->

<!-- START_eea4bced28883ba83f4de68c3db474f1 -->
## List Locations

> Example request:

```bash
curl -X GET -G "/api/1.0.0/bookingPal/locations/{type}/list" 
```

```javascript
const url = new URL("/api/1.0.0/bookingPal/locations/{type}/list");

    let params = {
            "type": "T3VgsQdCo5gxII2i",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "availability_calendar": {
        "is_error": false,
        "items": [
            {
                "endDate": "2019-07-27",
                "startDate": "2019-07-20"
            }
        ],
        "message": "",
        "messageCode": ""
    }
}
```

### HTTP Request
`GET /api/1.0.0/bookingPal/locations/{type}/list`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    type |  required  | The type of search example "Accomodation"

<!-- END_eea4bced28883ba83f4de68c3db474f1 -->

<!-- START_9b3a6b89b4ab144d257927336b4c5655 -->
## Location Room Info

> Example request:

```bash
curl -X GET -G "/api/1.0.0/bookingPal/locations/{locationID}/room/info" 
```

```javascript
const url = new URL("/api/1.0.0/bookingPal/locations/{locationID}/room/info");

    let params = {
            "LocationID": "CJxOTXVlXeX1oZNV",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[
    {
        "ID": "21980",
        "label": "Paris, France",
        "isLocationParent": false
    },
    {
        "ID": "176628",
        "label": "Paris, ME, United States of America",
        "isLocationParent": false
    },
    {
        "ID": "92650",
        "label": "Paris\/17, France",
        "isLocationParent": false
    },
    {
        "ID": "115148",
        "label": "Parisot, France",
        "isLocationParent": false
    }
]
```

### HTTP Request
`GET /api/1.0.0/bookingPal/locations/{locationID}/room/info`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    LocationID |  required  | 

<!-- END_9b3a6b89b4ab144d257927336b4c5655 -->

<!-- START_a9bbc900a115ff29cb91778cb5d3fac7 -->
## Location Policies

> Example request:

```bash
curl -X GET -G "/api/1.0.0/bookingPal/units/{locationID}/policies/channel" 
```

```javascript
const url = new URL("/api/1.0.0/bookingPal/units/{locationID}/policies/channel");

    let params = {
            "LocationID": "bGRQ5LGnBqTe5BBM",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[
    {
        "ID": "21980",
        "label": "Paris, France",
        "isLocationParent": false
    },
    {
        "ID": "176628",
        "label": "Paris, ME, United States of America",
        "isLocationParent": false
    },
    {
        "ID": "92650",
        "label": "Paris\/17, France",
        "isLocationParent": false
    },
    {
        "ID": "115148",
        "label": "Parisot, France",
        "isLocationParent": false
    }
]
```

### HTTP Request
`GET /api/1.0.0/bookingPal/units/{locationID}/policies/channel`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    LocationID |  required  | 

<!-- END_a9bbc900a115ff29cb91778cb5d3fac7 -->

<!-- START_72f767ebf4bdeb1fd742596cf443f5e8 -->
## Property Details

> Example request:

```bash
curl -X GET -G "/api/1.0.0/bookingPal/property/details/{locationID}" 
```

```javascript
const url = new URL("/api/1.0.0/bookingPal/property/details/{locationID}");

    let params = {
            "LocationID": "MNwpxUQMwFSkvHPf",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "property_response": {
        "messageCode": "",
        "message": "",
        "is_error": false,
        "property": {
            "id": 291355,
            "name": "Barefoot Dreams",
            "region": "FL",
            "latitude": 30.283771,
            "longitude": -86.018865,
            "bathroom": 3,
            "bedroom": 3,
            "inquiryOnly": false,
            "person": 6,
            "description": "Barefoot Dream is located in the beautiful community of Seacrest Beach Fl.  The home sits next to the neighborhood greenway, steps from the 12,000 square foot lagoon pool and a short stroll to the beach.  Enjoy your coffee or relax on the beautiful wrap about porches located on each floor with seating for all.This 3 Bedroom plus open bedroom 3 full bath home is new to the rental market. The home is furnished and decorated lovely with all brand new linens and towels. First floor living area offers a brand new 50” Smart HD TV with wifi access and DVD player.  The Dining area has seating for 8 around a large table plus 2 additional seats at the counter. The kitchen is well equipped with everything you need including a crockpot and Keurig coffee maker.BRAND NEW all 100% cotton 300 thread count linens and 100% combed ring spun cotton towels.  Sleeps 7 – 8- 3 Bedrooms plus Open Bedroom area- 3 Full Baths- Wrap around porches both floors- Natural Gas Grill (never run out of gas)- Natural Gas Instant Hot Water He",
            "managerName": "TEST Property manager",
            "currency": "USD",
            "city": "Seacrest",
            "country": "US",
            "images": {
                "image": [
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320677.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320676.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320675.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320674.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320673.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320672.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320671.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320670.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320669.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320668.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320667.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320666.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320665.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320664.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320663.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320662.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320661.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320660.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320659.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320658.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320657.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320656.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320655.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320654.jpeg"
                ],
                "standard": [
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320677Standard.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320676Standard.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320675Standard.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320674Standard.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320673Standard.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320672Standard.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320671Standard.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320670Standard.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320669Standard.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320668Standard.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320667Standard.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320666Standard.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320665Standard.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320664Standard.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320663Standard.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320662Standard.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320661Standard.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320660Standard.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320659Standard.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320658Standard.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320657Standard.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320656Standard.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320655Standard.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320654Standard.jpeg"
                ],
                "thumbnail": [
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320677Thumb.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320676Thumb.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320675Thumb.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320674Thumb.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320673Thumb.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320672Thumb.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320671Thumb.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320670Thumb.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320669Thumb.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320668Thumb.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320667Thumb.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320666Thumb.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320665Thumb.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320664Thumb.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320663Thumb.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320662Thumb.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320661Thumb.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320660Thumb.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320659Thumb.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320658Thumb.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320657Thumb.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320656Thumb.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320655Thumb.jpeg",
                    "https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/68198\/original_127320654Thumb.jpeg"
                ]
            },
            "attributes": {
                "attribute": []
            },
            "rank": 0,
            "locationid": 129396,
            "physicaladdress": " 193 Seacrest Beach Boulevard East",
            "payment_processing_type": 1,
            "terms_link": "https:\/\/www.google.com"
        }
    }
}
```

### HTTP Request
`GET /api/1.0.0/bookingPal/property/details/{locationID}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    LocationID |  required  | 

<!-- END_72f767ebf4bdeb1fd742596cf443f5e8 -->

<!-- START_0fb5dbfc316b765d85185fa633bccb79 -->
## Book Property

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "/api/1.0.0/bookingPal/booking/create" \
    -H "Content-Type: application/json" \
    -d '{"reservation":"1054xsCslIHthdsu","pos":"QfaVabkQQf3RkEdD","productid":6,"fromdate":"n0m8woedqFxf1ir1","todate":"QMJOptIIR69AtzEb","currency":"hDxMv4xABKxlX1KU","adult":14,"child":10,"emailaddress":"9k9Rnb5o56TbBjnx","familyname":"QW1jn2HB5Xxu8lAt","firstname":"gUK57ADYVNpTYDFv","cardnumber":10,"cardmonth":2,"cardyear":14,"amount":7,"telnumber":20,"cardtype":6,"notes":"q5ZeyHNqXKGMvZQJ","cc_security_code":19,"cc_address":1,"cc_country":"dGJa85lt3k7l1hm4","cc_state":"22DKtfZbrQThZeZY","cc_zip":"HQFTm2I4UbHKli57","cc_city":"XeaGAvIC6qkpEply","cc_bdm":"nRpdcGDmvipx0HA0","cc_bdd":"8y4Kxjr0URcRIgyl","cc_bdy":"4f82iItF5Y8SEYyH"}'

```

```javascript
const url = new URL("/api/1.0.0/bookingPal/booking/create");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "reservation": "1054xsCslIHthdsu",
    "pos": "QfaVabkQQf3RkEdD",
    "productid": 6,
    "fromdate": "n0m8woedqFxf1ir1",
    "todate": "QMJOptIIR69AtzEb",
    "currency": "hDxMv4xABKxlX1KU",
    "adult": 14,
    "child": 10,
    "emailaddress": "9k9Rnb5o56TbBjnx",
    "familyname": "QW1jn2HB5Xxu8lAt",
    "firstname": "gUK57ADYVNpTYDFv",
    "cardnumber": 10,
    "cardmonth": 2,
    "cardyear": 14,
    "amount": 7,
    "telnumber": 20,
    "cardtype": 6,
    "notes": "q5ZeyHNqXKGMvZQJ",
    "cc_security_code": 19,
    "cc_address": 1,
    "cc_country": "dGJa85lt3k7l1hm4",
    "cc_state": "22DKtfZbrQThZeZY",
    "cc_zip": "HQFTm2I4UbHKli57",
    "cc_city": "XeaGAvIC6qkpEply",
    "cc_bdm": "nRpdcGDmvipx0HA0",
    "cc_bdd": "8y4Kxjr0URcRIgyl",
    "cc_bdy": "4f82iItF5Y8SEYyH"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "reservation_response": {
        "is_error": false,
        "message": "",
        "downPayment": 561,
        "propertyName": "Apartment Serviten",
        "propertyAddress": "Vienna, Austria",
        "propertyManagerName": "Interhome AG - Manager",
        "propertyManagerEmail": "info@interhome.com",
        "propertyManagerPhone": "(+41)(0)43 810 9126",
        "reservation": {
            "id": 13840088,
            "checkin": "2015-10-13",
            "checkout": "2015-10-16",
            "currency": "USD",
            "price": 561
        }
    }
}
```

### HTTP Request
`POST /api/1.0.0/bookingPal/booking/create`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    reservation | json |  required  | The Reservations Data.
    pos | string |  required  | The MBP POS.
    productid | integer |  required  | The Product ID.
    fromdate | date |  required  | The From Date.
    todate | date |  required  | The To Date.
    currency | string |  required  | The Currency.
    adult | integer |  required  | The Number of Adults.
    child | integer |  required  | The Number of Children.
    emailaddress | string |  required  | The Booking Customer's Email Address.
    familyname | string |  required  | The Booking Customer's Last Name.
    firstname | string |  required  | The Booking Customer's First Name.
    cardnumber | integer |  required  | 
    cardmonth | integer |  required  | 
    cardyear | integer |  required  | 
    amount | integer |  required  | 
    telnumber | integer |  required  | 
    cardtype | integer |  required  | 
    notes | string |  optional  | 
    cc_security_code | integer |  required  | 
    cc_address | integer |  required  | 
    cc_country | string |  required  | 
    cc_state | string |  required  | 
    cc_zip | string |  required  | 
    cc_city | string |  required  | 
    cc_bdm | string |  optional  | 
    cc_bdd | string |  optional  | 
    cc_bdy | string |  optional  | 

<!-- END_0fb5dbfc316b765d85185fa633bccb79 -->

<!-- START_167171a664ff53367bffd80175d0ff24 -->
## Cancel Property

> Example request:

```bash
curl -X GET -G "/api/1.0.0/bookingPal/booking/{reservationID}/reason/{reason}/amount/{amount}/cancel" 
```

```javascript
const url = new URL("/api/1.0.0/bookingPal/booking/{reservationID}/reason/{reason}/amount/{amount}/cancel");

    let params = {
            "reservationID": "uKXWLQXVk5sIVILh",
            "reason": "a7XjZHOq7fnavVdQ",
            "amount": "MXAsK87GApICzYj0",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "cancel_reservation": {
        "messageCode": "",
        "message": "Your booking was canceled or in canceling state",
        "is_error": false
    }
}
```

### HTTP Request
`GET /api/1.0.0/bookingPal/booking/{reservationID}/reason/{reason}/amount/{amount}/cancel`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    reservationID |  optional  | 
    reason |  optional  | [1 = I found a better place to stay; 2 = I found a better place to stay on a different website; 3 = I need to change the details of my reservation; 4 = I am no longer visiting the destination; 5 = For personal reasons]
    amount |  optional  | 

<!-- END_167171a664ff53367bffd80175d0ff24 -->

<!-- START_9a604c62f04c4aa62b7b3d1899edd736 -->
## Availibility Calendar

> Example request:

```bash
curl -X GET -G "/api/1.0.0/bookingPal/locations/{locationID}/availability/from_date/{fromDate}/to_date/{toDate}" 
```

```javascript
const url = new URL("/api/1.0.0/bookingPal/locations/{locationID}/availability/from_date/{fromDate}/to_date/{toDate}");

    let params = {
            "LocationID": "w8egkdP07BR9DVGf",
            "fromDate": "XHi10WX66PBsQ871",
            "toDate": "w5Fv9VLXXlTZT7B6",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "availability_calendar": {
        "is_error": false,
        "items": [
            {
                "endDate": "2019-07-27",
                "startDate": "2019-07-20"
            }
        ],
        "message": "",
        "messageCode": ""
    }
}
```

### HTTP Request
`GET /api/1.0.0/bookingPal/locations/{locationID}/availability/from_date/{fromDate}/to_date/{toDate}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    LocationID |  required  | 
    fromDate |  required  | Start Date of the reservation
    toDate |  required  | End Date of the reservation

<!-- END_9a604c62f04c4aa62b7b3d1899edd736 -->

<!-- START_4a6665f9c04f98a91f4452bbf6f80ac6 -->
## Reservation Prices

> Example request:

```bash
curl -X GET -G "/api/1.0.0/bookingPal/locations/{locationID}/reservation/prices/from_date/{fromDate}/to_date/{toDate}" 
```

```javascript
const url = new URL("/api/1.0.0/bookingPal/locations/{locationID}/reservation/prices/from_date/{fromDate}/to_date/{toDate}");

    let params = {
            "LocationID": "LZ4GLSQNzHpir3jP",
            "fromDate": "qf3SHlZ5sCZuorWv",
            "toDate": "rcdflkwvpCuTBFbl",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[
    {
        "ranges": {
            "currency": "USD",
            "is_error": false,
            "message": "",
            "messageCode": "",
            "propertyId": 291358,
            "range": [
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2019-06-09",
                    "week": 24
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2019-06-16",
                    "week": 25
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2019-06-23",
                    "week": 26
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2019-06-30",
                    "week": 27
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2019-07-07",
                    "week": 28
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2019-07-14",
                    "week": 29
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2019-07-21",
                    "week": 30
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2019-07-28",
                    "week": 31
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2019-08-04",
                    "week": 32
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2019-08-11",
                    "week": 33
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2019-08-18",
                    "week": 34
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2019-08-25",
                    "week": 35
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2019-09-01",
                    "week": 36
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2019-09-08",
                    "week": 37
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2019-09-15",
                    "week": 38
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2019-09-22",
                    "week": 39
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2019-09-29",
                    "week": 40
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2019-10-06",
                    "week": 41
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2019-10-13",
                    "week": 42
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2019-10-20",
                    "week": 43
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2019-10-27",
                    "week": 44
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2019-11-03",
                    "week": 45
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2019-11-10",
                    "week": 46
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2019-11-17",
                    "week": 47
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2019-11-24",
                    "week": 48
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2019-12-01",
                    "week": 49
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2019-12-08",
                    "week": 50
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2019-12-15",
                    "week": 51
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2019-12-22",
                    "week": 52
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2019-12-29",
                    "week": 1
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2020-01-05",
                    "week": 2
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2020-01-12",
                    "week": 3
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2020-01-19",
                    "week": 4
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2020-01-26",
                    "week": 5
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2020-02-02",
                    "week": 6
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2020-02-09",
                    "week": 7
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2020-02-16",
                    "week": 8
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2020-02-23",
                    "week": 9
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2020-03-01",
                    "week": 10
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2020-03-08",
                    "week": 11
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2020-03-15",
                    "week": 12
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2020-03-22",
                    "week": 13
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2020-03-29",
                    "week": 14
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2020-04-05",
                    "week": 15
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2020-04-12",
                    "week": 16
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2020-04-19",
                    "week": 17
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2020-04-26",
                    "week": 18
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2020-05-03",
                    "week": 19
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2020-05-10",
                    "week": 20
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2020-05-17",
                    "week": 21
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2020-05-24",
                    "week": 22
                },
                {
                    "avgPrice": 356,
                    "maxPrice": 356,
                    "minPrice": 356,
                    "minstay": "4",
                    "startDate": "2020-05-31",
                    "week": 23
                }
            ]
        }
    }
]
```

### HTTP Request
`GET /api/1.0.0/bookingPal/locations/{locationID}/reservation/prices/from_date/{fromDate}/to_date/{toDate}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    LocationID |  required  | 
    fromDate |  required  | Start Date of the reservation
    toDate |  required  | End Date of the reservation

<!-- END_4a6665f9c04f98a91f4452bbf6f80ac6 -->

#RedAwning
<!-- START_d1fa5583c4c11d8224a2448ec63af45a -->
## get listings from API

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/listings/type/api/limit/{limit}/offset/{offset}" 
```

```javascript
const url = new URL("/api/1.0.0/redAwning/listings/type/api/limit/{limit}/offset/{offset}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "listing_id": "200508",
    "url_alias": "rental-property\/chophouse-row-test-property-seattle",
    "content": {
        "title": "Chophouse Row - Test Property",
        "description": "Chophouse Row combines a historic auto row building with a new steel and concrete loft office building. Its pedestrian alley and courtyard host a collection of local tenants that focus on delivering morning-into-evening food, beverage, and retail options to both residents and visitors to the neighborhood.",
        "property_type": "residence",
        "special_terms": "",
        "view": "",
        "bathrooms": 1,
        "bedrooms": 2,
        "beds_king": 1,
        "beds_queen": 1,
        "beds_double": 0,
        "beds_twin": 0,
        "beds_sofa": 0,
        "beds_bunk": 0,
        "beds_air_mattress": 0,
        "kitchen": "none",
        "pool": false,
        "children_ok": "yes",
        "room_configurations": [
            {
                "name": "Bedroom 2",
                "beds": [
                    "King Bed"
                ]
            },
            {
                "name": "Bedroom 1",
                "beds": [
                    "Queen Bed"
                ]
            }
        ],
        "sleep_max": 4,
        "pets_allowed": true,
        "smoking_allowed": false,
        "amenities": [
            "Balcony",
            "Blender",
            "Book Collection",
            "Internet -- Wireless",
            "Shower",
            "Terrace"
        ],
        "location": {
            "address": {
                "street_address": "1424 11th Avenue",
                "street_address2": "",
                "city": "Seattle",
                "province": "WA",
                "postal_code": "98122",
                "country": "us"
            },
            "geo_code": {
                "lat": 47.6137,
                "lng": -122.3177
            }
        },
        "handicap_accessible": false,
        "square_feet": 0,
        "photos": [
            {
                "url": "https:\/\/stage.redawning.com\/sites\/default\/files\/rental_property\/200508\/44a3d4a54b60e178a30839fc5d46e992_None.jpeg",
                "order": 0,
                "tags": [
                    "Pottery,Vase,Path,Sidewalk,Walkway"
                ],
                "title": "",
                "width": 667,
                "height": 1000,
                "timestamp": "2018-07-05T16:56:52+00:00"
            },
            {
                "url": "https:\/\/stage.redawning.com\/sites\/default\/files\/rental_property\/200508\/a5f7fd7db56f7a1ae16a68968e97d212_None.jpeg",
                "order": 1,
                "tags": [
                    "Chair,Furniture,Food,Restaurant,Balcony"
                ],
                "title": "",
                "width": 1000,
                "height": 669,
                "timestamp": "2018-07-05T16:57:09+00:00"
            },
            {
                "url": "https:\/\/stage.redawning.com\/sites\/default\/files\/rental_property\/200508\/d4aa5d518ba5e225e2841c7b6b27a126_None.jpeg",
                "order": 2,
                "tags": [
                    "Path,Sidewalk,Walkway,Vine,Building"
                ],
                "title": "",
                "width": 661,
                "height": 1000,
                "timestamp": "2018-07-05T16:57:26+00:00"
            }
        ]
    },
    "cico": [
        {
            "start_date": "2018-07-05",
            "end_date": "2018-12-31",
            "check_in_allowed": {
                "monday": true,
                "tuesday": true,
                "wednesday": true,
                "thursday": true,
                "friday": true,
                "saturday": true,
                "sunday": true
            },
            "check_out_allowed": {
                "monday": true,
                "tuesday": true,
                "wednesday": true,
                "thursday": true,
                "friday": true,
                "saturday": true,
                "sunday": true
            }
        },
        {
            "start_date": "2019-01-01",
            "end_date": "2019-03-31",
            "check_in_allowed": {
                "monday": false,
                "tuesday": true,
                "wednesday": false,
                "thursday": true,
                "friday": false,
                "saturday": false,
                "sunday": false
            },
            "check_out_allowed": {
                "monday": true,
                "tuesday": true,
                "wednesday": true,
                "thursday": true,
                "friday": true,
                "saturday": true,
                "sunday": true
            }
        }
    ],
    "cico_times": {
        "check_in_start": 54000,
        "check_in_end": 61200,
        "check_out": 39600
    },
    "price": {
        "currency": "USD",
        "base_weekday_price": 1.1,
        "base_weekend_price": 1.1,
        "base_weekly_price": 1.1,
        "base_minstay": 1,
        "other": 1,
        "tax_percent": 11,
        "nightly_tax": 0,
        "cleaning_fee": 352.5
    },
    "price_periods": [
        {
            "period_start": "2018-07-05",
            "period_end": "2018-12-31",
            "weekday_price": 245.3,
            "weekend_price": 258.5,
            "weekly_price": 221.1,
            "minstay": 2,
            "price_period_id": "676838508",
            "name": "Price Period 676838508"
        }
    ],
    "availability": [
        {
            "period": {
                "period_start": "2030-04-01",
                "period_end": "2030-04-01",
                "type": "NotAvailable"
            }
        },
        {
            "period": {
                "period_start": "2018-12-25",
                "period_end": "2018-12-26",
                "type": "NotAvailable"
            }
        },
        {
            "period": {
                "period_start": "2019-01-01",
                "period_end": "2023-07-05",
                "type": "NotAvailable"
            }
        },
        {
            "period": {
                "period_start": "2018-12-16",
                "period_end": "2018-12-22",
                "type": "NotAvailable"
            }
        },
        {
            "period": {
                "period_start": "2030-05-19",
                "period_end": "2030-05-27",
                "type": "NotAvailable"
            }
        },
        {
            "period": {
                "period_start": "2018-12-07",
                "period_end": "2018-12-08",
                "type": "NotAvailable"
            }
        },
        {
            "period": {
                "period_start": "2030-06-08",
                "period_end": "2030-06-14",
                "type": "NotAvailable"
            }
        },
        {
            "period": {
                "period_start": "2018-12-28",
                "period_end": "2018-12-29",
                "type": "NotAvailable"
            }
        },
        {
            "period": {
                "period_start": "2030-04-27",
                "period_end": "2030-05-08",
                "type": "NotAvailable"
            }
        },
        {
            "period": {
                "period_start": "2030-05-09",
                "period_end": "2030-05-17",
                "type": "NotAvailable"
            }
        },
        {
            "period": {
                "period_start": "2018-12-10",
                "period_end": "2018-12-13",
                "type": "NotAvailable"
            }
        }
    ],
    "created": "2018-07-05T17:15:28.000Z",
    "updated": "2018-11-12T18:31:01.000Z",
    "status": {
        "published": true,
        "bookable": true,
        "open": true
    },
    "photos": [],
    "policies": [],
    "repconfig": []
}
```

### HTTP Request
`GET /api/1.0.0/redAwning/listings/type/api/limit/{limit}/offset/{offset}`


<!-- END_d1fa5583c4c11d8224a2448ec63af45a -->

<!-- START_2a0c78389f806eda63f60bd58591ec6a -->
## get listing import

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/listings" 
```

```javascript
const url = new URL("/api/1.0.0/redAwning/listings");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "status": "success"
}
```

### HTTP Request
`GET /api/1.0.0/redAwning/listings`


<!-- END_2a0c78389f806eda63f60bd58591ec6a -->

<!-- START_430e67b627f79c2518ee54e238c2b1f1 -->
## get changes

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/changes" 
```

```javascript
const url = new URL("/api/1.0.0/redAwning/changes");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "status": "success"
}
```

### HTTP Request
`GET /api/1.0.0/redAwning/changes`


<!-- END_430e67b627f79c2518ee54e238c2b1f1 -->

<!-- START_19976a9d0a6b4f219ed0dd45feb9af8b -->
## get quote

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/quote/{listingId}/from_date/{fromDate}/to_date/{toDate}" 
```

```javascript
const url = new URL("/api/1.0.0/redAwning/quote/{listingId}/from_date/{fromDate}/to_date/{toDate}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "quote_id": "19102",
    "listing_id": "200508",
    "quote_expiration": 1542046829,
    "num_adults": 1,
    "num_children": 0,
    "currency": "USD",
    "checkin_date": "2030-06-08",
    "checkout_date": "2030-06-15",
    "travel_insurance": 0,
    "deposit_percent": null,
    "min_stay": 0,
    "status": "success",
    "rental_price": 1548,
    "cleaning_fee": 377,
    "tax": 200.75
}
```

### HTTP Request
`GET /api/1.0.0/redAwning/quote/{listingId}/from_date/{fromDate}/to_date/{toDate}`


<!-- END_19976a9d0a6b4f219ed0dd45feb9af8b -->

<!-- START_91881effb7bca2d0f60f795aa7f258cc -->
## get listing by id

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/listings/{listingId}" 
```

```javascript
const url = new URL("/api/1.0.0/redAwning/listings/{listingId}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "listing_id": "200511",
    "url_alias": "rental-property\/kapalua-bay-villa-ocean-view-test-property-kapalua",
    "content": {
        "title": "Kapalua Bay Villa with Ocean View - Test Property",
        "description": "This gorgeous Beach Front Villa occupies the top two floors of building 21. It has two completely private master bedrooms with en-suite. Main floor master has a private lanai. Both master suites have spectacular ocean views. There are 3 bathrooms; one with soaking tub. This lovely retreat was created by a well known designer, displaying only the finest quality original art, high-end furnishings and appliances.\n\nRelax and rejuvenate. Let the warm tropical breezes and soothing sounds of the ocean transport you to a place of complete calm.\n\nIncluded are the following amenities:\nUse of Resort Pools and Tennis Courts\n\nSecure Wireless High Speed Internet\nBeach Chairs\/Beach Towels\nHair Dryers\/ Cozy Robes\nMid stay Towel and Linen service (for 7 or more days)\nComplimentary Local Resort Shuttle\nGreeter Service to welcome you to the island and orient you with your vacation home (on request)\nConvenient Complimentary Parking behind your villa\nThe personal attention of our on site concierge to help you plan activities, and highlight the features of the area.\nOn site manager available live 24\/7 to see to your every need and ensure you and your guests are happy and comfortable.\n\nAloha....See you soon!\n\nRooms and Amenities\n\nProperty Type Villa, 2 story\nBeds 1 king bed, 1 queen bed, 1 sleeper sofa\nBathrooms 3 bathrooms\nRooms Sleeps 6, 2 bedroom 3 bath complete remodel\nFloor Area 2650 square feet\n",
        "property_type": "villa",
        "special_terms": "",
        "view": "",
        "bathrooms": 3,
        "bedrooms": 2,
        "beds_king": 1,
        "beds_queen": 1,
        "beds_double": 0,
        "beds_twin": 0,
        "beds_sofa": 1,
        "beds_bunk": 0,
        "beds_air_mattress": 0,
        "kitchen": "none",
        "pool": false,
        "children_ok": "yes",
        "room_configurations": [
            {
                "name": "Bedroom 1",
                "beds": [
                    "King Bed"
                ]
            },
            {
                "name": "Bedroom 2",
                "beds": [
                    "Queen Bed"
                ]
            },
            {
                "name": "Living Room",
                "beds": [
                    "Sofa Bed"
                ]
            }
        ],
        "sleep_max": 5,
        "pets_allowed": false,
        "smoking_allowed": false,
        "amenities": [],
        "location": {
            "address": {
                "street_address": "500 Bay Drive",
                "street_address2": "Unit #21B2",
                "city": "Kapalua",
                "province": "HI",
                "postal_code": "96761",
                "country": "us"
            },
            "geo_code": {
                "lat": 0,
                "lng": 0
            }
        },
        "handicap_accessible": false,
        "square_feet": 2650,
        "photos": [
            {
                "url": "https:\/\/devsite.stage.redawning.com\/sites\/default\/files\/rental_property\/200511\/bb6149fdfdd2a2284d62e02adcc08edb.jpeg",
                "order": 0,
                "tags": [],
                "title": "",
                "width": 90,
                "height": 68,
                "timestamp": "2018-07-06T23:39:43+00:00"
            },
            {
                "url": "https:\/\/devsite.stage.redawning.com\/sites\/default\/files\/rental_property\/200511\/9af42dac889a323d2c2f4e9e0c6bb833.jpeg",
                "order": 1,
                "tags": [],
                "title": "",
                "width": 90,
                "height": 68,
                "timestamp": "2018-07-06T23:39:56+00:00"
            },
            {
                "url": "https:\/\/devsite.stage.redawning.com\/sites\/default\/files\/rental_property\/200511\/f5a4c064623ee2fa7c045a77401f8882.jpeg",
                "order": 2,
                "tags": [],
                "title": "",
                "width": 90,
                "height": 68,
                "timestamp": "2018-07-06T23:40:11+00:00"
            },
            {
                "url": "https:\/\/devsite.stage.redawning.com\/sites\/default\/files\/rental_property\/200511\/275b58100297cc19222f59859747a099.jpeg",
                "order": 3,
                "tags": [],
                "title": "",
                "width": 90,
                "height": 68,
                "timestamp": "2018-07-06T23:40:26+00:00"
            },
            {
                "url": "https:\/\/devsite.stage.redawning.com\/sites\/default\/files\/rental_property\/200511\/207fbf7f77850bf71b9b472817a909b5.jpeg",
                "order": 4,
                "tags": [],
                "title": "",
                "width": 90,
                "height": 68,
                "timestamp": "2018-07-06T23:40:41+00:00"
            },
            {
                "url": "https:\/\/devsite.stage.redawning.com\/sites\/default\/files\/rental_property\/200511\/e6f0a50abe994970ce73b826290346d0.jpeg",
                "order": 5,
                "tags": [],
                "title": "",
                "width": 90,
                "height": 68,
                "timestamp": "2018-07-06T23:40:57+00:00"
            },
            {
                "url": "https:\/\/devsite.stage.redawning.com\/sites\/default\/files\/rental_property\/200511\/b15782b97e7675111a8f03ab34b53755.jpeg",
                "order": 6,
                "tags": [],
                "title": "",
                "width": 90,
                "height": 68,
                "timestamp": "2018-07-06T23:41:13+00:00"
            },
            {
                "url": "https:\/\/devsite.stage.redawning.com\/sites\/default\/files\/rental_property\/200511\/699405ca363f0273e62f17b61c4d6912.jpeg",
                "order": 7,
                "tags": [],
                "title": "",
                "width": 90,
                "height": 68,
                "timestamp": "2018-07-06T23:41:28+00:00"
            },
            {
                "url": "https:\/\/devsite.stage.redawning.com\/sites\/default\/files\/rental_property\/200511\/92e2a4a9fb0bd48719b05a0cf170eb29.jpeg",
                "order": 8,
                "tags": [],
                "title": "",
                "width": 90,
                "height": 68,
                "timestamp": "2018-07-06T23:41:43+00:00"
            },
            {
                "url": "https:\/\/devsite.stage.redawning.com\/sites\/default\/files\/rental_property\/200511\/05f3d11a6e75d0bcf461e4ed72486547.jpeg",
                "order": 9,
                "tags": [],
                "title": "",
                "width": 90,
                "height": 68,
                "timestamp": "2018-07-06T23:41:59+00:00"
            }
        ]
    },
    "cico": [
        {
            "start_date": "2018-07-10",
            "end_date": "2018-10-31",
            "check_in_allowed": {
                "monday": true,
                "tuesday": true,
                "wednesday": true,
                "thursday": true,
                "friday": true,
                "saturday": true,
                "sunday": true
            },
            "check_out_allowed": {
                "monday": true,
                "tuesday": true,
                "wednesday": true,
                "thursday": true,
                "friday": true,
                "saturday": true,
                "sunday": true
            }
        },
        {
            "start_date": "2018-11-01",
            "end_date": "2019-01-31",
            "check_in_allowed": {
                "monday": false,
                "tuesday": false,
                "wednesday": false,
                "thursday": false,
                "friday": false,
                "saturday": false,
                "sunday": false
            },
            "check_out_allowed": {
                "monday": false,
                "tuesday": false,
                "wednesday": false,
                "thursday": false,
                "friday": false,
                "saturday": false,
                "sunday": false
            }
        },
        {
            "start_date": "2019-02-01",
            "end_date": "2019-09-30",
            "check_in_allowed": {
                "monday": false,
                "tuesday": false,
                "wednesday": false,
                "thursday": false,
                "friday": false,
                "saturday": false,
                "sunday": false
            },
            "check_out_allowed": {
                "monday": false,
                "tuesday": false,
                "wednesday": false,
                "thursday": false,
                "friday": false,
                "saturday": false,
                "sunday": false
            }
        },
        {
            "start_date": "2019-10-01",
            "end_date": "2023-12-30",
            "check_in_allowed": {
                "monday": true,
                "tuesday": true,
                "wednesday": true,
                "thursday": true,
                "friday": true,
                "saturday": true,
                "sunday": true
            },
            "check_out_allowed": {
                "monday": true,
                "tuesday": true,
                "wednesday": true,
                "thursday": true,
                "friday": true,
                "saturday": true,
                "sunday": true
            }
        }
    ],
    "cico_times": {
        "check_in_start": 57600,
        "check_in_end": 57600,
        "check_out": 39600
    },
    "price": {
        "currency": "USD",
        "base_weekday_price": 1.1,
        "base_weekend_price": 1.1,
        "base_weekly_price": 1.1,
        "base_minstay": 1,
        "other": 0,
        "tax_percent": 13.42,
        "nightly_tax": 0,
        "cleaning_fee": 380
    },
    "price_periods": [
        {
            "period_start": "2018-07-10",
            "period_end": "2018-10-31",
            "weekday_price": 271.7,
            "weekend_price": 392.7,
            "weekly_price": 271.7,
            "minstay": 4,
            "price_period_id": "676838714",
            "name": "Price Period 676838714"
        },
        {
            "period_start": "2018-11-01",
            "period_end": "2019-01-31",
            "weekday_price": 392.7,
            "weekend_price": 502.7,
            "weekly_price": 392.7,
            "minstay": 4,
            "price_period_id": "676838715",
            "name": "Price Period 676838715"
        },
        {
            "period_start": "2019-02-01",
            "period_end": "2019-09-30",
            "weekday_price": 282.7,
            "weekend_price": 392.7,
            "weekly_price": 271.7,
            "minstay": 4,
            "price_period_id": "676838716",
            "name": "Price Period 676838716"
        },
        {
            "period_start": "2019-10-01",
            "period_end": "2023-12-30",
            "weekday_price": 271.7,
            "weekend_price": 392.7,
            "weekly_price": 271.7,
            "minstay": 4,
            "price_period_id": "676838717",
            "name": "Price Period 676838717"
        }
    ],
    "availability": [
        {
            "period": {
                "period_start": "2022-08-10",
                "period_end": "2022-08-13",
                "type": "NotAvailable"
            }
        },
        {
            "period": {
                "period_start": "2019-08-27",
                "period_end": "2019-08-31",
                "type": "NotAvailable"
            }
        },
        {
            "period": {
                "period_start": "2022-09-10",
                "period_end": "2022-09-13",
                "type": "NotAvailable"
            }
        },
        {
            "period": {
                "period_start": "2022-09-15",
                "period_end": "2022-09-18",
                "type": "NotAvailable"
            }
        },
        {
            "period": {
                "period_start": "2021-08-27",
                "period_end": "2021-08-31",
                "type": "NotAvailable"
            }
        },
        {
            "period": {
                "period_start": "2022-08-27",
                "period_end": "2022-08-31",
                "type": "NotAvailable"
            }
        },
        {
            "period": {
                "period_start": "2022-09-20",
                "period_end": "2022-09-23",
                "type": "NotAvailable"
            }
        },
        {
            "period": {
                "period_start": "2020-08-27",
                "period_end": "2020-08-31",
                "type": "NotAvailable"
            }
        }
    ],
    "created": "2018-07-12T19:34:08.000Z",
    "updated": "2018-11-08T03:46:01.000Z",
    "status": {
        "published": true,
        "bookable": true,
        "open": true
    },
    "photos": [],
    "policies": [],
    "repconfig": []
}
```

### HTTP Request
`GET /api/1.0.0/redAwning/listings/{listingId}`


<!-- END_91881effb7bca2d0f60f795aa7f258cc -->

<!-- START_b90db447ce73a8fa4763336f0bf8ba9f -->
## get changes import

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/listings/{listingId}/status" 
```

```javascript
const url = new URL("/api/1.0.0/redAwning/listings/{listingId}/status");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "published": true,
    "bookable": true,
    "open": true
}
```

### HTTP Request
`GET /api/1.0.0/redAwning/listings/{listingId}/status`


<!-- END_b90db447ce73a8fa4763336f0bf8ba9f -->

<!-- START_d8d6627eae72b5b8ac5c79827b6413bc -->
## get listing availability

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/listings/{listingId}/availability" 
```

```javascript
const url = new URL("/api/1.0.0/redAwning/listings/{listingId}/availability");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "availability": [
        {
            "period": {
                "period_start": "2019-02-05",
                "period_end": "2019-02-07",
                "type": "NotAvailable"
            }
        },
        {
            "period": {
                "period_start": "2018-08-27",
                "period_end": "2023-08-27",
                "type": "NotAvailable"
            }
        }
    ]
}
```

### HTTP Request
`GET /api/1.0.0/redAwning/listings/{listingId}/availability`


<!-- END_d8d6627eae72b5b8ac5c79827b6413bc -->

<!-- START_b7ea62ef0001091f92fd5769a395ba43 -->
## get listing checkin/checkout

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/listings/{listingId}/cico" 
```

```javascript
const url = new URL("/api/1.0.0/redAwning/listings/{listingId}/cico");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[
    {
        "start_date": "2018-07-10",
        "end_date": "2018-10-31",
        "check_in_allowed": {
            "monday": true,
            "tuesday": true,
            "wednesday": true,
            "thursday": true,
            "friday": true,
            "saturday": true,
            "sunday": true
        },
        "check_out_allowed": {
            "monday": true,
            "tuesday": true,
            "wednesday": true,
            "thursday": true,
            "friday": true,
            "saturday": true,
            "sunday": true
        }
    },
    {
        "start_date": "2018-11-01",
        "end_date": "2019-01-31",
        "check_in_allowed": {
            "monday": false,
            "tuesday": false,
            "wednesday": false,
            "thursday": false,
            "friday": false,
            "saturday": false,
            "sunday": false
        },
        "check_out_allowed": {
            "monday": false,
            "tuesday": false,
            "wednesday": false,
            "thursday": false,
            "friday": false,
            "saturday": false,
            "sunday": false
        }
    },
    {
        "start_date": "2019-02-01",
        "end_date": "2019-09-30",
        "check_in_allowed": {
            "monday": false,
            "tuesday": false,
            "wednesday": false,
            "thursday": false,
            "friday": false,
            "saturday": false,
            "sunday": false
        },
        "check_out_allowed": {
            "monday": false,
            "tuesday": false,
            "wednesday": false,
            "thursday": false,
            "friday": false,
            "saturday": false,
            "sunday": false
        }
    },
    {
        "start_date": "2019-10-01",
        "end_date": "2023-12-30",
        "check_in_allowed": {
            "monday": true,
            "tuesday": true,
            "wednesday": true,
            "thursday": true,
            "friday": true,
            "saturday": true,
            "sunday": true
        },
        "check_out_allowed": {
            "monday": true,
            "tuesday": true,
            "wednesday": true,
            "thursday": true,
            "friday": true,
            "saturday": true,
            "sunday": true
        }
    }
]
```

### HTTP Request
`GET /api/1.0.0/redAwning/listings/{listingId}/cico`


<!-- END_b7ea62ef0001091f92fd5769a395ba43 -->

<!-- START_0501c7119dc4d6c943e21a8122165c89 -->
## get checkin/checkout times

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/listings/{listingId}/cicotimes" 
```

```javascript
const url = new URL("/api/1.0.0/redAwning/listings/{listingId}/cicotimes");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "check_in_start": 57600,
    "check_in_end": 57600,
    "check_out": 39600
}
```

### HTTP Request
`GET /api/1.0.0/redAwning/listings/{listingId}/cicotimes`


<!-- END_0501c7119dc4d6c943e21a8122165c89 -->

<!-- START_823ec8ed01a9bdde109004cf4d2ef848 -->
## get listing content

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/listings/{listingId}/content" 
```

```javascript
const url = new URL("/api/1.0.0/redAwning/listings/{listingId}/content");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[
    {
        "redawning_listing_id": 200511,
        "title": "Kapalua Bay Villa with Ocean View - Test Property",
        "description": "This gorgeous Beach Front Villa occupies the top two floors of building 21. It has two completely private master bedrooms with en-suite. Main floor master has a private lanai. Both master suites have spectacular ocean views. There are 3 bathrooms; one with soaking tub. This lovely retreat was created by a well known designer, displaying only the finest quality original art, high-end furnishings and appliances.\n\nRelax and rejuvenate. Let the warm tropical breezes and soothing sounds of the ocean transport you to a place of complete calm.\n\nIncluded are the following amenities:\nUse of Resort Pools and Tennis Courts\n\nSecure Wireless High Speed Internet\nBeach Chairs\/Beach Towels\nHair Dryers\/ Cozy Robes\nMid stay Towel and Linen service (for 7 or more days)\nComplimentary Local Resort Shuttle\nGreeter Service to welcome you to the island and orient you with your vacation home (on request)\nConvenient Complimentary Parking behind your villa\nThe personal attention of our on site concierge to help you plan activities, and highlight the features of the area.\nOn site manager available live 24\/7 to see to your every need and ensure you and your guests are happy and comfortable.\n\nAloha....See you soon!\n\nRooms and Amenities\n\nProperty Type Villa, 2 story\nBeds 1 king bed, 1 queen bed, 1 sleeper sofa\nBathrooms 3 bathrooms\nRooms Sleeps 6, 2 bedroom 3 bath complete remodel\nFloor Area 2650 square feet\n",
        "property_type": "villa",
        "special_terms": "",
        "view": "",
        "bathrooms": 3,
        "bedrooms": 2,
        "beds_king": 1,
        "beds_queen": 1,
        "beds_double": 0,
        "beds_twin": 0,
        "beds_sofa": 1,
        "beds_bunk": 0,
        "beds_air_mattress": 0,
        "kitchen": "none",
        "pool": 0,
        "children_ok": "yes",
        "room_configurations_id": null,
        "sleep_max": null,
        "pets_allowed": 0,
        "smoking_allowed": 0,
        "amenities": "[]",
        "location": "{\"address\":{\"street_address\":\"500 Bay Drive\",\"street_address2\":\"Unit #21B2\",\"city\":\"Kapalua\",\"province\":\"HI\",\"postal_code\":\"96761\",\"country\":\"us\"},\"geo_code\":{\"lat\":0,\"lng\":0}}",
        "handicap_accessible": 0,
        "square_feet": 2650,
        "created_at": "2018-11-12 16:43:46",
        "updated_at": "2018-11-12 16:43:46"
    }
]
```

### HTTP Request
`GET /api/1.0.0/redAwning/listings/{listingId}/content`


<!-- END_823ec8ed01a9bdde109004cf4d2ef848 -->

<!-- START_56c06439559bad8622cda4007ab92e21 -->
## get listing summaries

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/listing-summaries" \
    -H "Content-Type: application/json" \
    -d '{"page":6,"limit":"Ctafscc3qNZ9J2Je","index":"sLKcbP3DbqiPCJdz"}'

```

```javascript
const url = new URL("/api/1.0.0/redAwning/listing-summaries");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "page": 6,
    "limit": "Ctafscc3qNZ9J2Je",
    "index": "sLKcbP3DbqiPCJdz"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[
    {
        "listing_id": 200508,
        "title": "Chophouse Row - Test Property"
    },
    {
        "listing_id": 200510,
        "title": "Park City Woodside Ski Estate Test Property  "
    }
]
```

### HTTP Request
`GET /api/1.0.0/redAwning/listing-summaries`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    page | integer |  required  | Number of pages returned
    limit | string |  required  | Page limit
    index | string |  required  | 1 for api results, 0 for db result

<!-- END_56c06439559bad8622cda4007ab92e21 -->

<!-- START_061f6edfc77c530528f10b9266e0c02b -->
## get listing policies

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/listings/{listingId}/policies" 
```

```javascript
const url = new URL("/api/1.0.0/redAwning/listings/{listingId}/policies");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[
    {
        "name": "[C] FREE CANCEL 60 - MANAGER",
        "description": "C. Free Cancellation 60: 50% deposit refundable until 60, 50% balance charged at 60 non-refundable.",
        "offset_in_days": 1,
        "operator": "<=",
        "from_date": "booking",
        "value": 0,
        "value_type": "percent",
        "fee_type": "clean_fee",
        "policy_type": "cancellation"
    }
]
```

### HTTP Request
`GET /api/1.0.0/redAwning/listings/{listingId}/policies`


<!-- END_061f6edfc77c530528f10b9266e0c02b -->

<!-- START_f67c886f61ac7dce39d1de96ad655a98 -->
## get listing price

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/listings/{listingId}/price" 
```

```javascript
const url = new URL("/api/1.0.0/redAwning/listings/{listingId}/price");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "price": {
        "currency": "USD",
        "base_weekday_price": 100,
        "base_weekend_price": 150,
        "base_weekly_price": 100,
        "base_minstay": 2,
        "cleaning_fee": 150,
        "other": 0,
        "tax_percent": 10
    },
    "price_periods": [
        {
            "period_start": "2017-01-01",
            "period_end": "2017-12-31",
            "weekday_price": 102,
            "weekend_price": 151,
            "weekly_price": 620,
            "minstay": 2,
            "price_period_id": "371711549"
        }
    ]
}
```

### HTTP Request
`GET /api/1.0.0/redAwning/listings/{listingId}/price`


<!-- END_f67c886f61ac7dce39d1de96ad655a98 -->

<!-- START_77613bdce51caa382cd2e71114d25974 -->
## post new reservation

> Example request:

```bash
curl -X POST "/api/1.0.0/redAwning/reservations" \
    -H "Content-Type: application/json" \
    -d '{"quote_id":4,"first_name":"vGYiUvFZdblCxWGq","last_name":"YSt9pOdvfpxkzYXk","address":[],"home_phone":"KoWjFjtDveXUi5kb","mobile_phone":"qLC10IsblWbOZPcn","email":"eQPkVjmaAjyf21cE","payments":[]}'

```

```javascript
const url = new URL("/api/1.0.0/redAwning/reservations");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "quote_id": 4,
    "first_name": "vGYiUvFZdblCxWGq",
    "last_name": "YSt9pOdvfpxkzYXk",
    "address": [],
    "home_phone": "KoWjFjtDveXUi5kb",
    "mobile_phone": "qLC10IsblWbOZPcn",
    "email": "eQPkVjmaAjyf21cE",
    "payments": []
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "listing_id": "200508",
    "reservation_id": "49936",
    "property_title": "Chophouse Row - Test Property",
    "checkin_date": "2030-06-08",
    "checkout_date": "2030-06-15",
    "book_date": "2018-11-12",
    "status": "Confirmed",
    "adults": 1,
    "children": 0,
    "email": "dev@redawning.com",
    "first_name": "Test",
    "last_name": "McTesterson",
    "address": {
        "street_address": "1234 S Testing St.",
        "city": "Des Moines",
        "province": "WA",
        "postal_code": "98198",
        "country": "US"
    },
    "phone": "206-555-1212",
    "cellphone": "206-555-1111",
    "channel_reservation_id": "",
    "price": {
        "rental_price": 1548,
        "cleaning_fee": 354,
        "tax": 209.22,
        "currency": "USD"
    }
}
```

### HTTP Request
`POST /api/1.0.0/redAwning/reservations`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    quote_id | integer |  required  | The quote ID.
    first_name | string |  required  | The first name
    last_name | string |  required  | The last name
    address | array |  required  | ["street_address": "1234 S Testing St.", "city": "Des Moines", "province": "WA", "postal_code": "98198", "country": "US"]
    home_phone | string |  required  | The home phone number.
    mobile_phone | string |  required  | The mobile phone number.
    email | string |  required  | The email address.
    payments | array |  required  | [{"method": "creditcard", "method_details": { "creditcard_number": "4111111111111111", "cvv": "123", "expiration_month": 8, "expiration_year": 2020},"amount": 1977.95,"currency": "USD"}]

<!-- END_77613bdce51caa382cd2e71114d25974 -->

<!-- START_46e1218258df1d0ab6beb1e2f42b4052 -->
## get reservations

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/reservations" 
```

```javascript
const url = new URL("/api/1.0.0/redAwning/reservations");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
[
    {
        "listing_id": "200508",
        "reservation_id": "49856",
        "property_title": "Chophouse Row - Test Property",
        "checkin_date": "2030-04-02",
        "checkout_date": "2030-04-08",
        "book_date": "2018-11-08",
        "status": "Cancelled",
        "adults": 1,
        "children": 0,
        "email": "dev@redawning.com",
        "first_name": "Test",
        "last_name": "McTesterson",
        "address": {
            "street_address": "1234 S Testing St.",
            "city": "Des Moines",
            "province": "WA",
            "postal_code": "98198",
            "country": "US"
        },
        "phone": "206-555-1212",
        "cellphone": "206-555-1111",
        "channel_reservation_id": "",
        "price": {
            "rental_price": 1498,
            "cleaning_fee": 354,
            "tax": 203.72,
            "currency": ""
        }
    }
]
```

### HTTP Request
`GET /api/1.0.0/redAwning/reservations`


<!-- END_46e1218258df1d0ab6beb1e2f42b4052 -->

<!-- START_c1a7991c952d98f9492335e7f72322ea -->
## get reservation by id

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/reservation/{reservationId}" 
```

```javascript
const url = new URL("/api/1.0.0/redAwning/reservation/{reservationId}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "listing_id": "200508",
    "reservation_id": "49856",
    "property_title": "Chophouse Row - Test Property",
    "checkin_date": "2030-04-02",
    "checkout_date": "2030-04-08",
    "book_date": "2018-11-08",
    "status": "Cancelled",
    "adults": 1,
    "children": 0,
    "email": "dev@redawning.com",
    "first_name": "Test",
    "last_name": "McTesterson",
    "address": {
        "street_address": "1234 S Testing St.",
        "city": "Des Moines",
        "province": "WA",
        "postal_code": "98198",
        "country": "US"
    },
    "phone": "206-555-1212",
    "cellphone": "206-555-1111",
    "channel_reservation_id": "",
    "price": {
        "rental_price": 1498,
        "cleaning_fee": 354,
        "tax": 203.72,
        "currency": ""
    }
}
```

### HTTP Request
`GET /api/1.0.0/redAwning/reservation/{reservationId}`


<!-- END_c1a7991c952d98f9492335e7f72322ea -->

<!-- START_b09ba5835926e593aa6ea2d1e82c0728 -->
## delete  reservation by id

> Example request:

```bash
curl -X DELETE "/api/1.0.0/redAwning/reservation/{reservationId}/delete" 
```

```javascript
const url = new URL("/api/1.0.0/redAwning/reservation/{reservationId}/delete");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "reservation_id": "49856",
    "effective_policies": []
}
```

### HTTP Request
`DELETE /api/1.0.0/redAwning/reservation/{reservationId}/delete`


<!-- END_b09ba5835926e593aa6ea2d1e82c0728 -->

<!-- START_1e4615d9b8c7e080f5f8a583c47bb17b -->
## get reservation status

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/reservation/{reservationId}/status" 
```

```javascript
const url = new URL("/api/1.0.0/redAwning/reservation/{reservationId}/status");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "reservation_id": "49856",
    "effective_policies": []
}
```

### HTTP Request
`GET /api/1.0.0/redAwning/reservation/{reservationId}/status`


<!-- END_1e4615d9b8c7e080f5f8a583c47bb17b -->


