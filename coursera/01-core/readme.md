# Compute Engine
* gcloud compute zones list | grep us-central1 - List all the zones
* gcloud config set compute/zone us-central1-b
* gcloud compute instances create "my-vm-2"  --machine-type="n1-standard-1" --image="debian-9-stretch-v20190213" --subnet="default" --image-project="debian-cloud"

# Storage
* gsutil mb -l $LOCATION gs://$DEVSHELL_PROJECT_ID
* gsutil cp gs://cloud-training/gcpfci/my-excellent-blog.png .
* gsutil cp my-excellent-blog.png gs://$DEVSHELL_PROJECT_ID
* gsutil acl ch -u allUsers:R gs://qwiklabs-gcp-00-6fc7d078b120/my-excellent-blog.png

# GKE
* gcloud container clusters create webfrontend --zone=$MY_ZONE --num-nodes=2
* 