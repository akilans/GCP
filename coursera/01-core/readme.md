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
* kubectl get nodes
* kubectl get pods
* kubectl create deployment nginx --image=nginx
* kubectl expose deployment nginx --port=80 --type=LoadBalancer

# App Engine
* gcloud auth list - list the active account name
* gcloud config list project - list the project ID
* gcloud components install app-engine-python
* gcloud app create --project=$DEVSHELL_PROJECT_ID
* https://github.com/GoogleCloudPlatform/python-docs-samples/tree/master/appengine/standard_python37/hello_world
* gcloud app deploy - deploy app to app engine

# Development in tha cloud
* Cloud repos
* Cloud functions
* Deployment manager
* Stack driver
* gcloud deployment-manager deployments create my-first-depl --config mydeploy.yaml
* gcloud deployment-manager deployments list
* gcloud deployment-manager deployments update my-first-depl --config mydeploy.yaml