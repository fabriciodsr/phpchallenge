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
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#Order

Allows you to get order info from persons
<!-- START_d330c6fd26b85716d20107e9010c493a -->
## Get all orders

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Allows you to get a list of all orders registered on the application

> Example request:

```bash
curl -X GET -G "http://localhost/api/shiporder" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/shiporder",
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
    "id": 1,
    "orderid": 1,
    "created": "02\/11\/2018 03:23:21",
    "updated": "02\/11\/2018 05:52:41",
    "items": "http:\/\/127.0.0.1\/api\/shipitems\/orders\/1",
    "shipto": "http:\/\/127.0.0.1\/api\/shipto\/orders\/1",
    "orderperson": "http:\/\/127.0.0.1\/api\/person\/1"
}
```

### HTTP Request
`GET api/shiporder`


<!-- END_d330c6fd26b85716d20107e9010c493a -->

<!-- START_b95d61636707e5e37af6a0df2e9cba95 -->
## Get a order by Id

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Allows you to see a order registered on the application by it's Id

> Example request:

```bash
curl -X GET -G "http://localhost/api/shiporder/{orderId}" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/shiporder/{orderId}",
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
    "id": 1,
    "orderid": 1,
    "created": "02\/11\/2018 03:23:21",
    "updated": "02\/11\/2018 05:52:41",
    "items": "http:\/\/127.0.0.1\/api\/shipitems\/orders\/1",
    "shipto": "http:\/\/127.0.0.1\/api\/shipto\/orders\/1",
    "orderperson": "http:\/\/127.0.0.1\/api\/person\/1"
}
```

### HTTP Request
`GET api/shiporder/{orderId}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    shiporderId |  required  | The id of the order.

<!-- END_b95d61636707e5e37af6a0df2e9cba95 -->

<!-- START_c8d52f17e52f3a6e4457f41f8596df2d -->
## Get all orders from a person by personId

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Allows you to see all orders from a person registered on the application by personId

> Example request:

```bash
curl -X GET -G "http://localhost/api/shiporder/person/{personId}" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/shiporder/person/{personId}",
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
    "id": 1,
    "orderid": 1,
    "created": "02\/11\/2018 03:23:21",
    "updated": "02\/11\/2018 05:52:41",
    "items": "http:\/\/127.0.0.1\/api\/shipitems\/orders\/1",
    "shipto": "http:\/\/127.0.0.1\/api\/shipto\/orders\/1",
    "orderperson": "http:\/\/127.0.0.1\/api\/person\/1"
}
```

### HTTP Request
`GET api/shiporder/person/{personId}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    personId |  required  | The id of the person.

<!-- END_c8d52f17e52f3a6e4457f41f8596df2d -->

#Order Items

Allows you to get item info from orders
<!-- START_993c19ee4635b1c56944eac43bc5df6d -->
## Get all items

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Allows you to get a list of all items registered on the application

> Example request:

```bash
curl -X GET -G "http://localhost/api/shipitems" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/shipitems",
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
    "id": 1,
    "title": "Title 1",
    "note": "Note 1",
    "quantity": 745,
    "price": "123.45",
    "created": "02\/11\/2018 03:23:21",
    "updated": "02\/11\/2018 05:52:41",
    "shiporder": "http:\/\/127.0.0.1\/api\/shiporder\/1"
}
```

### HTTP Request
`GET api/shipitems`


<!-- END_993c19ee4635b1c56944eac43bc5df6d -->

<!-- START_5b78ba599694ae99d8d42c8ccd7c21e3 -->
## Get a item by Id

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Allows you to see a item registered on the application by it's Id

> Example request:

```bash
curl -X GET -G "http://localhost/api/shipitems/{shipitemId}" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/shipitems/{shipitemId}",
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
    "id": 1,
    "title": "Title 1",
    "note": "Note 1",
    "quantity": 745,
    "price": "123.45",
    "created": "02\/11\/2018 03:23:21",
    "updated": "02\/11\/2018 05:52:41",
    "shiporder": "http:\/\/127.0.0.1\/api\/shiporder\/1"
}
```

### HTTP Request
`GET api/shipitems/{shipitemId}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    shipitemId |  required  | The id of the item.

<!-- END_5b78ba599694ae99d8d42c8ccd7c21e3 -->

<!-- START_0ae0968577cd66d1e3e47ad7a83aceee -->
## Get all items from a order by orderId

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Allows you to see all items from a order registered on the application by orderId

> Example request:

```bash
curl -X GET -G "http://localhost/api/shipitems/orders/{orderId}" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/shipitems/orders/{orderId}",
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
    "id": 1,
    "title": "Title 1",
    "note": "Note 1",
    "quantity": 745,
    "price": "123.45",
    "created": "02\/11\/2018 03:23:21",
    "updated": "02\/11\/2018 05:52:41",
    "shiporder": "http:\/\/127.0.0.1\/api\/shiporder\/1"
}
```

### HTTP Request
`GET api/shipitems/orders/{orderId}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    shiporderId |  required  | The id of the order.

<!-- END_0ae0968577cd66d1e3e47ad7a83aceee -->

#Order Ships

Allows you to get ship info from orders
<!-- START_1972bb05375015c58fd0fee8f903b792 -->
## Get all ships

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Allows you to get a list of all ships registered on the application

> Example request:

```bash
curl -X GET -G "http://localhost/api/shipto" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/shipto",
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
    "id": 1,
    "name": "Name 1",
    "address": "Address 1",
    "city": "City 1",
    "country": "Country 1",
    "created": "02\/11\/2018 03:23:21",
    "updated": "02\/11\/2018 05:52:41",
    "shiporder": "http:\/\/127.0.0.1\/api\/shiporder\/1"
}
```

