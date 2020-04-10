# Essential Google Cloud Infrastructure: Foundation

* gsutil mb gs://akil-test1
* gsutil cp 0.jpeg gs://akil-test1
* gcloud compute regions list
* gcloud config list
* gcloud config set project $PROJECT_ID

# Virtual Networks [VPC, subnets, Firewall, route]
* one default vpc with subnets in all regions
* delete default vpc then create custom mode vpc. It creates subnets in all the regions
* If you accidently deleted default vpc, then create vpc with automatic mode. It creates subnets in all the region with default firewall rules
* us-central1 - 10.128.0.0/20, europe-west1 - 10.132.0.0/20
* us-vm - 10.132.0.2, eurpoe vm - 10.128.0.2 
* ping -c 3 10.132.0.2 from 10.128.0.2 - Because of mynetwork-allow-internal
* ping -c 3 mynet-eu-vm - hostname - Because of mynetwork-allow-internal
* ping -c 3 35.233.100.16 - External IP - Because of mynetwork-allow-icmp

# VPC task based on the vpc diagram
* gcloud compute --project=qwiklabs-gcp-03-65aa433d9288 networks create managementnet --subnet-mode=custom
* gcloud compute --project=qwiklabs-gcp-03-65aa433d9288 networks subnets create managementsubnet-us --network=managementnet --region=us-central1 --range=10.130.0.0/20
* gcloud compute networks create privatenet --subnet-mode=custom
* gcloud compute networks subnets create privatesubnet-us --network=privatenet --region=us-central1 --range=172.16.0.0/24
* gcloud compute networks subnets create privatesubnet-eu --network=privatenet --region=europe-west1 --range=172.20.0.0/20
* gcloud compute networks list
* gcloud compute networks subnets list --sort-by=NETWORK
* gcloud compute --project=qwiklabs-gcp-03-65aa433d9288 firewall-rules create managementnet-allow-icmp-ssh-rdp --direction=INGRESS --priority=1000 --network=managementnet --action=ALLOW --rules=tcp:22,tcp:3389,icmp --source-ranges=0.0.0.0/0
* gcloud compute firewall-rules list --sort-by=NETWORK
* gcloud beta compute instances create managementnet-us-vm --zone=us-central1-c --machine-type=f1-micro --subnet=managementsubnet-us --network-tier=PREMIUM --maintenance-policy=MIGRATE --service-account=387767582595-compute@developer.gserviceaccount.com --scopes=https://www.googleapis.com/auth/devstorage.read_only,https://www.googleapis.com/auth/logging.write,https://www.googleapis.com/auth/monitoring.write,https://www.googleapis.com/auth/servicecontrol,https://www.googleapis.com/auth/service.management.readonly,https://www.googleapis.com/auth/trace.append --image=debian-9-stretch-v20200309 --image-project=debian-cloud --boot-disk-size=10GB --boot-disk-type=pd-standard --boot-disk-device-name=managementnet-us-vm --reservation-affinity=any
* gcloud compute instances create privatenet-us-vm --zone=us-central1-c --machine-type=f1-micro --subnet=privatesubnet-us
* gcloud compute instances list --sort-by=ZONE