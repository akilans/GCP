# Preparing for the Google Cloud Associate Cloud Engineer Exam
* https://cloud.google.com/certification/practice-exam/cloud-engineer

# Network Load Balancer

* gcloud auth list
* gcloud config list project
* gcloud config set compute/region us-central1
* gcloud config set compute/zone us-central1-a
* gcloud compute instance-templates create nginx-template \
         --metadata-from-file startup-script=startup.sh
* gcloud compute target-pools create nginx-pool
* gcloud compute instance-groups managed create nginx-group \
         --base-instance-name nginx \
         --size 2 \
         --template nginx-template \
         --target-pool nginx-pool
* gcloud compute instances list
* gcloud compute firewall-rules create www-firewall --allow tcp:80
* gcloud compute forwarding-rules create nginx-lb \
         --region us-central1 \
         --ports=80 \
         --target-pool nginx-pool
* gcloud compute forwarding-rules list

# HTTPS load balancer
* gcloud compute http-health-checks create http-basic-check
* gcloud compute instance-groups managed \
       set-named-ports nginx-group \
       --named-ports http:80
* gcloud compute backend-services create nginx-backend \
      --protocol HTTP --http-health-checks http-basic-check --global
* gcloud compute backend-services add-backend nginx-backend \
    --instance-group nginx-group \
    --instance-group-zone us-central1-a \
    --global
* gcloud compute url-maps create web-map \
    --default-service nginx-backend
* gcloud compute target-http-proxies create http-lb-proxy \
    --url-map web-map
* gcloud compute forwarding-rules create http-content-rule \
        --global \
        --target-http-proxy http-lb-proxy \
        --ports 80


# Kubernetes
* gcloud config set compute/zone us-central1-a
* gcloud container clusters list
* gcloud container clusters create my-cluster
* gcloud container clusters get-credentials my-cluster
* kubectl run hello-server --image=gcr.io/google-samples/hello-app:1.0 --port 8080
* kubectl expose deployment hello-server --type="LoadBalancer"
* gcloud container clusters delete my-cluster