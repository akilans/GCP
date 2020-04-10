# Essential Google Cloud Infrastructure: Core Services
* CloudIAM
* Cloud Storage and DB Services
* Resource Monitoring

# Cloud Storage
* gsutil cp setup.html gs://$BUCKET_NAME_1/
* gsutil acl get gs://$BUCKET_NAME_1/setup.html  > acl.txt - Default access
* gsutil acl set private gs://$BUCKET_NAME_1/setup.html - Make it private
* gsutil acl get gs://$BUCKET_NAME_1/setup.html  > acl2.txt
* gsutil acl ch -u AllUsers:R gs://$BUCKET_NAME_1/setup.html
* gsutil acl get gs://$BUCKET_NAME_1/setup.html  > acl3.txt
* python3 -c 'import base64; import os; print(base64.encodebytes(os.urandom(32)))'
* edit .boto file [run gsutil config -n if not present] and encryption_key
* gsutil cp gs://$BUCKET_NAME_1/setup* ./
* Generate another encyption key and update encryption_key in .boto
* Add decryption_key1 as encryption_key1
* gsutil rewrite -k gs://$BUCKET_NAME_1/setup2.html
* gsutil lifecycle get gs://$BUCKET_NAME_1
* gsutil lifecycle set life.json gs://$BUCKET_NAME_1
* gsutil versioning get gs://$BUCKET_NAME_1
* gsutil versioning set on gs://$BUCKET_NAME_1
* gsutil cp -v setup.html gs://$BUCKET_NAME_1 - copy file with versioning option
* gsutil ls -a gs://$BUCKET_NAME_1/setup.html - List with version
* export VERSION_NAME=gs://inba-test-gcp/setup.html#1586501224999171
* gsutil cp $VERSION_NAME recovered.txt

### Synch
* mkdir firstlevel
* mkdir ./firstlevel/secondlevel
* cp setup.html firstlevel
* cp setup.html firstlevel/secondlevel
* gsutil rsync -r ./firstlevel gs://$BUCKET_NAME_1/firstlevel

# Cross Project Sharing
* Create service account in project 2 with credentials key
* Create Bucket in project 2 which needs to be accessed by project 1
* Create VM and ssh to that. Upload the key in the VM
* gcloud auth activate-service-account --key-file credentials.json