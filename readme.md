# Google Cloud Platform
* https://cloudonair.withgoogle.com
* https://cloudonair.withgoogle.com/events/onboard-core-infrastructure
* https://go.qwiklabs.com/cloud-hero-core-infrastructure - code - onboard-core

# gcloud shell
* gcloud config set compute/zone us-central1-a - set default zone
* gcloud config set compute/region us-central1 - set default region
* gcloud compute project-info describe --project <your_project_ID> - list project information
* gcloud auth list - list the active account name
* gcloud config list project - list the project ID
* gcloud compute zones list - List all the zones
* gcloud compute project-info describe --project myproject - heck project-wide quotas

# GKE cluster
* gcloud container clusters create my-cluster - create k8s cluster
* gcloud container clusters get-credentials my-cluster - Set kubectl credential
* kubectl run hello-server --image=gcr.io/google-samples/hello-app:1.0 --port 8080
* kubectl expose deployment hello-server --type="LoadBalancer"
* gcloud container clusters delete my-cluster - delete cluster

# GCE
* gcloud compute instances create gcelab2 --machine-type n1-standard-2 --zone us-central1-a
* gcloud compute ssh gcelab2 --zone us-central1-a
* gcloud compute firewall-rules create allow-monolith-nodeport \
  --allow=tcp:31000
* gcloud compute instances list - List all the VMs
* gcloud compute instances get-serial-port-output instance-1 --zone us-central1-a

# Network and HTTP Loadbalancer
* Instance Templates define the look of every virtual machine in the cluster (disk, CPUs, memory, etc). Managed Instance Groups instantiate a number of virtual machine instances using the Instance Template.
* gcloud compute instance-templates create nginx-template --metadata-from-file startup-script=startup.sh 
* Create a target pool. A target pool allows a single access point to all the instances in a group and is necessary for load balancing
* gcloud compute target-pools create nginx-pool
* This creates 2 virtual machine instances with names that are prefixed with nginx-
* gcloud compute instance-groups managed create nginx-group \
         --base-instance-name nginx \
         --size 2 \
         --template nginx-template \
         --target-pool nginx-pool
* gcloud compute firewall-rules create www-firewall --allow tcp:80

### Network Load balancer
* gcloud compute forwarding-rules create nginx-lb \
         --region us-central1 \
         --ports=80 \
         --target-pool nginx-pool

### HTTP Load Balancer
* First, create a health check
    * gcloud compute http-health-checks create http-basic-check
* Define an HTTP service and map a port name to the relevant port for the instance group. Now the load balancing service can forward traffic to the named port:
    * gcloud compute instance-groups managed \
        set-named-ports nginx-group \
        --named-ports http:80
* Create a backend service:
    * gcloud compute backend-services create nginx-backend \
        --protocol HTTP --http-health-checks http-basic-check --global
* Add the instance group into the backend service:
    * gcloud compute backend-services add-backend nginx-backend \
        --instance-group nginx-group \
        --instance-group-zone us-central1-a \
        --global
* Create a default URL map that directs all incoming requests to all your instances:
    * gcloud compute url-maps create web-map \
    --default-service nginx-backend
* Create a target HTTP proxy to route requests to your URL map:
    * gcloud compute target-http-proxies create http-lb-proxy \
    --url-map web-map
* Create a global forwarding rule to handle and route incoming requests
    * gcloud compute forwarding-rules create http-content-rule \
        --global \
        --target-http-proxy http-lb-proxy \
        --ports 80
* gcloud compute forwarding-rules list