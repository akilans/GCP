# Architecting with Google Kubernetes Engine: Foundations

# GCP Basics
* gsutil mb gs://$MY_BUCKET_NAME_2
* gsutil mb gs://$MY_BUCKET_NAME_2
* gcloud config set compute/zone $MY_ZONE
* gcloud compute instances create $MY_VMNAME \
--machine-type "n1-standard-1" \
--image-project "debian-cloud" \
--image-family "debian-9" \
--subnet "default"
* gcloud compute instances list
* gcloud iam service-accounts create test-service-account2 --display-name "test-service-account2"
* gcloud projects add-iam-policy-binding $GOOGLE_CLOUD_PROJECT --member serviceAccount:test-service-account2@${GOOGLE_CLOUD_PROJECT}.iam.gserviceaccount.com --role roles/viewer
* gsutil cp gs://cloud-training/ak8s/cat.jpg cat.jpg
* gsutil cp cat.jpg gs://$MY_BUCKET_NAME_1
* gsutil cp gs://$MY_BUCKET_NAME_1/cat.jpg gs://$MY_BUCKET_NAME_2/cat.jpg
* gsutil acl get gs://$MY_BUCKET_NAME_1/cat.jpg  > acl.txt
cat acl.txt
* gsutil acl set private gs://$MY_BUCKET_NAME_1/cat.jpg
* gcloud config list
* gcloud auth activate-service-account --key-file credentials.json
* gcloud config list
* gcloud auth list
* gsutil cp gs://$MY_BUCKET_NAME_1/cat.jpg ./cat-copy.jpg
* gsutil cp gs://$MY_BUCKET_NAME_2/cat.jpg ./cat-copy.jpg
* gcloud config set account [USERNAME]
* gsutil cp gs://$MY_BUCKET_NAME_1/cat.jpg ./copy2-of-cat.jpg
* gsutil iam ch allUsers:objectViewer gs://$MY_BUCKET_NAME_1
* gcloud compute scp index.html first-vm:index.nginx-debian.html --zone=us-central1-c

# Cloud Buils
* gcloud builds submit --tag gcr.io/${GOOGLE_CLOUD_PROJECT}/quickstart-image .
* gcloud builds submit --config cloudbuild.yaml .