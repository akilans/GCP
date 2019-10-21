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
* Persistent Disk - Block Stirage
* Cloud Storage - Object Storage
* Cloud Filestore - File store