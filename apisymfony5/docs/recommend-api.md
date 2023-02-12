### Recommendation API

- https://github.com/SpectoLabs/hoverfly
- https://docs.hoverfly.io/en/latest/

GET /api/v1/book/{book_id}/recommendations
Authorization: Bearer {token}


### 200

```json
{
   "id": 1,
   "ts": 123213123,
   "recommendations": [
     {"id":  1}
   ]
}
```


### 403

```json
{
   "error": "access denied"
}
```


### LUNCH
```
$ curl localhost:8500/api/v1/book/5/recommendations -H 'Authorization: Bearer tes'
```
