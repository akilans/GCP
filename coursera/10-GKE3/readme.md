# Architecting with Google Kubernetes Engine: Production

# Pod Security Policy

* kubectl apply -f restricted-psp.yaml
* kubectl create clusterrolebinding cluster-admin-binding --clusterrole cluster-admin --user $USERNAME_1_EMAIL
* kubectl apply -f restricted-pods-role.yaml
* gcloud beta container clusters update $my_cluster --zone $my_zone --enable-pod-security-policy
* kubectl apply -f privileged-pod.yaml
* kubectl apply -f unprivileged-pod.yaml
* kubectl create clusterrolebinding restricted-pods-binding --clusterrole restricted-pods-role --user student-00-9c3b344b75f2@qwiklabs.net

# Rotate IP address and credentials
* gcloud container clusters update $my_cluster --zone $my_zone --start-credential-rotation
* gcloud container operations list
* export UPGRADE_ID=$(gcloud container operations list --filter="operationType=UPGRADE_NODES and status=RUNNING" --format='value(name)')
* gcloud container operations wait $UPGRADE_ID --zone=$my_zone
* gcloud container clusters update $my_cluster --zone $my_zone --complete-credential-rotation

# Stack Driver for GKE
* gcloud container clusters create $my_cluster \
   --num-nodes 3 --enable-ip-alias --zone $my_zone  \
   --enable-stackdriver-kubernetes
* kubectl get daemonsets.apps -n kube-system prometheus-to-sd

# SQL instance to GKE pod
* gcloud sql instances create sql-instance --tier=db-n1-standard-2 --region=us-central1
* 