### HTTP Request
`GET api/shipto`


<!-- END_1972bb05375015c58fd0fee8f903b792 -->

<!-- START_b1c19b60e2064e79ccd4d35deed3ce17 -->
## Get a ship by Id

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Allows you to see a ship registered on the application by it's Id

> Example request:

```bash
curl -X GET -G "http://localhost/api/shipto/{shiptoId}" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/shipto/{shiptoId}",
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
    "id": 1,
    "name": "Name 1",
    "address": "Address 1",
    "city": "City 1",
    "country": "Country 1",
    "created": "02\/11\/2018 03:23:21",
    "updated": "02\/11\/2018 05:52:41",
    "shiporder": "http:\/\/127.0.0.1\/api\/shiporder\/1"
}
```

### HTTP Request
`GET api/shipto/{shiptoId}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    shiptoId |  required  | The id of the item.

<!-- END_b1c19b60e2064e79ccd4d35deed3ce17 -->

<!-- START_a0419e90e795b27036a58a8b9e257ee0 -->
## Get all ships from a order by orderId

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Allows you to see all ships from a order registered on the application by orderId

> Example request:

```bash
curl -X GET -G "http://localhost/api/shipto/orders/{orderId}" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/shipto/orders/{orderId}",
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
    "id": 1,
    "name": "Name 1",
    "address": "Address 1",
    "city": "City 1",
    "country": "Country 1",
    "created": "02\/11\/2018 03:23:21",
    "updated": "02\/11\/2018 05:52:41",
    "shiporder": "http:\/\/127.0.0.1\/api\/shiporder\/1"
}
```

### HTTP Request
`GET api/shipto/orders/{orderId}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    shiporderId |  required  | The id of the order.

<!-- END_a0419e90e795b27036a58a8b9e257ee0 -->

#Person

Allows you to get person info
<!-- START_f380b91d469dfe31cfef8686a40905ef -->
## Get all persons

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Allows you to get a list of all persons registered on the application

> Example request:

```bash
curl -X GET -G "http://localhost/api/person" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/person",
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
    "id": 1,
    "personid": 1,
    "personname": "Name 1",
    "created": "02\/11\/2018 03:23:21",
    "updated": "02\/11\/2018 05:52:40",
    "phones": "http:\/\/127.0.0.1\/api\/phones\/person\/1",
    "orders": "http:\/\/127.0.0.1\/api\/shiporder\/person\/1"
}
```

### HTTP Request
`GET api/person`


<!-- END_f380b91d469dfe31cfef8686a40905ef -->

<!-- START_c76c739a3d0a1f5bfc9ee99df29b8945 -->
## Get a person by Id

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Allows you to see a person registered on the application by it's Id

> Example request:

```bash
curl -X GET -G "http://localhost/api/person/{personid}" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/person/{personid}",
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
    "id": 1,
    "personid": 1,
    "personname": "Name 1",
    "created": "02\/11\/2018 03:23:21",
    "updated": "02\/11\/2018 05:52:40",
    "phones": "http:\/\/127.0.0.1\/api\/phones\/person\/1",
    "orders": "http:\/\/127.0.0.1\/api\/shiporder\/person\/1"
}
```

### HTTP Request
`GET api/person/{personid}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    personId |  required  | The id of the person.

<!-- END_c76c739a3d0a1f5bfc9ee99df29b8945 -->

#Person Phones

Allows you to get phone info from persons
<!-- START_347b1754bf0773fb03abf5021bdb9691 -->
## Get all phones

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Allows you to get a list of all phones registered on the application

> Example request:

```bash
curl -X GET -G "http://localhost/api/phones" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/phones",
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
    "id": 1,
    "phone": "2345678",
    "created": "02\/11\/2018 03:23:21",
    "updated": "02\/11\/2018 05:52:40",
    "person": "http:\/\/127.0.0.1\/api\/person\/1"
}
```

### HTTP Request
`GET api/phones`


<!-- END_347b1754bf0773fb03abf5021bdb9691 -->

<!-- START_7804f684de40e0500e682223da6ac1af -->
## Get a phone by Id

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Allows you to see a phone registered on the application by it's Id

> Example request:

```bash
curl -X GET -G "http://localhost/api/phones/{phoneId}" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/phones/{phoneId}",
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
    "id": 1,
    "phone": "2345678",
    "created": "02\/11\/2018 03:23:21",
    "updated": "02\/11\/2018 05:52:40",
    "person": "http:\/\/127.0.0.1\/api\/person\/1"
}
```

### HTTP Request
`GET api/phones/{phoneId}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    phoneId |  required  | The id of the phone.

<!-- END_7804f684de40e0500e682223da6ac1af -->

<!-- START_7c5b02e97e19948c34b31d593d3274d4 -->
## Get all phones from a person by personId

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Allows you to see all phones from a person registered on the application by personId

> Example request:

```bash
curl -X GET -G "http://localhost/api/phones/person/{personId}" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/phones/person/{personId}",
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
    "id": 1,
    "phone": "2345678",
    "created": "02\/11\/2018 03:23:21",
    "updated": "02\/11\/2018 05:52:40",
    "person": "http:\/\/127.0.0.1\/api\/person\/1"
}
```

### HTTP Request
`GET api/phones/person/{personId}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    personId |  required  | The id of the person.

<!-- END_7c5b02e97e19948c34b31d593d3274d4 -->


