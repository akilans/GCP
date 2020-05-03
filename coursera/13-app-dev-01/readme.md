# Getting Started With Application Development
* Google cloud sdk - gcloud, bq, gsutil
* Google API explorer - to test API, search services and methods, sandbox
* Refer nodejs/01-app

# Storage Options
* cloud storage - image, videos, object storage
* Cloud Datastore - NoSQL, key, value data, semi structured
* Cloud Firestore - NoSQL, Native support for web, mobile, realtime. advanced version for datastore. document based
* Big table - NoSQL, wide column data, TB to PB storage, Hbase, Mapreduce, low latency, 
* Cloud SQL - RDBMS, Mysql, pstgresql, use cloud proxy to connect
* Cloud spannel - global, high availability, strong consistency
* Bigquery - analytics for large datasets, datawarehouse
* Firebase
* Memecached Redis

# Datastore
* Kind - table, Entity - row, Property - field, key - primary key
* Does not support join

# Pub/Sub
* create topic called feedback in console
* gcloud pubsub subscriptions create cloud-shell-subscription --topic feedback
* gcloud pubsub topics publish feedback --message "Hello World"
* gcloud pubsub subscriptions pull cloud-shell-subscription --auto-ack
* 