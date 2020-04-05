# Notes from Documentations
* 20 regions + 60 zones
* Regions are collections of zones
* VM, Disks are Zone Scoped/resources
* Static IP - Regional scope/resources
* Images - Global Resources
* Regional resources can be used by any resources in that region, regardless of zone, while zonal resources can only be used by other resources in the same zone.
* For example, to attach a zonal persistent disk to an instance, both resources must be in the same zone. Similarly, if you want to assign a static IP address to an instance, the instance must be in the same region as the static IP address.
* Choosing a region and zone is important for handling failures and Network latency 
* communication within regions will always be cheaper and faster than communication across different regions.

### Global Resource
* Global static external IP addresses are a global resource and are used for global load balancers: HTTP(S), SSL proxy, and TCP proxy.
* Images
* Snapshots
* Instance Template
* Cloud Interconnect
* VPC, Firewall, Router

### Regional Resource
* Subnets

### Zonal Resources
* VM
* Persistent Disk

### Storage
* Persistent Disk - Block Storage
* Cloud Storage - Object Storage
* Cloud Filestore - File store - Use case -migration of Application to Cloud

### Instance template
* Global scope
* We can't edit
* Unmanaged instance group is not useful. It needs manual work to scale
* Managed instance groups supports autoscaling. It creates vm if it reaches cpu threshold

### IAM
* Google Account, Service account, Google group, G Suite domain, Cloud Identity domain
* Primitive roles, which include the Owner, Editor, and Viewer roles that existed prior to the introduction of Cloud IAM
* Predefined roles, which provide granular access for a specific service and are managed by GCP
* Custom roles, which provide granular access according to a user-specified list of permissions
* gcloud compute instances add-iam-policy-binding myvm --role roles/compute.instanceAdmin --member user:akil.dove@gmail.com

### Networking
* 