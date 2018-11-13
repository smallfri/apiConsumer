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
[Get Postman Collection](http://trialtesting.com/docs/collection.json)

<!-- END_INFO -->

#general
<!-- START_a710b57b4284f6b32dbfd8dc78203367 -->
## XML feed of all MBP products

> Example request:

```bash
curl -X GET -G "/api/1.0.0/bookingPal/type/{type}" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "/api/1.0.0/bookingPal/type/{type}",
    "method": "GET",
    "headers": {
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/1.0.0/bookingPal/type/{type}`


<!-- END_a710b57b4284f6b32dbfd8dc78203367 -->

<!-- START_5dcd935510b012ae409ded8cbb60d687 -->
## Gets MBP product id by name

> Example request:

```bash
curl -X GET -G "/api/1.0.0/bookingPal/name/{name}" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "/api/1.0.0/bookingPal/name/{name}",
    "method": "GET",
    "headers": {
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/1.0.0/bookingPal/name/{name}`


<!-- END_5dcd935510b012ae409ded8cbb60d687 -->

<!-- START_7496fb7e35b97e606b6a53d4318e3526 -->
## gets MBP property details

> Example request:

```bash
curl -X GET -G "/api/1.0.0/bookingPal/{productId}/property_details" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "/api/1.0.0/bookingPal/{productId}/property_details",
    "method": "GET",
    "headers": {
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/1.0.0/bookingPal/{productId}/property_details`


<!-- END_7496fb7e35b97e606b6a53d4318e3526 -->

<!-- START_2c7cf6ea70a80c5e02d02058f42a8a5a -->
## gets MBP property summary

> Example request:

```bash
curl -X GET -G "/api/1.0.0/bookingPal/{productId}/property_summary" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "/api/1.0.0/bookingPal/{productId}/property_summary",
    "method": "GET",
    "headers": {
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/1.0.0/bookingPal/{productId}/property_summary`


<!-- END_2c7cf6ea70a80c5e02d02058f42a8a5a -->

<!-- START_7eb56078a73f9ea1424eeb28da302935 -->
## gets MBP quote

> Example request:

```bash
curl -X GET -G "/api/1.0.0/bookingPal/{productId}/prices/from_date/{fromDate}/to_date/{toDate}" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "/api/1.0.0/bookingPal/{productId}/prices/from_date/{fromDate}/to_date/{toDate}",
    "method": "GET",
    "headers": {
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/1.0.0/bookingPal/{productId}/prices/from_date/{fromDate}/to_date/{toDate}`


<!-- END_7eb56078a73f9ea1424eeb28da302935 -->

<!-- START_145b42d1f1354927d22cd3ad01aad681 -->
## get MBP prices

> Example request:

```bash
curl -X GET -G "/api/1.0.0/bookingPal/{productId}/quote/from_date/{fromDate}/to_date/{toDate}" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "/api/1.0.0/bookingPal/{productId}/quote/from_date/{fromDate}/to_date/{toDate}",
    "method": "GET",
    "headers": {
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/1.0.0/bookingPal/{productId}/quote/from_date/{fromDate}/to_date/{toDate}`


<!-- END_145b42d1f1354927d22cd3ad01aad681 -->

<!-- START_4ffacd6f4ff0283695fa3744926f1925 -->
## gets MBP availability

> Example request:

```bash
curl -X GET -G "/api/1.0.0/bookingPal/{productId}/availability/from_date/{fromDate}/to_date/{toDate}" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "/api/1.0.0/bookingPal/{productId}/availability/from_date/{fromDate}/to_date/{toDate}",
    "method": "GET",
    "headers": {
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/1.0.0/bookingPal/{productId}/availability/from_date/{fromDate}/to_date/{toDate}`


<!-- END_4ffacd6f4ff0283695fa3744926f1925 -->

<!-- START_25ddcd2d91ae036b539e5420372b537d -->
## creates a MBP booking

> Example request:

```bash
curl -X POST "/api/1.0.0/bookingPal/createBooking" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "/api/1.0.0/bookingPal/createBooking",
    "method": "POST",
    "headers": {
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/1.0.0/bookingPal/createBooking`


<!-- END_25ddcd2d91ae036b539e5420372b537d -->

<!-- START_2a0c78389f806eda63f60bd58591ec6a -->
## display RW listing

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/listings" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "/api/1.0.0/redAwning/listings",
    "method": "GET",
    "headers": {
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "status": "success"
}
```

### HTTP Request
`GET /api/1.0.0/redAwning/listings`


<!-- END_2a0c78389f806eda63f60bd58591ec6a -->

<!-- START_430e67b627f79c2518ee54e238c2b1f1 -->
## get RW changes

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/changes" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "/api/1.0.0/redAwning/changes",
    "method": "GET",
    "headers": {
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "status": "success"
}
```

### HTTP Request
`GET /api/1.0.0/redAwning/changes`


<!-- END_430e67b627f79c2518ee54e238c2b1f1 -->

<!-- START_dcd05d3ef83df123ac6588506049b190 -->
## get RW listing details

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/listings/{listingId}/property_details" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "/api/1.0.0/redAwning/listings/{listingId}/property_details",
    "method": "GET",
    "headers": {
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/1.0.0/redAwning/listings/{listingId}/property_details`


<!-- END_dcd05d3ef83df123ac6588506049b190 -->

<!-- START_19976a9d0a6b4f219ed0dd45feb9af8b -->
## get RA quote

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/quote/{listingId}/from_date/{fromDate}/to_date/{toDate}" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "/api/1.0.0/redAwning/quote/{listingId}/from_date/{fromDate}/to_date/{toDate}",
    "method": "GET",
    "headers": {
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

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
## get RW listing by id

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/listings/{listingId}" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "/api/1.0.0/redAwning/listings/{listingId}",
    "method": "GET",
    "headers": {
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

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
## display RW listing status

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/listings/{listingId}/status" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "/api/1.0.0/redAwning/listings/{listingId}/status",
    "method": "GET",
    "headers": {
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

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
## get RW listing availability

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/listings/{listingId}/availability" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "/api/1.0.0/redAwning/listings/{listingId}/availability",
    "method": "GET",
    "headers": {
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

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
## get RA listing checkin/checkout

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/listings/{listingId}/cico" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "/api/1.0.0/redAwning/listings/{listingId}/cico",
    "method": "GET",
    "headers": {
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

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
## get RA checkin/checkout times

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/listings/{listingId}/cicotimes" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "/api/1.0.0/redAwning/listings/{listingId}/cicotimes",
    "method": "GET",
    "headers": {
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

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
## get RA listing content

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/listings/{listingId}/content" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "/api/1.0.0/redAwning/listings/{listingId}/content",
    "method": "GET",
    "headers": {
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

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
## get RA listing summaries

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/listing-summaries" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "/api/1.0.0/redAwning/listing-summaries",
    "method": "GET",
    "headers": {
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

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


<!-- END_56c06439559bad8622cda4007ab92e21 -->

<!-- START_061f6edfc77c530528f10b9266e0c02b -->
## get RA listing policies

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/listings/{listingId}/policies" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "/api/1.0.0/redAwning/listings/{listingId}/policies",
    "method": "GET",
    "headers": {
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

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
## get RA listing price

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/listings/{listingId}/price" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "/api/1.0.0/redAwning/listings/{listingId}/price",
    "method": "GET",
    "headers": {
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 4,
    "name": "Jessica Jones",
    "roles": [
        "admin"
    ]
}
```

### HTTP Request
`GET /api/1.0.0/redAwning/listings/{listingId}/price`


<!-- END_f67c886f61ac7dce39d1de96ad655a98 -->

<!-- START_77613bdce51caa382cd2e71114d25974 -->
## create RA new reservation

> Example request:

```bash
curl -X POST "/api/1.0.0/redAwning/reservations" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "/api/1.0.0/redAwning/reservations",
    "method": "POST",
    "headers": {
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

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


<!-- END_77613bdce51caa382cd2e71114d25974 -->

<!-- START_46e1218258df1d0ab6beb1e2f42b4052 -->
## get RA reservations

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/reservations" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "/api/1.0.0/redAwning/reservations",
    "method": "GET",
    "headers": {
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

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
## get RA reservation by id

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/reservation/{reservationId}" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "/api/1.0.0/redAwning/reservation/{reservationId}",
    "method": "GET",
    "headers": {
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

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
## delete RA reservation by id

> Example request:

```bash
curl -X DELETE "/api/1.0.0/redAwning/reservation/{reservationId}/delete" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "/api/1.0.0/redAwning/reservation/{reservationId}/delete",
    "method": "DELETE",
    "headers": {
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

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
## get RA reservation status

> Example request:

```bash
curl -X GET -G "/api/1.0.0/redAwning/reservation/{reservationId}/status" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "/api/1.0.0/redAwning/reservation/{reservationId}/status",
    "method": "GET",
    "headers": {
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "reservation_id": "49856",
    "effective_policies": []
}
```

### HTTP Request
`GET /api/1.0.0/redAwning/reservation/{reservationId}/status`


<!-- END_1e4615d9b8c7e080f5f8a583c47bb17b -->


