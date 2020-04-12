# Reliable Google Cloud Infrastructure: Design and Process


# Devops
* Create repo in cloud source repo
* Open cloud shell
* gcloud source repos clone devops-repo
* gcloud builds submit --tag gcr.io/$DEVSHELL_PROJECT_ID/devops-image:v0.1 .
* write docker file and create build
* configure auto trigger

