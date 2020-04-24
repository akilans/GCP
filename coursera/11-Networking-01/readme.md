# Networking in Google Cloud: Defining and Implementing Networks

## Working with multiple VPC networks
* Refer lab.png
* gcloud compute networks create privatenet --subnet-mode=custom
* gcloud compute networks subnets create privatesubnet-us --network=privatenet --region=us-central1 --range=172.16.0.0/24
* gcloud compute networks subnets create privatesubnet-eu --network=privatenet --region=europe-west1 --range=172.20.0.0/20
* gcloud compute networks list
* gcloud compute networks subnets list --sort-by=NETWORK
* gcloud compute --project=qwiklabs-gcp-02-54404c251ca3 firewall-rules create managementnet-allow-icmp-ssh-rdp --direction=INGRESS --priority=1000 --network=managementnet --action=ALLOW --rules=tcp:22,tcp:3389,icmp --source-ranges=0.0.0.0/0
* gcloud compute firewall-rules create privatenet-allow-icmp-ssh-rdp --direction=INGRESS --priority=1000 --network=privatenet --action=ALLOW --rules=icmp,tcp:22,tcp:3389 --source-ranges=0.0.0.0/0
* gcloud compute firewall-rules list --sort-by=NETWORK
* gcloud compute instances create privatenet-us-vm --zone=us-central1-c --machine-type=n1-standard-1 --subnet=privatesubnet-us
* gcloud compute instances list --sort-by=ZONE
* gcloud beta compute --project=qwiklabs-gcp-02-54404c251ca3 instances create vm-appliance --zone=us-central1-c --machine-type=n1-standard-4 --subnet=privatesubnet-us --network-tier=PREMIUM  --image-project=debian-cloud --boot-disk-size=10GB --boot-disk-type=pd-standard --boot-disk-device-name=vm-appliance --reservation-affinity=any

# Shared VPC vs VPC peering
* Shared VPC within org, centralized control -> First, an Organization Admin nominates a Shared VPC Admin. The Shared VPC Admin then enables shared VPC for the host project and delegates access to some or all subnets of the shared VPC network by granting the Network User role. Finally, the Network User creates resources in his/her Service Project
* VPC peering with different org and projects. Decentraized control
* Compute Engine internal DNS names created in a network are not accessible to peered networks. The IP address of the VM should be used to reach the VM instances in peered network.
* Deleting one side of the peering connection terminates the overall peering connection.